@extends('layouts.admin')

@section('title', 'Berita')
@section('page_title', 'Berita')

@section('content')
    <section class="admin-panel">
        <div class="d-flex flex-column flex-md-row justify-content-between gap-3 mb-3">
            <div>
                <h2 class="h5 mb-1">Daftar Berita</h2>
                <p class="text-muted mb-0">Kelola informasi perusahaan, artikel teknis, dan pembaruan bisnis.</p>
            </div>
            <a href="{{ route('admin.news-posts.create') }}" class="btn btn-warning align-self-md-start">Tambah Berita</a>
        </div>

        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($posts as $post)
                        <tr>
                            <td>
                                <strong>{{ $post->title }}</strong>
                                <div class="text-muted small">{{ $post->slug }}</div>
                            </td>
                            <td>{{ $post->category }}</td>
                            <td>
                                <span class="badge {{ $post->is_published ? 'text-bg-success' : 'text-bg-secondary' }}">
                                    {{ $post->is_published ? 'Tayang' : 'Draft' }}
                                </span>
                            </td>
                            <td>{{ $post->published_at?->format('d M Y H:i') ?: '-' }}</td>
                            <td class="text-end">
                                <div class="btn-group">
                                    <a href="{{ route('admin.news-posts.show', $post) }}" class="btn btn-sm btn-outline-dark">Detail</a>
                                    <a href="{{ route('admin.news-posts.edit', $post) }}" class="btn btn-sm btn-dark">Edit</a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">Belum ada berita.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $posts->links() }}
    </section>
@endsection
