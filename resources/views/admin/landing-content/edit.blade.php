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
                        <label class="form-label" for="about_title">Judul Ringkas Perusahaan</label>
                        <input type="text" name="about_title" id="about_title" class="form-control" value="{{ old('about_title', $content['about_title']) }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="about_body">Isi Ringkas Perusahaan</label>
                        <textarea name="about_body" id="about_body" rows="6" class="form-control" required>{{ old('about_body', $content['about_body']) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="profile_title">Judul Profil Perusahaan</label>
                        <input type="text" name="profile_title" id="profile_title" class="form-control" value="{{ old('profile_title', $content['profile_title']) }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="profile_body">Isi Profil Perusahaan</label>
                        <textarea name="profile_body" id="profile_body" rows="6" class="form-control" required>{{ old('profile_body', $content['profile_body']) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="business_title">Judul Informasi Bisnis</label>
                        <input type="text" name="business_title" id="business_title" class="form-control" value="{{ old('business_title', $content['business_title']) }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="business_body">Isi Informasi Bisnis</label>
                        <textarea name="business_body" id="business_body" rows="6" class="form-control" required>{{ old('business_body', $content['business_body']) }}</textarea>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="mb-3">
                        <label class="form-label" for="news_title">Judul Bagian Berita</label>
                        <input type="text" name="news_title" id="news_title" class="form-control" value="{{ old('news_title', $content['news_title']) }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="news_subtitle">Deskripsi Bagian Berita</label>
                        <textarea name="news_subtitle" id="news_subtitle" rows="3" class="form-control" required>{{ old('news_subtitle', $content['news_subtitle']) }}</textarea>
                    </div>
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
