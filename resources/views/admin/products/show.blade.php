@extends('layouts.admin')

@section('title', 'Detail Produk')
@section('page_title', 'Detail Produk')

@section('content')
    <section class="admin-panel">
        <div class="row g-4">
            <div class="col-lg-5">
                <img src="{{ $product->image_url ?: asset('images/oil-tank-hero.svg') }}" alt="{{ $product->name }}" class="preview-image">
            </div>
            <div class="col-lg-7">
                <span class="badge {{ $product->is_active ? 'text-bg-success' : 'text-bg-secondary' }}">
                    {{ $product->is_active ? 'Aktif' : 'Draft' }}
                </span>
                <h2 class="mt-3">{{ $product->name }}</h2>
                <p class="text-muted">{{ $product->short_description }}</p>
                <dl class="row">
                    <dt class="col-sm-3">Kapasitas</dt>
                    <dd class="col-sm-9">{{ $product->capacity }}</dd>
                    <dt class="col-sm-3">Slug</dt>
                    <dd class="col-sm-9">{{ $product->slug }}</dd>
                    <dt class="col-sm-3">Spesifikasi</dt>
                    <dd class="col-sm-9"><pre class="spec-list">{{ $product->specifications }}</pre></dd>
                </dl>

                <div class="d-flex gap-2">
                    <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-warning">Edit Produk</a>
                    <form method="POST" action="{{ route('admin.products.destroy', $product) }}" onsubmit="return confirm('Hapus produk ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
