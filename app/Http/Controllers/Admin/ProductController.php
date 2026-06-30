<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        return view('admin.products.index', [
            'products' => Product::latest()->paginate(10),
        ]);
    }

    public function create(): View
    {
        return view('admin.products.create', [
            'product' => new Product(['is_active' => true]),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validatedData($request);
        $data['slug'] = $this->uniqueSlug($data['name']);

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('products', 'public');
        }

        Product::create($data);

        return redirect()->route('admin.products.index')->with('success', 'Produk tangki berhasil ditambahkan.');
    }

    public function show(Product $product): View
    {
        return view('admin.products.show', compact('product'));
    }

    public function edit(Product $product): View
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product): RedirectResponse
    {
        $data = $this->validatedData($request);
        $data['slug'] = $this->uniqueSlug($data['name'], $product);

        if ($request->hasFile('image')) {
            if ($product->image_path) {
                Storage::disk('public')->delete($product->image_path);
            }

            $data['image_path'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);

        return redirect()->route('admin.products.index')->with('success', 'Produk tangki berhasil diperbarui.');
    }

    public function destroy(Product $product): RedirectResponse
    {
        if ($product->image_path) {
            Storage::disk('public')->delete($product->image_path);
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Produk tangki berhasil dihapus.');
    }

    private function validatedData(Request $request): array
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:160'],
            'short_description' => ['nullable', 'string', 'max:255'],
            'specifications' => ['required', 'string'],
            'capacity' => ['required', 'string', 'max:120'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        return $validated;
    }

    private function uniqueSlug(string $name, ?Product $ignore = null): string
    {
        $baseSlug = Str::slug($name);
        $slug = $baseSlug;
        $counter = 2;

        while (
            Product::query()
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
