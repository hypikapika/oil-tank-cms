<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class LandingContent extends Model
{
    use HasFactory;

    public const DEFAULTS = [
        'hero_title' => 'Industrial Oil Tank Fabrication & Rental',
        'hero_subtitle' => 'Solusi tangki minyak yang aman, tahan lama, dan siap mendukung kebutuhan penyimpanan industri Anda.',
        'about_title' => 'Mitra Tangki Minyak untuk Operasi Industri',
        'about_body' => 'Kami menyediakan layanan fabrikasi, penyewaan, inspeksi, dan perawatan tangki minyak dengan standar keselamatan kerja dan mutu produksi yang terukur.',
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
