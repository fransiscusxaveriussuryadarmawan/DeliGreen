@extends('components.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="display-4 text-success fw-bold">Master Orders</h1>
            <p class="lead text-muted">Kelola pesanan pelanggan</p>
        </div>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <!-- Filter -->
            <div class="row mb-4">
                <div class="col-md-3">
                    <select class="form-select">
                        <option>Semua Status</option>
                        <option>Diproses</option>
                        <option>Selesai</option>
                        <option>Dibatalkan</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <input type="date" class="form-control">
                </div>
            </div>

            <!-- Table -->
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>ID Pesanan</th>
                            <th>Pelanggan</th>
                            <th>Tanggal</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for($i = 1; $i <= 10; $i++)
                        <tr>
                            <td>#ORD{{ str_pad($i, 3, '0', STR_PAD_LEFT) }}</td>
                            <td>Pelanggan {{ $i }}</td>
                            <td>{{ now()->subDays(rand(1, 30))->format('d M Y H:i') }}</td>
                            <td>Rp {{ number_format(rand(50, 200) * 1000, 0, ',', '.') }}</td>
                            <td>
                                @php $status = ['Diproses', 'Selesai', 'Dibatalkan'][rand(0,2)] @endphp
                                <span class="badge 
                                    @if($status == 'Selesai') bg-success 
                                    @elseif($status == 'Diproses') bg-warning 
                                    @else bg-danger @endif">
                                    {{ $status }}
                                </span>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-outline-success">
                                    <i class="bi bi-eye"></i> Detail
                                </button>
                            </td>
                        </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection