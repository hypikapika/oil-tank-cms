@csrf

@if ($product->exists)
    @method('PUT')
@endif

<div class="row g-4">
    <div class="col-lg-8">
        <div class="mb-3">
            <label class="form-label" for="name">Nama Tangki</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $product->name) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label" for="short_description">Deskripsi Singkat</label>
            <input type="text" name="short_description" id="short_description" class="form-control" value="{{ old('short_description', $product->short_description) }}">
        </div>

        <div class="mb-3">
            <label class="form-label" for="capacity">Kapasitas</label>
            <input type="text" name="capacity" id="capacity" class="form-control" value="{{ old('capacity', $product->capacity) }}" placeholder="Contoh: 10.000 - 5.000.000 liter" required>
        </div>

        <div class="mb-3">
            <label class="form-label" for="specifications">Spesifikasi Teknis</label>
            <textarea name="specifications" id="specifications" rows="8" class="form-control" required>{{ old('specifications', $product->specifications) }}</textarea>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="mb-3">
            <label class="form-label" for="image">Foto Produk</label>
            <input type="file" name="image" id="image" class="form-control" accept="image/png,image/jpeg,image/webp">
            <small class="text-muted">Format JPG, PNG, atau WebP. Maksimal 2 MB.</small>
        </div>

        @if ($product->image_url)
            <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="preview-image mb-3">
        @endif

        <div class="form-check form-switch">
            <input type="hidden" name="is_active" value="0">
            <input type="checkbox" name="is_active" id="is_active" value="1" class="form-check-input" @checked(old('is_active', $product->is_active))>
            <label class="form-check-label" for="is_active">Tampilkan di Landing Page</label>
        </div>
    </div>
</div>

<div class="d-flex justify-content-end gap-2 mt-4">
    <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary">Batal</a>
    <button type="submit" class="btn btn-warning">Simpan Produk</button>
</div>
