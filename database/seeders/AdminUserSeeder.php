<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        if (! env('ADMIN_EMAIL') || ! env('ADMIN_PASSWORD')) {
            $this->command?->warn('Akun admin belum dibuat. Isi ADMIN_EMAIL dan ADMIN_PASSWORD di .env lokal terlebih dahulu.');

            return;
        }

        User::updateOrCreate(
            ['email' => env('ADMIN_EMAIL')],
            [
                'name' => env('ADMIN_NAME', 'Oil Tank Admin'),
                'password' => Hash::make(env('ADMIN_PASSWORD')),
                'role' => User::ROLE_ADMIN,
            ]
        );
    }
}
