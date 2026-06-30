<?php

use Illuminate\Support\Facades\Artisan;

Artisan::command('app:about-oil-tank', function (): void {
    $this->info('Oil Tank company profile CMS is ready.');
});
