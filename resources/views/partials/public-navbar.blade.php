<nav class="navbar navbar-expand-lg navbar-dark fixed-top public-navbar">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('landing') }}">OilTank<span>Pro</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#publicNav" aria-controls="publicNav" aria-expanded="false" aria-label="Buka menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="publicNav">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item"><a class="nav-link" href="{{ route('landing') }}#about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('landing') }}#products">Products</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('landing') }}#contact">Contact</a></li>
                @auth
                    @if (auth()->user()->isAdmin())
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}">CMS</a></li>
                    @endif
                    <li class="nav-item ms-lg-2">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-light">Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item ms-lg-2"><a class="btn btn-sm btn-outline-light" href="{{ route('login') }}">Login</a></li>
                    <li class="nav-item ms-lg-2"><a class="btn btn-sm btn-warning" href="{{ route('register') }}">Register</a></li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
