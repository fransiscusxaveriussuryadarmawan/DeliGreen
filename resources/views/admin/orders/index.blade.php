@extends('components.app')

@section('content')
<div class="container-fluid py-4">
    <!-- Success Message -->
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="row mb-4">
        <div class="col-12">
            <h1 class="display-4 text-success fw-bold">Master Orders</h1>
            <p class="lead text-muted">Kelola pesanan pelanggan</p>
        </div>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <form method="GET" action="{{ route('admin.orders.index') }}">
                <div class="row mb-4">
                    <div class="col-md-3">
                        <select class="form-select" name="status" onchange="this.form.submit()">
                            <option value="">All</option>
                            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="canceled" {{ request('status') == 'canceled' ? 'selected' : '' }}>Canceled</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <input type="date" class="form-control" name="date" value="{{ request('date') }}" onchange="this.form.submit()">
                    </div>
                </div>
            </form>


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
                        @forelse($orders as $order)
                        <tr>
                            <td>#ORD{{ str_pad($order->id, 3, '0', STR_PAD_LEFT) }}</td>
                            <td>{{ $order->customer->name }}</td>
                            <td>{{ $order->created_at->format('d M Y H:i') }}</td>
                            <td>$ {{ number_format($order->total_price, 2, ',', '.') }}</td>
                            <td>
                                <span class="badge 
                                    @if($order->status == 'completed') bg-success 
                                    @elseif($order->status == 'pending') bg-warning 
                                    @else bg-danger @endif">
                                    {{ $order->status }}
                                </span>
                            </td>
                            <td>
                                <!-- <button class="btn btn-sm btn-outline-success">
                                    <i class="bi bi-eye"></i> Detail
                                </button> -->

                                <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-outline-success">
                                    <i class="bi bi-eye"></i> Detail
                                </a>

                            </td>
                        </tr>
                        @empty

                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection