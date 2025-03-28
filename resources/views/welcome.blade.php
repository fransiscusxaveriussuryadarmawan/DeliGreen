@extends('components.guests')

@section('content')
<!-- Hero Section -->
<section class="hero-section bg-light py-5" style="background: linear-gradient(rgba(255,255,255,0.9), rgba(255,255,255,0.9)), url('https://images.unsplash.com/photo-1490645935967-10de6ba17061?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1350&q=80'); background-size: cover; background-position: center;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold text-success mb-3">DeliGreen</h1>
                <p class="lead mb-4">Pesan makanan sehat favoritmu dengan mudah dan cepat. Nikmati pengalaman berbelanja yang menyenangkan!</p>
                <div class="d-flex gap-3">
                    <a href="{{ route('login') }}" class="btn btn-success btn-lg px-4">
                        <i class="bi bi-box-arrow-in-right me-2"></i> Masuk
                    </a>
                    <a href="#features" class="btn btn-outline-success btn-lg px-4">
                        <i class="bi bi-info-circle me-2"></i> Pelajari
                    </a>
                </div>
            </div>
            <div class="col-lg-6 d-none d-lg-block">
                <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" 
                     class="img-fluid rounded-3 shadow" 
                     alt="Healthy Food"
                     style="max-height: 400px; object-fit: cover;">
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="py-5 bg-white">
    <div class="container">
        <h2 class="text-center mb-5 fw-bold">Kenapa Memilih DeliGreen?</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                            <i class="bi bi-shield-check fs-1 text-success"></i>
                        </div>
                        <h4 class="mb-3">Bahan Organik</h4>
                        <p class="text-muted">100% bahan alami dan organik berkualitas tinggi tanpa bahan kimia berbahaya</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                            <i class="bi bi-lightning fs-1 text-success"></i>
                        </div>
                        <h4 class="mb-3">Pesan Cepat</h4>
                        <p class="text-muted">Proses pemesanan hanya dalam 3 langkah mudah tanpa antrian</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                            <i class="bi bi-truck fs-1 text-success"></i>
                        </div>
                        <h4 class="mb-3">Pengiriman Cepat</h4>
                        <p class="text-muted">Makanan segar sampai di tangan Anda dalam waktu kurang dari 60 menit</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Popular Menu Preview -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-5 fw-bold">Menu Populer</h2>
        <div class="row g-4">
            @foreach([
                ['name' => 'Salad Sayur Organik', 'price' => 45000, 'img' => 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=200&q=80'],
                ['name' => 'Smoothie Mangga', 'price' => 35000, 'img' => 'https://images.unsplash.com/photo-1505576399279-565b52d4ac71?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=200&q=80'],
                ['name' => 'Nasi Goreng Quinoa', 'price' => 55000, 'img' => 'https://images.unsplash.com/photo-1512058564366-18510be2db19?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=200&q=80'],
                ['name' => 'Bowl Avocado', 'price' => 50000, 'img' => 'https://images.unsplash.com/photo-1490645935967-10de6ba17061?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=200&q=80']
            ] as $menu)
            <div class="col-6 col-md-3">
                <div class="card border-0 shadow-sm h-100">
                    <img src="{{ $menu['img'] }}" class="card-img-top" style="height: 150px; object-fit: cover;" alt="{{ $menu['name'] }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $menu['name'] }}</h5>
                        <p class="text-success fw-bold">Rp {{ number_format($menu['price'], 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('login') }}" class="btn btn-success px-4">
                Lihat Menu Lengkap <i class="bi bi-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- Testimonial -->
<section class="py-5 bg-white">
    <div class="container">
        <h2 class="text-center mb-5 fw-bold">Apa Kata Mereka?</h2>
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach([
                            ['name' => 'Sarah', 'comment' => 'Makanannya selalu fresh dan enak! Pengiriman cepat pula.'],
                            ['name' => 'Budi', 'comment' => 'Saya sudah langganan 2 tahun, kesehatan saya jauh lebih baik.'],
                            ['name' => 'Dewi', 'comment' => 'Anak-anak saya suka banget smoothienya, gizinya terjamin.']
                        ] as $key => $testi)
                        <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body text-center p-4">
                                    <img src="https://i.pravatar.cc/100?img={{ $key + 1 }}" 
                                         class="rounded-circle mb-3" 
                                         width="80" 
                                         alt="{{ $testi['name'] }}">
                                    <p class="lead fst-italic mb-3">"{{ $testi['comment'] }}"</p>
                                    <h5 class="text-success">{{ $testi['name'] }}</h5>
                                    <div class="text-warning">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5 bg-success text-white">
    <div class="container text-center">
        <h2 class="fw-bold mb-4">Siap Memulai Hidup Sehat?</h2>
        <p class="lead mb-4">Bergabunglah dengan ribuan pelanggan puas kami</p>
        <a href="{{ route('login') }}" class="btn btn-light btn-lg px-4">
            Daftar Sekarang <i class="bi bi-arrow-right ms-2"></i>
        </a>
    </div>
</section>
@endsection