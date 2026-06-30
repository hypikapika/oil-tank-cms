# OilTankPro

Kode ini berisi project Laravel 11 untuk halaman perusahaan tangki minyak dan panel admin sederhana. Admin dapat mengelola produk, isi halaman depan, dan pesan dari form kontak.

## Catatan Penting

- Jangan commit `.env`.
- Isi `ADMIN_EMAIL` dan `ADMIN_PASSWORD` di `.env` lokal sebelum menjalankan seeder.
- Seeder admin sengaja tidak membuat akun jika email atau password admin belum diisi.
- Jalankan `php artisan storage:link` agar foto produk bisa tampil.

## Menjalankan

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan storage:link
php artisan serve
```

Jika memakai MySQL, sesuaikan nama database, username, dan password di `.env` sebelum menjalankan migrasi.

## Isi Project

- Landing page perusahaan tangki minyak.
- Masuk dan daftar akun dengan role `admin` dan `user`.
- Kelola produk tangki, kapasitas, spesifikasi, dan gambar.
- Kelola teks halaman depan.
- Simpan pesan dari form kontak.
