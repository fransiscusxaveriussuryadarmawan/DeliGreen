@extends('components.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="display-4 text-success fw-bold">Selamat Datang, {{ Auth::user()->name }}!</h1>
            <p class="lead text-muted">Temukan makanan sehat favoritmu dan pesan sekarang.</p>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-12">
            <div id="promoCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner rounded-3">
                    <div class="carousel-item active">
                        <img src="https://via.placeholder.com/1200x400?text=Promo+1" class="d-block w-100" alt="Promo 1">
                    </div>
                    <div class="carousel-item">
                        <img src="https://via.placeholder.com/1200x400?text=Promo+2" class="d-block w-100" alt="Promo 2">
                    </div>
                    <div class="carousel-item">
                        <img src="https://via.placeholder.com/1200x400?text=Promo+3" class="d-block w-100" alt="Promo 3">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#promoCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#promoCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-12">
            <h3 class="text-success mb-4">Kategori Makanan</h3>
            <div class="row g-4">
                <div class="col-6 col-md-4 col-lg-2">
                    <div class="card border-0 shadow-sm text-center">
                        <img src="https://via.placeholder.com/100x100?text=Vegetarian" class="card-img-top" alt="Vegetarian">
                        <div class="card-body">
                            <h6 class="card-title">Vegetarian</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-12">
            <h3 class="text-success mb-4">Rekomendasi untuk Anda</h3>
            <div class="row g-4">
                @for($i = 0; $i < 6; $i++)
                    <div class="col-12 col-md-6 col-lg-4">
                    <div class="card border-0 shadow-sm">
                        <img src="https://via.placeholder.com/400x300?text=Menu+{{ $i+1 }}" class="card-img-top" alt="Menu">
                        <div class="card-body">
                            <h5 class="card-title">Salad Sayur Organik</h5>
                            <p class="card-text text-muted small">Tomat, Selada, Zaitun, Dressing...</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="text-success mb-0">Rp 45.000</h4>
                                <button class="btn btn-sm btn-outline-success">
                                    <i class="bi bi-cart-plus"></i> Pesan
                                </button>
                            </div>
                        </div>
                    </div>
            </div>
            @endfor
        </div>
    </div>
</div>

<div class="row mb-5">
    <div class="col-12">
        <h3 class="text-success mb-4">Riwayat Pesanan</h3>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID Pesanan</th>
                        <th>Tanggal</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>#1234</td>
                        <td>12 Okt 2023</td>
                        <td>Rp 120.000</td>
                        <td><span class="badge bg-success">Selesai</span></td>
                        <td>
                            <a href="#" class="btn btn-sm btn-outline-success">
                                <i class="bi bi-eye"></i> Detail
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
@endsection