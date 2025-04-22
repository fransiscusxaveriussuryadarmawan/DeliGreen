@extends('components.app')

@section('content')
<div class="row">

    <div class="col-md-3 mb-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="mb-3">Filter</h5>
                <div class="mb-4">
                    <label class="form-label">Kategori</label>
                    <select class="form-select">
                        <option>Semua</option>
                        <option>Vegetarian</option>
                        <option>Vegan</option>
                        <option>Low-Carb</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label">Kisaran Harga</label>
                    <input type="range" class="form-range" min="0" max="100000">
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-9">
        <div class="row g-4">
            @for($i = 0; $i < 8; $i++)
                <div class="col-md-6 col-lg-4">
                <div class="card food-card h-100 shadow-sm">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Salad">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-2">
                            <h5 class="card-title">Salad Sayur Organik</h5>
                            <span class="badge bg-success">350 kcal</span>
                        </div>
                        <p class="text-muted small">Tomat, Selada, Zaitun, Dressing...</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="text-success">Rp 45.000</h4>
                            <button class="btn btn-sm btn-outline-success"
                                data-bs-toggle="modal"
                                data-bs-target="#customizeModal">
                                <i class="bi bi-gear"></i> Custom
                            </button>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
</div>
</div>

</div>
@endsection