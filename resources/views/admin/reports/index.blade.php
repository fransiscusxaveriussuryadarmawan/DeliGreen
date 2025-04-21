@extends('components.app')

@section('content')

<div class="container-fluid py-4">

    <div class="row mb-4">
        <div class="col-12">
            <h1 class="display-4 text-success fw-bold">Laporan & Statistik</h1>
            <p class="lead text-muted">Laporan restoran berdasarkan data transaksi dan pelanggan</p>
        </div>
    </div>

    <div class="mb-4 text-end">
        <button id="btnOpenModal" class="btn btn-primary">
            ℹ️ Penjelasan
        </button>
    </div>

    <div class="modal fade" id="reportInfoModal" tabindex="-1" aria-labelledby="reportInfoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content shadow-lg rounded-4">
                <div class="modal-header text-white" style="background: linear-gradient(to right, #00c6ff, #0072ff); border-top-left-radius: 1rem; border-top-right-radius: 1rem;">
                    <h5 class="modal-title fw-bold" id="reportInfoModalLabel">📋 Penjelasan Laporan</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <ul class="list-unstyled">
                        <li class="mb-2">🟢 <strong>Customer Terbanyak:</strong> Menampilkan daftar pelanggan yang paling sering memesan.</li>
                        <li class="mb-2">🔥 <strong>Produk Populer:</strong> Menampilkan produk yang paling sering dipesan.</li>
                        <li class="mb-2">📊 <strong>Kategori Favorit:</strong> Statistik bulanan kategori yang paling banyak dipilih.</li>
                        <li class="mb-2">💰 <strong>Pendapatan:</strong> Total pendapatan yang dihitung berdasarkan pesanan per bulan.</li>
                        <li class="mb-2">🏆 <strong>Ranking Pelanggan:</strong> Urutan pelanggan berdasarkan jumlah total pemesanan.</li>
                    </ul>
                    <p class="text-muted">Klik pada setiap kotak laporan untuk melihat detail datanya dalam bentuk tabel !</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <a href="javascript:void(0);" onclick="loadReport('top-customer')" class="text-decoration-none text-dark">
            <div class="col-md-6 mb-4">
                <div class="card border-start border-success shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Customer dengan Order Terbanyak</h5>
                        <p class="card-text">
                            <strong>{{ $topCustomer->name ?? '-' }}</strong><br>
                            Total Order: {{ $topCustomer->orders_count ?? 0 }}
                        </p>
                    </div>
                </div>
            </div>
        </a>

        <a href="javascript:void(0);" onclick="loadReport('top-food')" class="text-decoration-none text-dark">
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
        </a>

        <a href="javascript:void(0);" onclick="loadReport('completion-rate')" class="text-decoration-none text-dark">
            <div class="col-md-6 mb-4">
                <div class="border border-secondary rounded p-4">
                    <h5>📈 Order Completion Rate</h5>
                    <p class="mb-1">Completed: <strong>{{ $completionRate }}%</strong></p>
                    <p class="mb-0">Canceled: <strong>{{ $cancelRate }}%</strong></p>
                </div>
            </div>
        </a>

        <a href="javascript:void(0);" onclick="loadReport('top-category')" class="text-decoration-none text-dark">
            <div class="col-md-6 mb-4">
                <div class="card border-start border-primary shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Kategori Makanan Favorit Bulan Ini</h5>
                        <p class="card-text">
                            <strong>{{ $topCategory->name ?? '-' }}</strong><br>
                            Total Pesanan: {{ $topCategory->total_orders ?? 0 }}
                        </p>
                    </div>
                </div>
            </div>
        </a>

        <a href="javascript:void(0);" onclick="loadReport('monthly-revenue')" class="text-decoration-none text-dark">
            <div class="col-md-6 mb-4">
                <div class="card border-start border-warning shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Pendapatan Bulan Ini</h5>
                        <p class="card-text">
                            Rp {{ number_format($monthlyRevenue, 2, ',', '.') }}
                        </p>
                    </div>
                </div>
            </div>
        </a>

        <div id="report-detail" class="mt-5"></div>

        <script>
            let activeReport = null;

            function loadReport(type) {
                if (activeReport === type) {
                    $('#report-detail').fadeOut(300, function() {
                        $(this).html('');
                    });
                    activeReport = null;
                    return;
                }

                $.get(`/admin/reports/load/${type}`, function(data) {
                    $('#report-detail').hide().html(data).fadeIn(300);
                    $('html, body').animate({
                        scrollTop: $('#report-detail').offset().top - 100
                    }, 500);
                    activeReport = type;
                });
            }

            $(document).ready(function() {
                $('#btnOpenModal').click(function() {
                    $('#reportInfoModal').modal('show');
                });
            });
        </script>

    </div>
</div>

@endsection