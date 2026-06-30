@extends('layouts.public')

@section('title', 'Masuk - OilTankPro')

@section('content')
    <main class="auth-page">
        <div class="container">
            <div class="auth-card mx-auto">
                <h1 class="h3 mb-2">Masuk</h1>
                <p class="text-muted">Masuk untuk mengelola data atau membuka akses akun pengguna.</p>

                <form method="POST" action="{{ route('login') }}" class="mt-4">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    <div class="form-check mb-4">
                        <input type="checkbox" name="remember" id="remember" class="form-check-input">
                        <label class="form-check-label" for="remember">Ingat saya</label>
                    </div>
                    <button type="submit" class="btn btn-warning w-100">Masuk</button>
                </form>

                <p class="mt-4 mb-0 text-center">
                    Belum punya akun? <a href="{{ route('register') }}">Daftar</a>
                </p>
            </div>
        </div>
    </main>
@endsection
