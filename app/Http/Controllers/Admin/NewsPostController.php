<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsPost;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class NewsPostController extends Controller
{
    public function index(): View
    {
        return view('admin.news-posts.index', [
            'posts' => NewsPost::latest('published_at')->latest()->paginate(10),
        ]);
    }

    public function create(): View
    {
        return view('admin.news-posts.create', [
            'post' => new NewsPost([
                'category' => 'Perusahaan',
                'is_published' => true,
                'published_at' => now(),
            ]),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validatedData($request);
        $data['slug'] = $this->uniqueSlug($data['title']);

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('news', 'public');
        }

        NewsPost::create($data);

        return redirect()->route('admin.news-posts.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function show(NewsPost $newsPost): View
    {
        return view('admin.news-posts.show', ['post' => $newsPost]);
    }

    public function edit(NewsPost $newsPost): View
    {
        return view('admin.news-posts.edit', ['post' => $newsPost]);
    }

    public function update(Request $request, NewsPost $newsPost): RedirectResponse
    {
        $data = $this->validatedData($request);
        $data['slug'] = $this->uniqueSlug($data['title'], $newsPost);

        if ($request->hasFile('image')) {
            if ($newsPost->image_path) {
                Storage::disk('public')->delete($newsPost->image_path);
            }

            $data['image_path'] = $request->file('image')->store('news', 'public');
        }

        $newsPost->update($data);

        return redirect()->route('admin.news-posts.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(NewsPost $newsPost): RedirectResponse
    {
        if ($newsPost->image_path) {
            Storage::disk('public')->delete($newsPost->image_path);
        }

        $newsPost->delete();

        return redirect()->route('admin.news-posts.index')->with('success', 'Berita berhasil dihapus.');
    }

    private function validatedData(Request $request): array
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:180'],
            'category' => ['required', 'string', 'max:120'],
            'excerpt' => ['nullable', 'string', 'max:255'],
            'body' => ['required', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'is_published' => ['nullable', 'boolean'],
            'published_at' => ['nullable', 'date'],
        ]);

        $validated['is_published'] = $request->boolean('is_published');
        $validated['published_at'] = $validated['is_published']
            ? ($validated['published_at'] ?? now())
            : null;

        return $validated;
    }

    private function uniqueSlug(string $title, ?NewsPost $ignore = null): string
    {
        $baseSlug = Str::slug($title);
        $slug = $baseSlug;
        $counter = 2;

        while (
            NewsPost::query()
                ->where('slug', $slug)
                ->when($ignore, fn ($query) => $query->whereKeyNot($ignore->getKey()))
                ->exists()
        ) {
            $slug = "{$baseSlug}-{$counter}";
            $counter++;
        }

        return $slug;
    }
}
