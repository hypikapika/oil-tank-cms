@extends('layouts.admin')

@section('title', 'Tambah Produk')
@section('page_title', 'Tambah Produk')

@section('content')
    <section class="admin-panel">
        <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
            @include('admin.products._form')
        </form>
    </section>
@endsection
