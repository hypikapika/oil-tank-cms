@extends('layouts.admin')

@section('title', 'Edit Berita')
@section('page_title', 'Edit Berita')

@section('content')
    <section class="admin-panel">
        <form method="POST" action="{{ route('admin.news-posts.update', $post) }}" enctype="multipart/form-data">
            @include('admin.news-posts._form')
        </form>
    </section>
@endsection
