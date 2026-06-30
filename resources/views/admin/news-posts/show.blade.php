@extends('layouts.admin')

@section('title', 'Detail Berita')
@section('page_title', 'Detail Berita')

@section('content')
    <section class="admin-panel">
        <div class="row g-4">
            <div class="col-lg-5">
                <img src="{{ $post->image_url ?: asset('images/oil-tank-hero.svg') }}" alt="{{ $post->title }}" class="preview-image">
            </div>
            <div class="col-lg-7">
                <span class="badge {{ $post->is_published ? 'text-bg-success' : 'text-bg-secondary' }}">
                    {{ $post->is_published ? 'Tayang' : 'Draft' }}
                </span>
                <h2 class="mt-3">{{ $post->title }}</h2>
                <p class="text-muted">{{ $post->category }} · {{ $post->published_at?->format('d M Y H:i') ?: 'Belum dijadwalkan' }}</p>
                <p>{{ $post->excerpt }}</p>
                <div class="message-box">{{ $post->body }}</div>

                <div class="d-flex gap-2 mt-4">
                    <a href="{{ route('admin.news-posts.edit', $post) }}" class="btn btn-warning">Edit Berita</a>
                    <form method="POST" action="{{ route('admin.news-posts.destroy', $post) }}" onsubmit="return confirm('Hapus berita ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
