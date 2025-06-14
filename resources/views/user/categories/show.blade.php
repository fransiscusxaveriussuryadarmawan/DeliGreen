@extends('components.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-success mb-0">{{ $category->name }}</h1>
        <span class="text-muted">{{ $foods->total() }} items available</span>
    </div>

    <div class="row g-3">
        @foreach ($foods as $food)
        <div class="col-md-6 col-lg-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="row g-0 align-items-center">
                    <div class="col-4">
                        <img src="{{ asset('storage/' . $food->image) }}" class="img-fluid rounded-start" alt="{{ $food->name }}" style="height:100px; object-fit:cover;">
                    </div>
                    <div class="col-8">
                        <div class="card-body position-relative pt-3 pb-1">
                            <span class="badge bg-light-success text-success position-absolute top-0 end-0 mt-2 me-2 rounded-pill px-3 py-2 shadow-sm">
                                Rp {{ number_format($food->price, 0, ',', '.') }}
                            </span>
                            <h6 class="text-muted mb-1">{{ $category->name }}</h6>
                            <h5 class="card-title mb-1">{{ $food->name }}</h5>
                            <p class="card-text small text-muted mb-1">{{ Str::limit($food->description, 60) }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="text-warning small">
                                    <i class="fas fa-star me-1"></i> 4.8 (120)
                                </div>
                                <div>
                                    <button class="btn btn-outline-success btn-sm px-2 py-1" style="border-radius: 6px;">
                                        <i class="fas fa-heart"></i>
                                    </button>
                                    <form method="POST" action="{{ route('user.foods.order') }}" class="d-inline">
                                        @csrf
                                        <input type="hidden" name="food_id" value="{{ $food->id }}">
                                        <button class="btn btn-success btn-sm">
                                            <i class="fas fa-shopping-cart me-1"></i> Pesan
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-4 d-flex justify-content-center">
        {{ $foods->links() }}
    </div>
</div>

<style>
    .bg-light-success {
        background-color: #e6f4ea;
    }
</style>
@endsection