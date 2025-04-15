@extends('components.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="display-4 text-success fw-bold">Master Customers</h1>
            <p class="lead text-muted">Kelola data pelanggan DeliGreen</p>
        </div>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No. HP</th>
                            <th>Total Pesanan</th>
                            <th>Bergabung</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($customers as $customer)
                        <tr>
                            <td>C{{ str_pad($customer->id, 3, '0', STR_PAD_LEFT) }}</td>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->phone }}</td>
                            <td>{{ $customer->orders_count }}x</td>
                            <td>{{ $customer->created_at->format('d M Y') }}</td>
                            <td>
                                <a href="{{ route('admin.customers.detail', $customer->id) }}" class="btn btn-sm btn-outline-success">
                                    <i class="bi bi-eye"></i> Detail
                                </a>                                
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada data pelanggan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>
</div>
@endsection