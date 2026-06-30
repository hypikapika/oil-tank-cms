<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\LandingContent;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LandingPageController extends Controller
{
    public function index(): View
    {
        return view('landing', [
            'content' => LandingContent::forLanding(),
            'products' => Product::active()->latest()->get(),
        ]);
    }

    public function storeMessage(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:150'],
            'phone' => ['nullable', 'string', 'max:30'],
            'company' => ['nullable', 'string', 'max:150'],
            'subject' => ['nullable', 'string', 'max:180'],
            'message' => ['required', 'string', 'max:3000'],
        ]);

        ContactMessage::create($validated);

        return back()->with('success', 'Pesan Anda berhasil dikirim. Tim kami akan menghubungi Anda.');
    }
}
