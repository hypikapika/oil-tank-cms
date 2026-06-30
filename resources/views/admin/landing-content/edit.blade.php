@extends('layouts.admin')

@section('title', 'Kelola Landing Page')
@section('page_title', 'Landing Page')

@section('content')
    <section class="admin-panel">
        <form method="POST" action="{{ route('admin.landing-content.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row g-4">
                <div class="col-lg-7">
                    <div class="mb-3">
                        <label class="form-label" for="hero_title">Judul Hero</label>
                        <input type="text" name="hero_title" id="hero_title" class="form-control" value="{{ old('hero_title', $content['hero_title']) }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="hero_subtitle">Sub Judul Hero</label>
                        <textarea name="hero_subtitle" id="hero_subtitle" rows="3" class="form-control" required>{{ old('hero_subtitle', $content['hero_subtitle']) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="about_title">Judul About</label>
                        <input type="text" name="about_title" id="about_title" class="form-control" value="{{ old('about_title', $content['about_title']) }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="about_body">Isi About</label>
                        <textarea name="about_body" id="about_body" rows="6" class="form-control" required>{{ old('about_body', $content['about_body']) }}</textarea>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="mb-3">
                        <label class="form-label" for="contact_email">Email Kontak</label>
                        <input type="email" name="contact_email" id="contact_email" class="form-control" value="{{ old('contact_email', $content['contact_email']) }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="contact_phone">Telepon Kontak</label>
                        <input type="text" name="contact_phone" id="contact_phone" class="form-control" value="{{ old('contact_phone', $content['contact_phone']) }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="hero_background">Background Hero</label>
                        <input type="file" name="hero_background" id="hero_background" class="form-control" accept="image/png,image/jpeg,image/webp">
                        <small class="text-muted">Gunakan gambar tangki minyak ukuran lebar, maksimal 4 MB.</small>
                    </div>
                    <img src="{{ $content['hero_background_url'] }}" alt="Background hero saat ini" class="preview-image">
                </div>
            </div>

            <div class="text-end mt-4">
                <button type="submit" class="btn btn-warning">Simpan Konten</button>
            </div>
        </form>
    </section>
@endsection
