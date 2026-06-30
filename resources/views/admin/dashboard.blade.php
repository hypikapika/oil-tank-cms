@extends('layouts.admin')

@section('title', 'Dashboard CMS')
@section('page_title', 'Dashboard')

@section('content')
    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="stat-card">
                <span>Total Produk</span>
                <strong>{{ $productCount }}</strong>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card">
                <span>Produk Aktif</span>
                <strong>{{ $activeProductCount }}</strong>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card">
                <span>Pesan Baru</span>
                <strong>{{ $newMessageCount }}</strong>
            </div>
        </div>
    </div>

    <section class="admin-panel">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="h5 mb-0">Pesan Terbaru</h2>
            <a href="{{ route('admin.messages.index') }}" class="btn btn-sm btn-outline-dark">Lihat Semua</a>
        </div>

        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($latestMessages as $message)
                        <tr>
                            <td>{{ $message->name }}</td>
                            <td>{{ $message->email }}</td>
                            <td><span class="badge text-bg-secondary">{{ $message->status }}</span></td>
                            <td>{{ $message->created_at->format('d M Y H:i') }}</td>
                            <td class="text-end"><a href="{{ route('admin.messages.show', $message) }}" class="btn btn-sm btn-dark">Buka</a></td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center text-muted">Belum ada pesan.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection
