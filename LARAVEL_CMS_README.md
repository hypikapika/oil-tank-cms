# Laravel 11 Oil Tank Landing Page + CMS

Scaffold ini menambahkan autentikasi custom ringan, role admin/user, landing page dinamis, CMS produk tangki, pengelolaan pesan masuk, dan upload gambar melalui disk `public`.

## File Utama

- `database/migrations/0001_01_01_000000_create_users_table.php`
- `database/migrations/2026_06_30_000001_create_products_table.php`
- `database/migrations/2026_06_30_000002_create_contact_messages_table.php`
- `database/migrations/2026_06_30_000003_create_landing_contents_table.php`
- `app/Models/Product.php`
- `app/Models/ContactMessage.php`
- `app/Models/LandingContent.php`
- `app/Http/Middleware/AdminMiddleware.php`
- `app/Http/Controllers/Auth/*`
- `app/Http/Controllers/Admin/*`
- `app/Http/Controllers/LandingPageController.php`
- `routes/web.php`
- `resources/views/*`

## Menjalankan di Laravel 11

1. Pastikan file ini berada di root project Laravel 11.
2. Atur koneksi database di `.env`.
3. Jalankan migrasi, seeder, dan storage link:

```bash
php artisan migrate --seed
php artisan storage:link
```

4. Jalankan server lokal:

```bash
php artisan serve
```

## Akun Admin

Seeder hanya membuat akun admin kalau variabel berikut sudah disetel di `.env` lokal:

```env
ADMIN_NAME="Oil Tank Admin"
ADMIN_EMAIL=admin@oiltank.test
ADMIN_PASSWORD=
```

Jangan commit file `.env`. Gunakan password kuat dan unik sebelum menjalankan `php artisan migrate --seed`.

## Middleware Admin di Laravel 11

Alias `admin` sudah didaftarkan di `bootstrap/app.php`:

```php
$middleware->alias([
    'admin' => \App\Http\Middleware\AdminMiddleware::class,
]);
```

Route CMS memakai middleware:

```php
Route::prefix('admin')
    ->as('admin.')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        // CMS routes
    });
```

## Jika Ingin Menggunakan Laravel Breeze

Auth custom di folder `app/Http/Controllers/Auth` dan `resources/views/auth` bisa diganti Breeze:

```bash
composer require laravel/breeze --dev
php artisan breeze:install blade
php artisan migrate
```

Tetap pertahankan:

- kolom `role` pada tabel `users`
- `AdminMiddleware`
- route group CMS dengan `middleware(['auth', 'admin'])`
- controller dan view admin

## Upload Gambar

Produk dan background hero disimpan ke disk `public`, sehingga `php artisan storage:link` wajib dijalankan agar file bisa diakses dari browser.
