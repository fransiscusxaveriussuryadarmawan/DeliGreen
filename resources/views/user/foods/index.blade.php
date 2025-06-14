@extends('components.app')

@section('content')

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<div class="container py-4">
    <h2 class="mb-4">Daftar Makanan</h2>

    <p class="text-muted">Ini adalah halaman daftar makanan untuk member.</p>
</div>

<style>
    .bg-light-success {
        background-color: #e6f4ea;
    }
</style>
@endsection