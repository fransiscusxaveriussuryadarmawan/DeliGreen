@extends('components.app')

@section('content')

<div class="container py-4">
    <h1 class="text-success mb-4">{{ $category->name }}</h1>

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
@endsection