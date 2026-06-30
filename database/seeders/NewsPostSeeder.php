<?php

namespace Database\Seeders;

use App\Models\NewsPost;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NewsPostSeeder extends Seeder
{
    public function run(): void
    {
        $posts = [
            [
                'title' => 'Pemeriksaan Rutin Tangki Penyimpanan Minyak',
                'category' => 'Perawatan',
                'excerpt' => 'Pemeriksaan berkala membantu menjaga kekuatan struktur, kualitas coating, dan kesiapan tangki di area operasi.',
                'body' => "Pemeriksaan tangki perlu dilakukan secara terjadwal, terutama pada sambungan las, nozzle, manhole, venting, dan area dasar tangki.\n\nProses ini membantu tim operasi menemukan potensi korosi, rembesan, atau kerusakan coating sebelum mengganggu kegiatan penyimpanan.",
            ],
            [
                'title' => 'Pemilihan Kapasitas Tangki untuk Site Project',
                'category' => 'Bisnis',
                'excerpt' => 'Kapasitas tangki sebaiknya disesuaikan dengan pola konsumsi, jadwal pengiriman, ruang kerja, dan standar keselamatan di lokasi.',
                'body' => "Tangki untuk site project harus mempertimbangkan kebutuhan harian, cadangan operasional, akses mobilisasi, serta kemudahan perawatan.\n\nPemilihan tipe vertikal, horizontal, atau underground dapat disesuaikan dengan kondisi lahan dan karakter penggunaan.",
            ],
            [
                'title' => 'Fabrikasi Tangki dengan Kebutuhan Khusus',
                'category' => 'Perusahaan',
                'excerpt' => 'Desain tangki dapat menyesuaikan kebutuhan material, kapasitas, posisi nozzle, platform, dan perlengkapan pengukuran.',
                'body' => "Setiap fasilitas memiliki kebutuhan berbeda. Karena itu, fabrikasi tangki perlu memperhatikan jenis fluida, kapasitas, ruang penempatan, dan akses kerja.\n\nPerencanaan yang baik membantu tangki lebih mudah dirawat dan lebih sesuai dengan proses operasional pengguna.",
            ],
        ];

        foreach ($posts as $post) {
            NewsPost::updateOrCreate(
                ['slug' => Str::slug($post['title'])],
                $post + [
                    'is_published' => true,
                    'published_at' => now()->subDays(rand(2, 14)),
                ]
            );
        }
    }
}
