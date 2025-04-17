@extends('components.app')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card shadow-sm">
            <div class="card-body">
                <h4 class="mb-4">Keranjang Anda</h4>

                <div class="d-flex gap-3 mb-4">
                    <img src="https://via.placeholder.com/100x100" class="rounded" alt="Item">
                    <div class="flex-grow-1">
                        <h5>Salad Sayur Organik</h5>
                        <p class="text-muted small mb-1">Ukuran: Large, Bahan: No onion</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="input-group w-50">
                                <button class="btn btn-outline-secondary">-</button>
                                <input type="text" class="form-control text-center" value="2">
                                <button class="btn btn-outline-secondary">+</button>
                            </div>
                            <h5 class="text-success mb-0">Rp 90.000</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card shadow-sm sticky-top">
            <div class="card-body">
                <h5 class="mb-3">Ringkasan Pesanan</h5>
                <div class="mb-3">
                    <label class="form-label">Pilih Metode</label>
                    <select class="form-select">
                        <option>Dine-in</option>
                        <option>Take-away</option>
                    </select>
                </div>

                <div class="list-group mb-3">
                    <div class="list-group-item d-flex justify-content-between">
                        <span>Subtotal</span>
                        <span>Rp 135.000</span>
                    </div>
                    <div class="list-group-item d-flex justify-content-between">
                        <span>PPN 10%</span>
                        <span>Rp 13.500</span>
                    </div>
                    <div class="list-group-item d-flex justify-content-between fw-bold">
                        <span>Total</span>
                        <span class="text-success">Rp 148.500</span>
                    </div>
                </div>

                <button class="btn btn-success w-100">Lanjut ke Pembayaran</button>
            </div>
        </div>
    </div>
</div>
@endsection