@extends('layouts.admin')

@section('title', 'Detail Pesan')
@section('page_title', 'Detail Pesan')

@section('content')
    <section class="admin-panel">
        <div class="d-flex flex-column flex-lg-row justify-content-between gap-3 mb-4">
            <div>
                <span class="badge text-bg-secondary">{{ $message->status }}</span>
                <h2 class="h4 mt-2">{{ $message->subject ?: 'Permintaan penawaran' }}</h2>
                <p class="text-muted mb-0">{{ $message->created_at->format('d M Y H:i') }}</p>
            </div>
            <div class="d-flex gap-2 align-self-lg-start">
                <form method="POST" action="{{ route('admin.messages.mark-as-replied', $message) }}">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-warning">Tandai Dibalas</button>
                </form>
                <form method="POST" action="{{ route('admin.messages.destroy', $message) }}" onsubmit="return confirm('Hapus pesan ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">Hapus</button>
                </form>
            </div>
        </div>

        <dl class="row">
            <dt class="col-sm-3">Nama</dt>
            <dd class="col-sm-9">{{ $message->name }}</dd>
            <dt class="col-sm-3">Email</dt>
            <dd class="col-sm-9"><a href="mailto:{{ $message->email }}">{{ $message->email }}</a></dd>
            <dt class="col-sm-3">Telepon</dt>
            <dd class="col-sm-9">{{ $message->phone ?: '-' }}</dd>
            <dt class="col-sm-3">Perusahaan</dt>
            <dd class="col-sm-9">{{ $message->company ?: '-' }}</dd>
            <dt class="col-sm-3">Pesan</dt>
            <dd class="col-sm-9"><p class="message-box">{{ $message->message }}</p></dd>
        </dl>

        <a href="{{ route('admin.messages.index') }}" class="btn btn-outline-dark">Kembali</a>
    </section>
@endsection
