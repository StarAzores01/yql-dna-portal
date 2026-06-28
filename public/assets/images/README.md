# YQL Public Image Assets

All public-facing images for the Yellowquip website live here.
Never place private documents, SOP files, or internal reports in this folder.

**Do not place media inside `vendor/`.** Composer-managed packages (e.g.
`vendor/symfony/...`) ship their own internal `assets/images/` folders for
unrelated framework UI (error pages, etc.) — it's easy to mistake one of
those for this folder. The only real media folder is this one:
`public/assets/images/`.

## Folder structure (current, as of the real media insertion)

```
assets/images/
├── brand/          yql-logo.png, yql-logo-dark.png, yql-logo-white.png, yql-favicon.png
├── hero/           Home page hero background
├── about/          About page photo strip (empty — not yet supplied)
├── services/       Service card images (flat folder)
├── lease/          Lease section images (flat folder)
├── team/           Management Team photos (flat folder)
├── contact/        Contact page map placeholder image
├── articles/       Article thumbnails (flat folder)
├── blog/           Blog post thumbnails (flat folder)
├── gallery/        Project Gallery — nested by category:
│   ├── maintenance/      Heavy Equipment Maintenance + Repair/Overhaul items
│   ├── equipment/        Parts and Mining Equipment Supplier
│   ├── field/            Earthmoving and Mining-Related Jobs
│   ├── apprenticeship/   Apprenticeship Training Program
│   ├── operators/        Operators Training
│   ├── artisan/          Artisan Training Program
│   └── completed/        Completed Works (used as an extra repair/overhaul item)
├── icons/          SVG icons (empty — not yet supplied)
└── placeholders/   Generic fallback images (empty — onerror handlers fall
                    back to inline placeholder markup instead, see below)
```

## What's actually wired up right now

| Page | Blade file | Images |
|------|-----------|--------|
| Home | `public/home.blade.php` | Hero background (`hero/home-hero-equipment-01.jpg`) |
| Management Team | `public/management-team.blade.php` | 9 of 11 members have a real photo (`team/`); Lister Manda and Kelvin Sichalwe fall back to initials avatars until photos are supplied |
| Services | `public/services.blade.php` | 13 of 14 cards have a real photo (`services/`); "Maintenance and Repair Contract Services" falls back to its icon — add `service-maintenance-repair-contract-01.jpg` to complete the set |
| Lease | `public/lease.blade.php` | All 6 sections (LSS/PPMS/ERPHS/FMS/CMS/MARCS) have a real photo (`lease/`) |
| Project Gallery | `public/project-gallery.blade.php` | 19 items across all 7 filter categories (`gallery/<category>/`) |
| Articles | `public/articles.blade.php` | All 8 articles have a real thumbnail (`articles/`) |
| Blog | `public/blog.blade.php` | All 5 posts (incl. YQL DNA Member Repository) have a real thumbnail (`blog/`) |
| Contact | `public/contact.blade.php` | Map placeholder photo (`contact/contact-map-placeholder-01.jpg`) |
| Layouts | `layouts/public.blade.php`, `layouts/app.blade.php`, `layouts/guest.blade.php`, `auth/login.blade.php` | Logo (`brand/yql-logo.png`) + favicon (`brand/yql-favicon.png`) |

Not yet wired up (delivered but unused, or not yet supplied):
- `brand/yql-logo-dark.png` / `yql-logo-white.png` — available for a future
  theme-aware logo swap, not currently referenced anywhere.
- `lease/lease-equipment-rental-01.jpg` and `lease/lease-plant-hire-01.jpg` —
  the combined `lease-equipment-rental-plant-hire-01.jpg` is used for ERPHS
  instead; these two are spares.
- `services/service-maintenance-repair-contract-01.jpg` — not supplied yet.
- `about/`, `icons/`, `placeholders/` — empty, nothing supplied yet.

## Naming convention (kebab-case, lowercase only)

Match the filename to what the Blade view expects exactly — every `<img>`
tag has an `onerror` fallback (to an initials avatar, an icon, or a dashed
placeholder box), so a missing file degrades gracefully instead of showing
a broken-image icon, but a misnamed file will silently fall back too.

| Category | Example filename |
|----------|-------------------|
| Brand    | `yql-logo.png`, `yql-favicon.png`, `yql-logo-dark.png`, `yql-logo-white.png` |
| Hero     | `home-hero-equipment-01.jpg` |
| Team     | `team-emmanuel-gardner.png` (extension can vary — match what's in the Blade array) |
| Services | `service-iso-auditing-01.jpg` |
| Lease    | `lease-structuring-services-01.jpg` |
| Gallery  | `gallery-heavy-equipment-maintenance-01.png` (inside its category subfolder) |
| Articles | `article-iso-implementations.jpg` |
| Blog     | `blog-yql-dna-member-repository.jpg` |
| Contact  | `contact-map-placeholder-01.jpg` |

## When new images arrive

1. Drop the file into the correct subfolder in **`public/assets/images/`**
   (not `vendor/`, not `public/images/` — that legacy path was removed).
2. If it's a 1-for-1 replacement of a file already referenced in a Blade
   view, no code changes are needed — it just renders.
3. If it's brand-new (a new gallery item, a missing team photo with a
   different filename, etc.), add/update the matching entry in the `$items`
   / `$team` / `$services` array at the top of the relevant Blade file.
4. Always keep descriptive `alt` text.
5. Use `loading="lazy"` on all images below the fold (already set everywhere).

## Size targets

| Type           | Dimensions  | Format     | Max size |
|----------------|-------------|------------|----------|
| Logo           | 300×300     | PNG or SVG | —        |
| Favicon        | 64×64       | PNG        | —        |
| Hero           | 1920×1080   | JPG/WebP   | 500 KB   |
| Service/Lease  | 800×600     | JPG/WebP   | 200 KB   |
| Team photo     | 600×600     | JPG/WebP   | 150 KB   |
| Gallery image  | 1200×900    | JPG/WebP   | 400 KB   |
| Article/Blog   | 900×600     | JPG/WebP   | 200 KB   |
