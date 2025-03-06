@extends('components.app')

@section('content')
<div class="row">
    <!-- Sidebar -->
    <div class="col-md-3">
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action active">Dashboard</a>
            <a href="#" class="list-group-item list-group-item-action">Kelola Menu</a>
            <a href="#" class="list-group-item list-group-item-action">Riwayat Pesanan</a>
            <a href="#" class="list-group-item list-group-item-action">Laporan</a>
        </div>
    </div>

    <!-- Konten -->
    <div class="col-md-9">
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Total Omzet Hari Ini</h5>
                        <h2 class="text-success">Rp 2.450.000</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Pesanan Aktif</h5>
                        <h2 class="text-primary">15</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="card-title mb-4">5 Produk Terlaris</h5>
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Salad Sayur Organik</span>
                        <span class="badge bg-success">45x</span>
                    </li>
                    <!-- Tambahkan item lainnya -->
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection