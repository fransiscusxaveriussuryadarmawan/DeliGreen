@extends('components.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/guest.css') }}">
@endsection

@section('content')
<!-- Hero Section -->
<section class="hero-section py-5" style="background: linear-gradient(rgba(255,255,255,0.9), rgba(255,255,255,0.9)), url('https://images.unsplash.com/photo-1490645935967-10de6ba17061?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80'); background-size: cover; min-height: 80vh;">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-lg-6">
                <h1 class="display-3 fw-bold text-success mb-4">DeliGreen</h1>
                <p class="lead mb-4">Makan sehat jadi mudah dengan pesanan online kami. Mulai hidup sehat hari ini!</p>
                <div class="d-flex gap-3">
                    <a href="{{ route('login') }}" class="btn btn-success btn-lg px-4">
                        <i class="bi bi-box-arrow-in-right me-2"></i> Login
                    </a>
                    <a href="#menu" class="btn btn-outline-success btn-lg px-4">
                        <i class="bi bi-egg-fried me-2"></i> Lihat Menu
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Categories -->
<section id="categories" class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-success">Kategori Pilihan</h2>
            <p class="text-muted">Temukan makanan sesuai kebutuhan dietmu</p>
        </div>
        <div class="row g-4">
            @foreach(['Vegetarian', 'Vegan', 'Low-Carb', 'Protein Tinggi'] as $category)
            <div class="col-6 col-md-3">
                <div class="card border-0 shadow-sm h-100 hover-lift">
                    <img src="https://source.unsplash.com/random/300x200/?{{ strtolower($category) }}" 
                         class="card-img-top" 
                         alt="{{ $category }}"
                         style="height: 150px; object-fit: cover;">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $category }}</h5>
                        <a href="{{ route('login') }}" class="btn btn-sm btn-link text-success">Lihat Menu</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Featured Menu -->
<section id="menu" class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-success">Menu Populer</h2>
            <p class="text-muted">Favorit pelanggan kami</p>
        </div>
        <div class="row g-4">
            @foreach([
                ['name' => 'Salad Sayur Organik', 'price' => 45000, 'calories' => 320],
                ['name' => 'Bowl Avocado', 'price' => 55000, 'calories' => 420],
                ['name' => 'Smoothie Mangga', 'price' => 35000, 'calories' => 280],
                ['name' => 'Nasi Goreng Quinoa', 'price' => 50000, 'calories' => 380]
            ] as $item)
            <div class="col-6 col-md-3">
                <div class="card border-0 shadow-sm h-100 hover-lift">
                    <img src="https://source.unsplash.com/random/300x200/?{{ str_replace(' ', '-', strtolower($item['name'])) }}" 
                         class="card-img-top" 
                         alt="{{ $item['name'] }}"
                         style="height: 150px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item['name'] }}</h5>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-success fw-bold">Rp {{ number_format($item['price'], 0, ',', '.') }}</span>
                            <span class="badge bg-light text-dark">{{ $item['calories'] }} kcal</span>
                        </div>
                    </div>
                    <div class="card-footer bg-white border-0">
                        <a href="{{ route('login') }}" class="btn btn-sm btn-success w-100">
                            <i class="bi bi-cart-plus me-1"></i> Pesan Sekarang
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('login') }}" class="btn btn-outline-success px-4">
                Lihat Menu Lengkap <i class="bi bi-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-success">Apa Kata Mereka?</h2>
            <p class="text-muted">Testimonial pelanggan puas</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach([
                                    ['name' => 'Sarah', 'comment' => 'Makanannya fresh dan pengiriman cepat!'],
                                    ['name' => 'Budi', 'comment' => 'Sudah langganan 2 tahun, kesehatan membaik.'],
                                    ['name' => 'Dewi', 'comment' => 'Anak-anak suka smoothienya, gizinya terjamin.']
                                ] as $key => $testi)
                                <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                    <div class="text-center p-3">
                                        <img src="https://i.pravatar.cc/100?img={{ $key + 3 }}" 
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
                                @endforeach
                            </div>
                        </div>
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
        <p class="lead mb-4">Daftar sekarang dan dapatkan diskon 20% untuk pesanan pertama!</p>
        <a href="{{ route('login') }}" class="btn btn-light btn-lg px-4">
            Daftar Sekarang <i class="bi bi-arrow-right ms-2"></i>
        </a>
    </div>
</section>
@endsection