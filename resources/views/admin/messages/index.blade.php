@extends('layouts.admin')

@section('title', 'Pesan Masuk')
@section('page_title', 'Pesan Masuk')

@section('content')
    <section class="admin-panel">
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>Pengirim</th>
                        <th>Subjek</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($messages as $message)
                        <tr>
                            <td>
                                <strong>{{ $message->name }}</strong>
                                <div class="text-muted small">{{ $message->email }}</div>
                            </td>
                            <td>{{ $message->subject ?: 'Permintaan penawaran' }}</td>
                            <td><span class="badge text-bg-secondary">{{ $message->status }}</span></td>
                            <td>{{ $message->created_at->format('d M Y H:i') }}</td>
                            <td class="text-end">
                                <a href="{{ route('admin.messages.show', $message) }}" class="btn btn-sm btn-dark">Buka</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">Belum ada pesan masuk.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $messages->links() }}
    </section>
@endsection
