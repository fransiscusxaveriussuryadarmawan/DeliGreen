@extends('components.app')
@section('title', 'Laporan')
@section('content')

<div class="container-fluid py-4">
    <h1 class="display-5 fw-bold text-success">📊 Laporan & Statistik</h1>
    <p class="text-muted">Ringkasan performa restoran berdasarkan data transaksi dan pelanggan.</p>

    <div class="row mt-4">

        <div class="col-md-6 mb-4">
            <div class="card border-start border-success shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Customer dengan Order Terbanyak</h5>
                    <p class="card-text">
                        <strong>{{ $topCustomer->name ?? '-' }}</strong> <br>
                        Total Order: {{ $topCustomer->orders_count ?? 0 }}
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card border-start border-info shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Produk Paling Sering Dipesan</h5>
                    <p class="card-text">
                        <strong>{{ $topFood->name ?? '-' }}</strong><br>
                        Jumlah Terjual: {{ $topFood->total_sold ?? 0 }}
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card border-start border-warning shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Pendapatan Bulan Ini</h5>
                    <p class="card-text">
                        $ {{ number_format($monthlyRevenue, 2, ',', '.') }}
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card border-start border-primary shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Kategori Makanan Favorit Bulan Ini</h5>
                    <p class="card-text">
                        <strong>{{ $topCategory->name ?? '-' }}</strong> <br>
                        Total Pesanan: {{ $topCategory->total_orders ?? 0 }}
                    </p>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection