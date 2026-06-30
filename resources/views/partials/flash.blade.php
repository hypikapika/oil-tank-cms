@if (session('success'))
    <div class="container flash-stack">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
        </div>
    </div>
@endif

@if ($errors->any())
    <div class="container flash-stack">
        <div class="alert alert-danger" role="alert">
            <strong>Periksa kembali data yang Anda masukkan.</strong>
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
