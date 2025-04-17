@extends('components.app')

@section('content')
<div class="container-fluid py-4">

    <div class="row mb-4">
        <div class="col-12">
            <h1 class="display-4 text-success fw-bold">Dashboard DeliGreen</h1>
            <p class="lead text-muted">Selamat datang di sistem pemesanan makanan sehat.</p>
        </div>
    </div>

    <div class="row g-4 mb-5">
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <h5 class="card-title text-muted mb-3">Total Omzet</h5>
                    <div class="d-flex align-items-center justify-content-between">
                        <h2 class="text-success mb-0">Rp {{ number_format($totalOmzet, 0, ',', '.') }}</h2>
                        <i class="bi bi-currency-dollar fs-1 text-success"></i>
                    </div>
                    <div class="mt-3">
                        <span class="badge bg-success">+15% dari kemarin</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <h5 class="card-title text-muted mb-3">Pesanan Aktif</h5>
                    <div class="d-flex align-items-center justify-content-between">
                        <h2 class="text-primary mb-0">{{ $activeOrders }}</h2>
                        <i class="bi bi-cart-check fs-1 text-primary"></i>
                    </div>
                    <div class="mt-3">
                        <span class="badge bg-primary">3 pesanan baru</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <h5 class="card-title text-muted mb-3">Produk Terlaris</h5>
                    <ul class="list-group list-group-flush">
                        @foreach ($bestSellers as $item)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>{{ $item['name'] }}</span>
                            <span class="badge bg-success">{{ $item['sold'] }}x Terjual</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-12 col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title text-muted mb-4">Omzet Bulanan</h5>
                    <div style="height: 300px;">
                        <canvas id="omzetChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title text-muted mb-4">Aktivitas Terbaru</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>Pesanan #1234</span>
                            <span class="badge bg-success">Selesai</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>Pesanan #1235</span>
                            <span class="badge bg-warning">Diproses</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>Pesanan #1236</span>
                            <span class="badge bg-danger">Dibatalkan</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('omzetChart').getContext('2d');
    const omzetChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul'],
            datasets: [{
                label: 'Omzet (Rp)',
                data: [1000000, 1500000, 2000000, 1800000, 2200000, 2450000, 2300000],
                borderColor: '#2ecc71',
                tension: 0.4,
                fill: true,
                backgroundColor: 'rgba(46, 204, 113, 0.1)',
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return 'Rp ' + value.toLocaleString();
                        }
                    }
                }
            },
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return 'Omzet: Rp ' + context.raw.toLocaleString();
                        }
                    }
                }
            }
        }
    });
</script>
@endsection