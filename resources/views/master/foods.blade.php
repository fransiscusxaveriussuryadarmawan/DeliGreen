@extends('components.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="display-4 text-success fw-bold">Master Foods</h1>
            <p class="lead text-muted">Kelola menu makanan sehat DeliGreen</p>
        </div>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <!-- Action Bar -->
            <div class="d-flex justify-content-between mb-4">
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addFoodModal">
                    <i class="bi bi-plus-circle"></i> Tambah Makanan
                </button>
                <div class="w-25">
                    <input type="text" class="form-control" placeholder="Cari makanan...">
                </div>
            </div>

            <!-- Table -->
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Gambar</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Kalori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for($i = 1; $i <= 10; $i++)
                        <tr>
                            <td>F{{ str_pad($i, 3, '0', STR_PAD_LEFT) }}</td>
                            <td>
                                <img src="https://via.placeholder.com/80x60?text=Food{{ $i }}" 
                                     class="rounded" 
                                     style="width: 80px; height: 60px; object-fit: cover;">
                            </td>
                            <td>Salad Sayur Organik</td>
                            <td>Vegetarian</td>
                            <td>Rp 45.000</td>
                            <td>350 kcal</td>
                            <td>
                                <button class="btn btn-sm btn-outline-success me-2">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>
                        @endfor
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <nav class="mt-4">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>

<!-- Add Food Modal -->
<div class="modal fade" id="addFoodModal" tabindex="-1" aria-hidden="true">
    <!-- Modal content here -->
</div>
@endsection