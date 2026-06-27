# YQL DNA Portal

Internal document management & audit portal built on Laravel 11.

Features: employee-ID/email login, optional OTP 2-factor step, role-based
access (`staff` / `manager` / `auditor` / `admin`), document upload/download
with per-document access levels, document archiving, user management, and
a full audit log of logins, OTPs, and document actions.

## 1. Requirements

- PHP 8.2+ with extensions: `pdo_pgsql`, `mbstring`, `openssl`, `tokenizer`,
  `xml`, `ctype`, `json`, `bcmath`, `fileinfo`
- Composer 2.x
- PostgreSQL 13+
- A cPanel (or any Apache/LiteSpeed) shared hosting account, or any VPS

## 2. Local setup

```bash
composer install
cp .env.example .env
php artisan key:generate
```

Edit `.env` and set your Postgres credentials (`DB_DATABASE`, `DB_USERNAME`,
`DB_PASSWORD`). Create the database itself first (Laravel won't create the
database for you):

```sql
CREATE DATABASE yql_dna_portal;
```

Then run migrations and seed an initial admin account + categories:

```bash
php artisan migrate
php artisan db:seed
php artisan storage:link
```

This creates a default admin login:
- **Employee ID / Email:** `ADMIN001` or `admin@yql.local`
- **Password:** `Admin@12345`

**Change this password immediately after first login** (via the Users screen,
or `php artisan tinker` -> `User::first()->update(['password' => Hash::make('newpass')])`).

Serve locally:

```bash
php artisan serve
```

Visit `http://localhost:8000`.

## 3. Enabling OTP (optional)

Set `ENABLE_OTP=true` in `.env`. Right now OTP codes are written to the audit
log / `otp_codes` table rather than emailed/texted (no SMS/mail provider was
wired in). To actually deliver codes, add a `Notification` or mail call
inside `AuthController::issueOtp()` and `OtpController::resend()`.

## 4. Deploying to cPanel / shared hosting

Shared hosting almost always points your domain's document root at a folder
like `public_html`, not at this project's own `public/` folder. You have two
common options — pick whichever your host supports:

### Option A — host lets you set a custom document root (preferred)

Many cPanel hosts let you create the domain/subdomain with its **document
root pointed directly at this project's `public/` folder** (e.g. via
"Addon Domains" -> set document root to `/home/youruser/yql-dna-portal/public`).

1. Upload the **entire project** (everything in this zip) to a folder
   *outside* `public_html`, e.g. `/home/youruser/yql-dna-portal`.
2. Point the domain's document root to `/home/youruser/yql-dna-portal/public`.
3. SSH in (most cPanel hosts offer SSH access) and run:
   ```bash
   cd ~/yql-dna-portal
   composer install --no-dev --optimize-autoloader
   cp .env.example .env   # then edit with real DB creds + APP_URL
   php artisan key:generate
   php artisan migrate --force
   php artisan db:seed --force
   php artisan storage:link
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```
4. Make sure `storage/` and `bootstrap/cache/` are writable by the web
   server user (`chmod -R 775 storage bootstrap/cache`).

### Option B — host forces document root to be `public_html` (no custom root)

1. Upload everything **except** the `public/` folder's contents into a
   folder above `public_html`, e.g. `/home/youruser/yql-dna-portal`.
2. Upload the *contents* of this project's `public/` folder into
   `public_html` directly.
3. In the `public_html/index.php` you just uploaded, fix the two `require`
   paths to point up to where you placed the rest of the app, e.g.:
   ```php
   require __DIR__.'/../yql-dna-portal/vendor/autoload.php';
   $app = require_once __DIR__.'/../yql-dna-portal/bootstrap/app.php';
   ```
4. Same Composer/artisan steps as Option A, run from inside
   `/home/youruser/yql-dna-portal`.

### No SSH access?

If your host only gives FTP + a "Setup PHP App"/Softaculous-style panel:
run `composer install` **locally** first (`composer install --no-dev
--optimize-autoloader`), so the `vendor/` folder is already populated, then
upload the whole project (now including `vendor/`) via FTP. You can run
`php artisan migrate` once through cPanel's "Run PHP Script" / "Cron Jobs"
one-off feature, or via a temporary public route you delete afterward.

### Required `.env` settings for production

```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://yourdomain.com
DB_CONNECTION=pgsql
DB_HOST=<host-provided-pg-host>
DB_PORT=5432
DB_DATABASE=<your db>
DB_USERNAME=<your db user>
DB_PASSWORD=<your db password>
SESSION_SECURE_COOKIE=true
```

Most shared hosts that offer Postgres expose it as a local socket/host you
set up in cPanel's "PostgreSQL Databases" tool — create the DB and user
there first.

## 5. Security checklist before going live

- [ ] Change the seeded admin password
- [ ] `APP_DEBUG=false` in production
- [ ] `storage/app/private` is **not** web-accessible (it isn't, by design —
      only `DocumentController::download()` can serve files from it)
- [ ] HTTPS enabled, `SESSION_SECURE_COOKIE=true`
- [ ] Set up a real backup schedule for the Postgres database
- [ ] Decide whether to enable OTP and wire up actual SMS/email delivery

## 6. Project structure notes

This project's custom code lives in `app/`, `database/`, `resources/views/`,
and `routes/web.php`. Everything else (`bootstrap/`, `public/index.php`,
`config/*.php`, `artisan`) is the standard Laravel 11 skeleton wired to match
the custom middleware aliases described in `KERNEL_MIDDLEWARE_REGISTRATION.md`.
