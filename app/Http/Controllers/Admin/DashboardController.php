<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\NewsPost;
use App\Models\Product;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('admin.dashboard', [
            'productCount' => Product::count(),
            'activeProductCount' => Product::active()->count(),
            'publishedNewsCount' => NewsPost::published()->count(),
            'newMessageCount' => ContactMessage::where('status', ContactMessage::STATUS_NEW)->count(),
            'latestMessages' => ContactMessage::latest()->limit(5)->get(),
            'latestNewsPosts' => NewsPost::latest('published_at')->latest()->limit(5)->get(),
        ]);
    }
}
