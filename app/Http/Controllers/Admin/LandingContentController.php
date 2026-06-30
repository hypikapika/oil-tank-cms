<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LandingContent;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class LandingContentController extends Controller
{
    public function edit(): View
    {
        return view('admin.landing-content.edit', [
            'content' => LandingContent::forLanding(),
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'hero_title' => ['required', 'string', 'max:180'],
            'hero_subtitle' => ['required', 'string', 'max:500'],
            'about_title' => ['required', 'string', 'max:180'],
            'about_body' => ['required', 'string', 'max:3000'],
            'profile_title' => ['required', 'string', 'max:180'],
            'profile_body' => ['required', 'string', 'max:3000'],
            'business_title' => ['required', 'string', 'max:180'],
            'business_body' => ['required', 'string', 'max:3000'],
            'news_title' => ['required', 'string', 'max:180'],
            'news_subtitle' => ['required', 'string', 'max:500'],
            'contact_email' => ['required', 'email', 'max:150'],
            'contact_phone' => ['required', 'string', 'max:60'],
            'hero_background' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
        ]);

        unset($validated['hero_background']);

        if ($request->hasFile('hero_background')) {
            $oldPath = LandingContent::query()->where('key', 'hero_background_path')->value('value');

            if ($oldPath) {
                Storage::disk('public')->delete($oldPath);
            }

            $validated['hero_background_path'] = $request->file('hero_background')->store('landing', 'public');
        }

        foreach ($validated as $key => $value) {
            LandingContent::updateOrCreate(
                ['key' => $key],
                ['value' => $value, 'type' => $key === 'hero_background_path' ? 'image' : 'text']
            );
        }

        return back()->with('success', 'Konten landing page berhasil diperbarui.');
    }
}
