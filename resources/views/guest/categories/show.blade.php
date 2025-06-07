@extends('components.app')

@section('content')
<div class="container py-5">
    <!-- Category Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="mb-0">{{ $category->name }}</h1>
            <p class="text-muted">{{ $foods->total() }} items available</p>
        </div>
        <a href="{{ route('guest.categories.index') }}" class="btn btn-outline-primary">
            <i class="fas fa-arrow-left me-2"></i>All Categories
        </a>
    </div>

    <!-- Food Grid -->
    @if($foods->count() > 0)
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @foreach($foods as $food)
        <div class="col">
            <div class="card h-100 shadow-sm border-0">
                <div class="position-relative">
                    <img src="{{ asset('storage/' . $food->image) }}" class="card-img-top" alt="{{ $food->name }}" style="height: 200px; object-fit: cover;">
                    <span class="badge bg-primary position-absolute top-0 end-0 m-2">Rp {{ number_format($food->price, 0, ',', '.') }}</span>
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $food->name }}</h5>
                    <p class="card-text text-muted">{{ Str::limit($food->description, 100) }}</p>
                    
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <span class="badge bg-light text-dark">
                            <i class="fas fa-star text-warning me-1"></i> {{ $food->rating ?? '4.5' }}
                        </span>
                        <a href="#" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-shopping-cart me-1"></i> Order
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="text-center py-5">
        <div class="py-5">
            <i class="fas fa-utensils fa-4x text-muted mb-4"></i>
            <h3>No food available in this category</h3>
            <p class="text-muted">Check back later for new additions</p>
            <a href="{{ route('guest.categories.index') }}" class="btn btn-primary mt-3">
                Browse Other Categories
            </a>
        </div>
    </div>
    @endif

    <!-- Pagination -->
    @if($foods->hasPages())
    <div class="d-flex justify-content-center mt-5">
        {{ $foods->links() }}
    </div>
    @endif
</div>

<style>
    .card {
        transition: all 0.3s ease;
        border-radius: 10px;
        overflow: hidden;
    }
    
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }
    
    .badge.bg-primary {
        font-size: 0.9rem;
        padding: 0.5rem 0.75rem;
    }
</style>
@endsection