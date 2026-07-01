# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## What this is

YQL DNA Portal — a Laravel 11 app with two halves in one codebase:

1. A **public marketing site** (YellowQuip branding) — static-ish pages served from `PublicPageController`.
2. An **internal document management & audit portal** behind login — employee-ID/email auth, optional OTP step, role-based document access, user management, and a full audit log.

No frontend build pipeline exists (no `package.json`/Vite in the app itself) — CSS/JS are plain files served from `public/css` and `public/js` and included directly in Blade layouts. No `tests/` directory exists yet.

## Commands

```bash
composer install
cp .env.example .env
php artisan key:generate

# Postgres only — create the DB yourself first, Laravel won't create it
php artisan migrate
php artisan db:seed          # creates admin user (ADMIN001 / Admin@12345) + categories
php artisan storage:link

php artisan serve            # http://localhost:8000
```

- Lint/format: `vendor/bin/pint` (Laravel Pint, dev dependency — no test suite is currently configured despite `phpunit`/`pest` scaffolding in `composer.json`'s require-dev).
- There is no `npm run dev`/`build` step; editing `public/css/app.css` or `public/js/*.js` takes effect on page refresh with no compile step.

## Architecture

**Two independent route/layout stacks, same app:**
- Public pages: `routes/web.php` top section → `PublicPageController` → views in `resources/views/public/*` → `layouts/public.blade.php`. No auth required.
- Portal pages: everything under the `['auth', 'active_user', 'otp_verified']` middleware group in `routes/web.php` → `layouts/app.blade.php`.
- `resources/views/backups/public-pages/` is a snapshot of older public-page markup kept for reference — do not confuse it with the live `resources/views/public/*` views when editing the marketing site.

**Auth/session pipeline** (order matters, see `bootstrap/app.php` for middleware aliases):
1. `auth` — standard Laravel session guard. Login accepts either `employee_id` or `email` in one field (`AuthController::login` detects which via `filter_var(...FILTER_VALIDATE_EMAIL)`).
2. `active_user` (`CheckActiveUser`) — force-logs-out and redirects to `/login` if the user's `status` flipped away from `active` after they already had a session (e.g. admin deactivated them mid-session).
3. `otp_verified` (`EnsureOtpVerified`) — no-op unless `ENABLE_OTP=true`. When enabled, gates on `session('otp_verified')`, set by `OtpController::verify`. **OTP codes are not actually delivered anywhere** (no SMS/mail wired up) — they're written to `otp_codes` and the audit log for an admin to retrieve manually. To wire real delivery, add a `Notification`/mail call in `AuthController::issueOtp()` and `OtpController::resend()`.

**Role & access-level model** (`app/Models/User.php`):
- Roles ranked low→high: `staff(1) < manager(2) < auditor(3) < admin(4)` via `User::ROLE_RANK`.
- `User::viewableAccessLevels()` returns every `access_level` value a user may see: `'all'` plus every role at-or-below their own rank. Admins see everything. This is the single source of truth for document visibility — `Document::scopeViewableBy()` just filters `whereIn('access_level', ...)`.
- `role:admin` middleware (`RoleMiddleware`) gates hard admin-only routes (user management, audit logs) — this is a separate, coarser check from the per-document `access_level` scoping above. Don't conflate the two: a non-admin can still view/upload documents, just not manage users.

**Documents** (`DocumentController`):
- Files are stored on the `private` disk (`config/filesystems.php`, root `storage/app/private`) — never on `public`. There is no direct URL to a stored file; `DocumentController::download()` is the only path that serves file bytes, and it re-checks `viewableAccessLevels()` on every request (don't assume the index-page filtering was the only enforcement point).
- Allowed upload extensions and the 100 MB size cap are hardcoded in `DocumentController::$allowedExtensions` / `$maxFileSizeKb` — update both together if adding a new file type.
- `status` (`active`/`archived`) is independent of `access_level` — archiving doesn't change who could see a document, only whether it shows up in the default index filter.

**Audit logging** (`AuditLogService::log()`): a static helper called directly from controllers/middleware at every security-relevant event (login success/fail/blocked, OTP issuance, document upload/download/download-denied/archive/restore/delete, inactive-account access attempts). `user_id` is nullable to support logging failed logins against unknown credentials. When adding a new sensitive action, follow the existing call-site pattern rather than introducing a new logging mechanism.

**Contact form** (`ContactController`): sends `ContactInquiryMail` to a hardcoded address (`emmamuelg@yellowquip.com`). Has a honeypot field (`website` must be `prohibited`) plus route-level throttling (`throttle:5,1` in `routes/web.php`). Requires real SMTP config in `.env` to actually deliver — unset `MAIL_*` values mean it silently fails to send in dev.

## Deployment notes (from README)

Target is cPanel/shared hosting with PostgreSQL, not a container platform. The app root and `public/` are typically split (document root ≠ project root) — see README.md sections 4–5 for the two supported layouts and the pre-launch security checklist (must change seeded admin password, `APP_DEBUG=false`, HTTPS, `SESSION_SECURE_COOKIE=true`, decide on OTP delivery before enabling `ENABLE_OTP`).
