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
                        @for($i = 1; $i <= 8; $i++)
                        <tr>
                            <td>C{{ str_pad($i, 3, '0', STR_PAD_LEFT) }}</td>
                            <td>Pelanggan {{ $i }}</td>
                            <td>customer{{ $i }}@example.com</td>
                            <td>0812-3456-789{{ $i }}</td>
                            <td>{{ rand(1, 20) }}x</td>
                            <td>{{ now()->subDays(rand(1, 90))->format('d M Y') }}</td>
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