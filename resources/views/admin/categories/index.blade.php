@extends('components.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="display-4 text-success fw-bold">Master Categories</h1>
            <p class="lead text-muted">Kelola kategori makanan</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title text-success">Tambah Kategori</h5>
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Nama Kategori</label>
                            <input type="text" class="form-control" placeholder="Contoh: Vegetarian">
                        </div>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title text-success">Daftar Kategori</h5>
                    <ul class="list-group">
                        @foreach(['Vegetarian', 'Vegan', 'Low-Carb', 'Protein Tinggi', 'Organik'] as $category)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $category }}
                            <span class="badge bg-success rounded-pill">15 menu</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection