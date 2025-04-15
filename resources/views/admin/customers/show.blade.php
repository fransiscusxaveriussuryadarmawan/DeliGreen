@extends('components.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="display-4 text-success fw-bold">Detail Pelanggan</h1>
            <p class="lead text-muted">Informasi pelanggan dan riwayat pesanan</p>
        </div>
    </div>

    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">
            <h5 class="mb-3">Data Pelanggan</h5>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Nama:</strong> {{ $customer->name }}</li>
                <li class="list-group-item"><strong>Email:</strong> {{ $customer->email }}</li>
                <li class="list-group-item"><strong>No. HP:</strong> {{ $customer->phone }}</li>
                <li class="list-group-item"><strong>Bergabung Sejak:</strong> {{ $customer->created_at->format('d M Y') }}</li>
            </ul>
        </div>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <h5 class="mb-3">Riwayat Pesanan</h5>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>ID Pesanan</th>
                            <th>Tanggal</th>
                            <th>Total</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $order)
                        <tr>
                            <td>#ORD{{ str_pad($order->id, 3, '0', STR_PAD_LEFT) }}</td>
                            <td>{{ $order->created_at->format('d M Y H:i') }}</td>
                            <td>Rp {{ number_format($order->total, 0, ',', '.') }}</td>
                            <td>
                                <span class="badge 
                                    @if($order->status == 'Selesai') bg-success 
                                    @elseif($order->status == 'Diproses') bg-warning 
                                    @else bg-danger @endif">
                                    {{ $order->status }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">Belum ada pesanan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection