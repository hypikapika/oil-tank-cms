@extends('layouts.admin')

@section('title', 'Edit Produk')
@section('page_title', 'Edit Produk')

@section('content')
    <section class="admin-panel">
        <form method="POST" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data">
            @include('admin.products._form')
        </form>
    </section>
@endsection
