@csrf

@if ($post->exists)
    @method('PUT')
@endif

<div class="row g-4">
    <div class="col-lg-8">
        <div class="mb-3">
            <label class="form-label" for="title">Judul</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $post->title) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label" for="category">Kategori</label>
            <input type="text" name="category" id="category" class="form-control" value="{{ old('category', $post->category) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label" for="excerpt">Ringkasan</label>
            <textarea name="excerpt" id="excerpt" rows="3" class="form-control">{{ old('excerpt', $post->excerpt) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label" for="body">Isi Berita</label>
            <textarea name="body" id="body" rows="10" class="form-control" required>{{ old('body', $post->body) }}</textarea>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="mb-3">
            <label class="form-label" for="image">Gambar</label>
            <input type="file" name="image" id="image" class="form-control" accept="image/png,image/jpeg,image/webp">
            <small class="text-muted">Format JPG, PNG, atau WebP. Maksimal 2 MB.</small>
        </div>

        @if ($post->image_url)
            <img src="{{ $post->image_url }}" alt="{{ $post->title }}" class="preview-image mb-3">
        @endif

        <div class="mb-3">
            <label class="form-label" for="published_at">Tanggal Tayang</label>
            <input type="datetime-local" name="published_at" id="published_at" class="form-control" value="{{ old('published_at', $post->published_at?->format('Y-m-d\TH:i')) }}">
        </div>

        <div class="form-check form-switch">
            <input type="hidden" name="is_published" value="0">
            <input type="checkbox" name="is_published" id="is_published" value="1" class="form-check-input" @checked(old('is_published', $post->is_published))>
            <label class="form-check-label" for="is_published">Tampilkan di Halaman Depan</label>
        </div>
    </div>
</div>

<div class="d-flex justify-content-end gap-2 mt-4">
    <a href="{{ route('admin.news-posts.index') }}" class="btn btn-outline-secondary">Batal</a>
    <button type="submit" class="btn btn-warning">Simpan Berita</button>
</div>
