<?php

use Illuminate\Support\Facades\Artisan;

Artisan::command('app:about-oil-tank', function (): void {
    $this->info('OilTankPro routes and admin files are available.');
});
