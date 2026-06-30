<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Vertical Storage Tank',
                'short_description' => 'Tangki vertikal untuk penyimpanan minyak skala industri.',
                'specifications' => "Material: carbon steel ASTM A36\nFinishing: primer epoxy dan top coat PU\nFitur: manhole, nozzle inlet/outlet, level gauge, dan ladder platform",
                'capacity' => '10.000 - 5.000.000 liter',
            ],
            [
                'name' => 'Horizontal Tank',
                'short_description' => 'Tangki horizontal untuk kebutuhan site project dan penyimpanan modular.',
                'specifications' => "Material: carbon steel atau stainless steel\nMounting: saddle support\nFitur: lifting lug, drain valve, venting, dan inspection hatch",
                'capacity' => '5.000 - 100.000 liter',
            ],
            [
                'name' => 'Underground Tank',
                'short_description' => 'Tangki bawah tanah dengan perlindungan korosi untuk area terbatas.',
                'specifications' => "Material: carbon steel dengan coating anti korosi\nOpsional: double wall dan leak monitoring\nStandar: pressure test dan coating holiday test",
                'capacity' => '10.000 - 150.000 liter',
            ],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(
                ['slug' => Str::slug($product['name'])],
                $product + ['is_active' => true]
            );
        }
    }
}
