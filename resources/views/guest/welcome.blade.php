@extends('components.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/guest.css') }}">
@endsection

@section('content')
<section class="hero-section py-5" style="background: linear-gradient(rgba(255,255,255,0.9), rgba(255,255,255,0.9)), url('https://images.unsplash.com/photo-1490645935967-10de6ba17061?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80'); background-size: cover; min-height: 80vh;">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-lg-6">
                <h1 class="display-3 fw-bold text-success mb-4">DeliGreen</h1>
                <p class="lead mb-4">Makan sehat jadi mudah dengan pesanan online kami. Mulai hidup sehat hari ini!</p>
                <div class="d-flex gap-3">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#loginModal">
                        <i class="fas fa-sign-in-alt"></i> Login
                    </button>
                    <a href="{{ route('guest.foods.index') }}" class="btn btn-outline-success btn-lg px-4">
                        <i class="bi bi-egg-fried me-2"></i> Lihat Menu
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="categories" class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-success">Kategori Pilihan</h2>
            <p class="text-muted">Temukan makanan sesuai kebutuhan dietmu</p>
        </div>
        <div class="row g-4">
            @foreach($categories as $category)
            <div class="col-6 col-md-3">
                <div class="card border-0 shadow-sm h-100 hover-lift">
                    <img src="https://picsum.photos/id/1/200/300"
                        class="card-img-top"
                        alt="{{ $category->slug }}"
                        style="height: 150px; object-fit: cover;">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $category->name }}</h5>
                        <a href="#" class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#loginModal">Lihat Menu</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section id="menu" class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-success">Menu Populer</h2>
            <p class="text-muted">Favorit pelanggan kami</p>
        </div>
        <div class="row g-4">
            @foreach($foods as $food)
            <div class="col-6 col-md-3">
                <div class="card border-0 shadow-sm h-100 hover-lift">
                    {{-- Gunakan ratio yang sama untuk semua gambar makanan --}}
                    <div class="ratio ratio-1x1">
                        @if ($food->image && Storage::exists('foods/' . $food->image))
                        {{-- Jika gambar ada di storage, tampilkan --}}
                        <img src="{{ asset('storage/foods/' . $food->image) }}"
                             style="object-fit: cover; height: 200px;" 
                             class="card-img-top object-fit-cover"
                             alt="{{ $food->name }}">
                        @else
                        {{-- Jika tidak ada gambar, tampilkan placeholder --}}
                        <img src="https://picsum.photos/id/1/200/300"
                             style="object-fit: cover; height: 200px;"
                             class="card-img-top object-fit-cover"
                             alt="{{ $food->name }}">
                        @endif
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $food->name }}</h5>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="text-success fw-bold">Rp {{ number_format($food->price, 0, ',', '.') }}</span>
                        </div>
                        <p class="card-text text-muted small">{{ Str::limit($food->description, 50) }}</p>
                    </div>
                    <div class="card-footer bg-white border-0 pt-0">
                        <a href="#" class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#loginModal">
                            <i class="fas fa-shopping-cart me-1"></i> Pesan Sekarang
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#loginModal">
                Lihat Menu Lengkap <i class="bi bi-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>

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
@endsection

@push('modals')
    @include('components.login')
    @include('auth.register')
@endpush