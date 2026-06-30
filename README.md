# OilTankPro

Kode ini berisi halaman perusahaan tangki minyak dan panel admin sederhana untuk mengelola produk, isi landing page, dan pesan masuk.

## Catatan Penting

- Jangan commit `.env`.
- Isi `ADMIN_EMAIL` dan `ADMIN_PASSWORD` di `.env` lokal sebelum menjalankan seeder.
- Seeder admin sengaja tidak membuat akun jika email atau password admin belum diisi.
- Jalankan `php artisan storage:link` agar foto produk bisa tampil.

## Menjalankan

```bash
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan storage:link
php artisan serve
```

## Isi Project

- Landing page perusahaan tangki minyak.
- Masuk dan daftar akun dengan role `admin` dan `user`.
- Kelola produk tangki, kapasitas, spesifikasi, dan gambar.
- Kelola teks halaman depan.
- Simpan pesan dari form kontak.
