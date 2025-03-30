@extends('components.app')

@section('title', 'Category Report')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Category Analytics</h5>
    </div>
    <div class="card-body">
        @if($topCategory)
            <div class="alert alert-success">
                <strong>Top Category:</strong> 
                {{ $topCategory->name }} 
                ({{ $topCategory->foods_count }} foods)
            </div>
        @else
            <div class="alert alert-warning">No data available.</div>
        @endif
    </div>
</div>
@endsection