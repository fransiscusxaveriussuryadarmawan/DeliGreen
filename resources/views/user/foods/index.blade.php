@extends('components.app')

@section('content')
<div class="container py-4">
    <div class="container">
            <h2 class="fw-bold text-success text-center">Our Menu</h2>
            <!-- Search and Filter Section -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <form action="{{ route('user.foods.index') }}" method="GET">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control"
                                    placeholder="Search food..." value="{{ request('search') }} ">
                                <button class="btn btn-success" type="submit"><i class="fas fa-search"></i></button>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-6">
                        <form action="{{ route('user.foods.index') }}" method="GET">
                            <!-- Pertahankan parameter pencarian -->
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
                            <img src="https://picsum.photos/id/63/200/300" style="height: 200px; object-fit: cover;" class="card-img-top" alt="{{ $food->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $food->name }}</h5>
                                <p class="card-text">{{ $food->description }}</p>
                                <p class="fw-bold">Rp {{ number_format($food->price, 0, ',', '.') }}</p>
                                <!-- Tombol untuk memesan makanan -->
                                <a href="#" class="btn btn-success">Pesan Sekarang</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            {{ $foods->links() }}
        </div>
</div>
@endsection