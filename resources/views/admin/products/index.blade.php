@extends('layouts.admin')

@section('title', 'Produk Tangki')
@section('page_title', 'Produk Tangki')

@section('content')
    <section class="admin-panel">
        <div class="d-flex flex-column flex-md-row justify-content-between gap-3 mb-3">
            <div>
                <h2 class="h5 mb-1">Daftar Produk</h2>
                <p class="text-muted mb-0">Kelola produk yang tampil di landing page.</p>
            </div>
            <a href="{{ route('admin.products.create') }}" class="btn btn-warning align-self-md-start">Tambah Produk</a>
        </div>

        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Kapasitas</th>
                        <th>Status</th>
                        <th>Diperbarui</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <img src="{{ $product->image_url ?: asset('images/oil-tank-hero.svg') }}" alt="{{ $product->name }}" class="table-thumb">
                                    <div>
                                        <strong>{{ $product->name }}</strong>
                                        <div class="text-muted small">{{ $product->slug }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $product->capacity }}</td>
                            <td>
                                <span class="badge {{ $product->is_active ? 'text-bg-success' : 'text-bg-secondary' }}">
                                    {{ $product->is_active ? 'Aktif' : 'Draft' }}
                                </span>
                            </td>
                            <td>{{ $product->updated_at->format('d M Y H:i') }}</td>
                            <td class="text-end">
                                <div class="btn-group">
                                    <a href="{{ route('admin.products.show', $product) }}" class="btn btn-sm btn-outline-dark">Detail</a>
                                    <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-sm btn-dark">Edit</a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">Belum ada produk.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $products->links() }}
    </section>
@endsection
