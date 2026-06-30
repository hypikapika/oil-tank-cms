@extends('layouts.public')

@section('title', 'OilTankPro - Tangki Minyak Industri')

@section('content')
    <header class="hero-oil" style="background-image: linear-gradient(90deg, rgba(15, 24, 32, .88), rgba(15, 24, 32, .48)), url('{{ $content['hero_background_url'] }}');">
        <div class="container">
            <div class="row align-items-center min-vh-100 pt-5">
                <div class="col-lg-8">
                    <span class="eyebrow">Fabrikasi | Sewa | Perawatan</span>
                    <h1 class="display-4 fw-bold mt-3">{{ $content['hero_title'] }}</h1>
                    <p class="lead mt-3 hero-copy">{{ $content['hero_subtitle'] }}</p>
                    <div class="d-flex flex-wrap gap-3 mt-4">
                        <a href="#products" class="btn btn-warning btn-lg">Lihat Produk</a>
                        <a href="#contact" class="btn btn-outline-light btn-lg">Minta Penawaran</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main>
        <section id="about" class="section-space bg-soft">
            <div class="container">
                <div class="row align-items-center g-4">
                    <div class="col-lg-5">
                        <span class="eyebrow text-dark">Tentang Kami</span>
                        <h2 class="section-title mt-2">{{ $content['about_title'] }}</h2>
                    </div>
                    <div class="col-lg-7">
                        <p class="section-copy mb-0">{{ $content['about_body'] }}</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="business" class="section-space">
            <div class="container">
                <div class="row g-4 align-items-start">
                    <div class="col-lg-6">
                        <span class="eyebrow text-dark">Profil Perusahaan</span>
                        <h2 class="section-title mt-2">{{ $content['profile_title'] }}</h2>
                        <p class="section-copy">{{ $content['profile_body'] }}</p>
                    </div>
                    <div class="col-lg-6">
                        <div class="business-panel">
                            <span class="eyebrow text-dark">Bisnis</span>
                            <h3 class="h4 mt-2">{{ $content['business_title'] }}</h3>
                            <p class="text-muted">{{ $content['business_body'] }}</p>
                            <div class="business-grid">
                                <div>
                                    <strong>Fabrikasi</strong>
                                    <span>Desain dan pembuatan tangki sesuai kebutuhan kapasitas.</span>
                                </div>
                                <div>
                                    <strong>Sewa Tangki</strong>
                                    <span>Unit tangki untuk kebutuhan proyek dan operasional sementara.</span>
                                </div>
                                <div>
                                    <strong>Inspeksi</strong>
                                    <span>Pemeriksaan kondisi tangki, coating, fitting, dan area sambungan.</span>
                                </div>
                                <div>
                                    <strong>Perawatan</strong>
                                    <span>Perbaikan, pengecatan, penggantian komponen, dan pekerjaan lapangan.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="products" class="section-space">
            <div class="container">
                <div class="section-heading text-center">
                    <span class="eyebrow text-dark">Produk & Layanan</span>
                    <h2 class="section-title">Pilihan Tangki Minyak</h2>
                    <p>Beberapa tipe tangki yang biasa digunakan untuk area industri, site project, dan fasilitas penyimpanan.</p>
                </div>

                <div class="row g-4 mt-2">
                    @forelse ($products as $product)
                        <div class="col-md-6 col-lg-4">
                            <article class="product-card h-100">
                                <img src="{{ $product->image_url ?: asset('images/oil-tank-hero.svg') }}" alt="{{ $product->name }}" class="product-image">
                                <div class="p-4">
                                    <span class="product-capacity">{{ $product->capacity }}</span>
                                    <h3 class="h5 mt-2">{{ $product->name }}</h3>
                                    <p class="text-muted">{{ $product->short_description }}</p>
                                    <pre class="spec-list">{{ $product->specifications }}</pre>
                                </div>
                            </article>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="empty-state">
                                Belum ada produk yang ditampilkan.
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>

        <section id="news" class="section-space bg-soft">
            <div class="container">
                <div class="section-heading text-center">
                    <span class="eyebrow text-dark">Informasi</span>
                    <h2 class="section-title">{{ $content['news_title'] }}</h2>
                    <p>{{ $content['news_subtitle'] }}</p>
                </div>

                <div class="row g-4 mt-2">
                    @forelse ($newsPosts as $post)
                        <div class="col-md-6 col-lg-4">
                            <article class="news-card h-100">
                                <img src="{{ $post->image_url ?: asset('images/oil-tank-hero.svg') }}" alt="{{ $post->title }}" class="news-image">
                                <div class="p-4">
                                    <div class="news-meta">
                                        <span>{{ $post->category }}</span>
                                        <span>{{ $post->published_at?->format('d M Y') }}</span>
                                    </div>
                                    <h3 class="h5 mt-3">{{ $post->title }}</h3>
                                    <p class="text-muted mb-0">{{ $post->excerpt }}</p>
                                </div>
                            </article>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="empty-state">Belum ada berita yang ditampilkan.</div>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>

        <section id="contact" class="section-space bg-dark-panel">
            <div class="container">
                <div class="row g-4 align-items-start">
                    <div class="col-lg-5 text-white">
                        <span class="eyebrow">Kontak</span>
                        <h2 class="section-title text-white mt-2">Konsultasikan Kebutuhan Tangki Anda</h2>
                        <p class="hero-copy">Kirim kebutuhan kapasitas, lokasi project, dan spesifikasi awal. Tim kami akan membantu menyiapkan estimasi.</p>
                        <p class="mb-1">Email: {{ $content['contact_email'] }}</p>
                        <p>Telepon: {{ $content['contact_phone'] }}</p>
                    </div>
                    <div class="col-lg-7">
                        <form method="POST" action="{{ route('contact.store') }}" class="contact-panel">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label" for="name">Nama</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="phone">Telepon</label>
                                    <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="company">Perusahaan</label>
                                    <input type="text" name="company" id="company" class="form-control" value="{{ old('company') }}">
                                </div>
                                <div class="col-12">
                                    <label class="form-label" for="subject">Subjek</label>
                                    <input type="text" name="subject" id="subject" class="form-control" value="{{ old('subject') }}">
                                </div>
                                <div class="col-12">
                                    <label class="form-label" for="message">Pesan</label>
                                    <textarea name="message" id="message" rows="5" class="form-control" required>{{ old('message') }}</textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-warning btn-lg w-100">Kirim Permintaan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
