<?php

namespace Database\Seeders;

use App\Models\LandingContent;
use Illuminate\Database\Seeder;

class LandingContentSeeder extends Seeder
{
    public function run(): void
    {
        foreach (LandingContent::DEFAULTS as $key => $value) {
            LandingContent::updateOrCreate(
                ['key' => $key],
                ['value' => $value, 'type' => $key === 'hero_background_path' ? 'image' : 'text']
            );
        }
    }
}
