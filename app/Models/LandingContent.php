<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class LandingContent extends Model
{
    use HasFactory;

    public const DEFAULTS = [
        'hero_title' => 'Tangki Minyak untuk Kebutuhan Industri',
        'hero_subtitle' => 'Fabrikasi, sewa, dan perawatan tangki minyak untuk penyimpanan bahan bakar, pelumas, dan kebutuhan site project.',
        'about_title' => 'Mendukung Penyimpanan Minyak yang Lebih Tertata',
        'about_body' => 'Kami menangani pembuatan, penyewaan, inspeksi, dan perawatan tangki minyak dengan memperhatikan kekuatan material, akses perawatan, serta kebutuhan operasional di lapangan.',
        'profile_title' => 'Profil Perusahaan',
        'profile_body' => 'OilTankPro berfokus pada kebutuhan penyimpanan minyak untuk area industri, proyek konstruksi, pertambangan, logistik, dan fasilitas energi. Layanan kami mencakup konsultasi kebutuhan, fabrikasi, penyewaan, instalasi, inspeksi, serta perawatan tangki.',
        'business_title' => 'Ruang Lingkup Bisnis',
        'business_body' => 'Kami menyediakan tangki vertikal, horizontal, dan underground dengan pilihan kapasitas yang dapat disesuaikan. Setiap pekerjaan memperhatikan fungsi operasional, akses perawatan, keamanan area kerja, dan kesiapan penggunaan di lapangan.',
        'news_title' => 'Berita dan Informasi',
        'news_subtitle' => 'Catatan perusahaan, informasi teknis, dan pembaruan seputar penyimpanan minyak industri.',
        'contact_email' => 'sales@oiltank.test',
        'contact_phone' => '+62 812 0000 0000',
        'hero_background_path' => null,
    ];

    protected $fillable = [
        'key',
        'value',
        'type',
    ];

    public static function forLanding(): array
    {
        $content = array_merge(
            self::DEFAULTS,
            static::query()->pluck('value', 'key')->all()
        );

        $content['hero_background_url'] = self::backgroundUrl($content['hero_background_path'] ?? null);

        return $content;
    }

    public static function backgroundUrl(?string $path): string
    {
        return $path
            ? Storage::disk('public')->url($path)
            : asset('images/oil-tank-hero.svg');
    }
}
