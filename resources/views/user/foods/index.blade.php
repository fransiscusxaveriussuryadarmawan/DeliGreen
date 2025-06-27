@extends('components.app')

@section('content')

<!-- Modal untuk pilihan Dine In atau Takeaway -->
<div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="orderModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="orderModalLabel">Pilih Opsi Pemesanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Silakan pilih opsi pemesanan Anda:</p>
                <div class="d-grid gap-2">
                    <button class="btn btn-success" id="dineInBtn">Dine In</button>
                    <button class="btn btn-outline-success" id="takeawayBtn">Takeaway</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container py-4">
    <h1 class="text-success mb-4">Daftar Makanan</h1>
    <div class="container">

        <div class="row mb-4">
            <div class="col-md-6">
                <form action="{{ route('member.foods.index') }}" method="GET">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control"
                            placeholder="Search food..." value="{{ request('search') }} ">
                        <button class="btn btn-success" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </form>
            </div>

            <div class="col-md-6">
                <form action="{{ route('member.foods.index') }}" method="GET">
                    @if(request('search'))
                    <input type="hidden" name="search" value="{{ request('search') }}">
                    @endif

                    <div class="input-group">
                        <select class="form-select" name="category">
                            <option value="">All Categories</option>
                            @foreach($categories as $cat)
                            <option value="{{ $cat->slug }}"
                                {{ request('category') == $cat->slug ? 'selected' :   '' }}>
                                {{ $cat->name }}
                            </option>
                            @endforeach
                        </select>
                        <button class="btn btn-outline-success" type="submit">Filter
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="row g-4">
            @foreach($foods as $food)
            <div class="col-6 col-md-4">
                <div class="card">
                    <img src="{{ asset('storage/' . $food->image) }}" style="height: 200px; object-fit: cover;" class="card-img-top" alt="{{ $food->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $food->name }}</h5>
                        <p class="card-text">{{ $food->description }}</p>
                        <p class="fw-bold">Rp {{ number_format($food->price, 0, ',', '.') }}</p>

                        <button class="btn btn-outline-success btn-sm px-2 py-1 love-toggle" data-id="{{ $food->id }}" style="border-radius: 6px;">
                            <i class="fas fa-heart text-secondary"></i>
                        </button>

                        <form action="{{ route('member.orders.add') }}" method="POST" class="d-inline">
                            @csrf
                            <input type="hidden" name="food_id" value="{{ $food->id }}">
                            <button class="btn btn-success btn-sm">
                                <i class="fas fa-shopping-cart me-1"></i> Tambah ke Keranjang
                            </button>
                        </form>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @if ($foods->hasPages())
        <div class="mt-4">
            {{ $foods->links() }}
        </div>
        @endif
    </div>
</div>
<script>
    window.onload = function() {
    // Check if the order type is already set in sessionStorage
    if (!sessionStorage.getItem('orderType')) {
        let modal = new bootstrap.Modal(document.getElementById('orderModal'));
        modal.show();

        // Store the order type in sessionStorage when the user selects "Dine In" or "Takeaway"
        document.getElementById('dineInBtn').addEventListener('click', function() {
            sessionStorage.setItem('orderType', 'dine_in');
            fetch("{{ route('member.orders.setOrderType') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({ orderType: "dine_in" }) 
            });
            modal.hide();
        });

        document.getElementById('takeawayBtn').addEventListener('click', function() {
            sessionStorage.setItem('orderType', 'takeaway');
            fetch("{{ route('member.orders.setOrderType') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({ orderType: "takeaway" })
            });
            modal.hide();
        });
    }
}
</script>
@endsection