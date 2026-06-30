<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin OilTankPro')</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/oil-tank.css') }}">
</head>
<body class="admin-body">
    <div class="admin-shell">
        <aside class="admin-sidebar">
            <a class="admin-brand" href="{{ route('admin.dashboard') }}">OilTank<span>Admin</span></a>
            <nav class="nav flex-column gap-1">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
                <a class="nav-link" href="{{ route('admin.landing-content.edit') }}">Halaman Depan</a>
                <a class="nav-link" href="{{ route('admin.products.index') }}">Produk Tangki</a>
                <a class="nav-link" href="{{ route('admin.news-posts.index') }}">Berita</a>
                <a class="nav-link" href="{{ route('admin.messages.index') }}">Pesan Masuk</a>
                <a class="nav-link" href="{{ route('landing') }}">Lihat Website</a>
            </nav>
            <form method="POST" action="{{ route('logout') }}" class="mt-auto">
                @csrf
                <button type="submit" class="btn btn-outline-light w-100">Keluar</button>
            </form>
        </aside>

        <main class="admin-main">
            <header class="admin-topbar">
                <div>
                    <p class="text-muted small mb-1">Panel Admin</p>
                    <h1 class="h3 mb-0">@yield('page_title', 'Dashboard')</h1>
                </div>
                <span class="badge text-bg-dark">{{ auth()->user()->name }}</span>
            </header>

            @include('partials.flash')

            @yield('content')
        </main>
    </div>

    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
