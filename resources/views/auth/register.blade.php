@extends('layouts.public')

@section('title', 'Register - OilTankPro')

@section('content')
    <main class="auth-page">
        <div class="container">
            <div class="auth-card mx-auto">
                <h1 class="h3 mb-2">Register</h1>
                <p class="text-muted">Akun publik dibuat dengan role user. Role admin hanya dibuat dari seeder atau oleh pemilik sistem.</p>

                <form method="POST" action="{{ route('register') }}" class="mt-4">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="name">Nama</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="password_confirmation">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-warning w-100">Buat Akun</button>
                </form>

                <p class="mt-4 mb-0 text-center">
                    Sudah punya akun? <a href="{{ route('login') }}">Login</a>
                </p>
            </div>
        </div>
    </main>
@endsection
