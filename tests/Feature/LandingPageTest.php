<?php

namespace Tests\Feature;

use App\Models\NewsPost;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LandingPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_landing_page_displays_company_content_and_published_news(): void
    {
        NewsPost::query()->create([
            'title' => 'Pemeriksaan Tangki Site Project',
            'slug' => 'pemeriksaan-tangki-site-project',
            'category' => 'Operasional',
            'excerpt' => 'Pemeriksaan visual dan pengecekan area tangki sebelum digunakan.',
            'body' => 'Pemeriksaan berkala membantu menjaga kesiapan tangki minyak untuk kebutuhan operasional.',
            'is_published' => true,
            'published_at' => now(),
        ]);

        NewsPost::query()->create([
            'title' => 'Draft Internal',
            'slug' => 'draft-internal',
            'category' => 'Perusahaan',
            'excerpt' => 'Konten draft.',
            'body' => 'Konten ini belum dipublikasikan.',
            'is_published' => false,
            'published_at' => null,
        ]);

        $response = $this->get('/');

        $response->assertOk();
        $response->assertSee('OilTankPro');
        $response->assertSee('Ruang Lingkup Bisnis');
        $response->assertSee('Pemeriksaan Tangki Site Project');
        $response->assertDontSee('Draft Internal');
    }
}
