# OilTankPro Laravel CMS

Laravel 11 scaffold for an oil tank company landing page with custom login/register, admin/user roles, CMS product management, landing page content management, and contact message inbox.

## Security Notes

- Do not commit `.env`; use `.env.example` as the template.
- Set `ADMIN_EMAIL` and `ADMIN_PASSWORD` locally before running seeders.
- The admin seeder will skip admin creation when those variables are empty.
- Run `php artisan storage:link` so product images can load from the public disk.
- Use strong passwords and private environment variables in production.

## Local Setup

```bash
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan storage:link
php artisan serve
```

## Main Features

- Public oil tank company landing page.
- Dynamic Hero, About, Product, and Contact sections.
- Product CRUD with image upload.
- Contact form with CMS inbox.
- Admin-only CMS protected by `auth` and `admin` middleware.
