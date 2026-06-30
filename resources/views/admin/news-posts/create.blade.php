@extends('layouts.admin')

@section('title', 'Tambah Berita')
@section('page_title', 'Tambah Berita')

@section('content')
    <section class="admin-panel">
        <form method="POST" action="{{ route('admin.news-posts.store') }}" enctype="multipart/form-data">
            @include('admin.news-posts._form')
        </form>
    </section>
@endsection
