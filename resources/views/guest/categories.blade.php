@extends('components.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Kategori Makanan</h2>

    <div class="row">
        @foreach($categories as $category)
        <div class="col-md-4">
            <div class="card mb-3 shadow-sm">
                <div class="card-body">
                    <h5>{{ $category->name }}</h5>
                    <p class="text-muted">{{ $category->description ?? '-' }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection