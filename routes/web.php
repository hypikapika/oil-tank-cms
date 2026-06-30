<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LandingContentController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\NewsPostController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\LandingPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingPageController::class, 'index'])->name('landing');
Route::post('/contact', [LandingPageController::class, 'storeMessage'])->name('contact.store');

Route::middleware('guest')->group(function (): void {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);

    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
});

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::prefix('admin')
    ->as('admin.')
    ->middleware(['auth', 'admin'])
    ->group(function (): void {
        Route::get('/dashboard', DashboardController::class)->name('dashboard');
        Route::get('/landing-content', [LandingContentController::class, 'edit'])->name('landing-content.edit');
        Route::put('/landing-content', [LandingContentController::class, 'update'])->name('landing-content.update');
        Route::resource('products', ProductController::class);
        Route::resource('news-posts', NewsPostController::class);
        Route::resource('messages', MessageController::class)->only(['index', 'show', 'destroy']);
        Route::patch('messages/{message}/mark-as-replied', [MessageController::class, 'markAsReplied'])->name('messages.mark-as-replied');
    });
