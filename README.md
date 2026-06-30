# OilTankPro

OilTankPro adalah aplikasi Laravel 11 untuk company profile bisnis tangki minyak. Aplikasi ini menyediakan landing page profesional, form kontak, autentikasi pengguna, dan panel CMS untuk mengelola konten utama perusahaan.

## Fitur

- Landing page dengan hero, profil perusahaan, ruang lingkup bisnis, produk, berita, dan kontak.
- CMS admin untuk mengelola teks halaman, produk tangki, berita, dan pesan masuk.
- Upload gambar produk dan berita melalui storage publik Laravel.
- Login dan register dengan role `admin` dan `user`.
- Seeder data awal untuk produk, konten halaman, dan berita.

## Persyaratan

- PHP 8.2 atau lebih baru.
- Composer.
- Database MySQL, MariaDB, PostgreSQL, atau SQLite.

## Instalasi

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan storage:link
php artisan serve
```

Sebelum menjalankan migrasi, sesuaikan koneksi database di `.env`. Untuk membuat akun admin melalui seeder, isi variabel berikut di `.env` lokal:

```env
ADMIN_NAME="Oil Tank Admin"
ADMIN_EMAIL=admin@oiltankpro.test
ADMIN_PASSWORD=
```

Gunakan password kuat dan unik. File `.env` tidak disimpan di repository.

## Pengujian

```bash
php artisan test
```

## Struktur Utama

- `app/Http/Controllers/Admin` untuk dashboard dan CMS.
- `app/Http/Controllers/Auth` untuk login, register, dan logout.
- `app/Models` untuk model produk, berita, pesan, konten halaman, dan user.
- `database/migrations` untuk struktur tabel aplikasi.
- `database/seeders` untuk data awal.
- `resources/views` untuk Blade view publik, auth, dan admin.
- `routes/web.php` untuk route publik dan route admin.

## Keamanan Repository

File lokal seperti `.env`, `vendor`, cache, log, database dump, dan private key sudah dikecualikan dari repository melalui `.gitignore`.
