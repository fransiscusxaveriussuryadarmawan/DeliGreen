@extends('components.app')

@section('content')

<div class="container-fluid py-4">

    <div class="row mb-4">
        <div class="col-12">
            <h1 class="display-4 text-success fw-bold">Laporan & Statistik</h1>
            <p class="lead text-muted">Laporan restoran berdasarkan data transaksi dan pelanggan</p>
        </div>
    </div>

    <div class="mb-4">
        <button id="showInfo" class="btn btn-outline-info">
            📌 Penjelasan Laporan
        </button>
        <div id="infoBox" class="alert alert-secondary d-none mt-3">
            Halaman ini menyajikan ringkasan data performa restoran seperti pelanggan teraktif,
            produk terlaris, kategori favorit, serta persentase penyelesaian order.
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
                            $ {{ number_format($monthlyRevenue, 2, ',', '.') }}
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

            $('#showInfo').click(function() {
                $('#infoBox').toggleClass('d-none');
            });
        </script>




    </div>
</div>

@endsection