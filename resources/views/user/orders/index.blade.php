@extends('components.app')

@section('content')
<div class="container py-4">
    <h2 class="text-success mb-4">🛒 Keranjang Anda</h2>

    @if(count($cart) > 0)
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nama Makanan</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0; @endphp
            @foreach($cart as $id => $item)
            @php $subtotal = $item['price'] * $item['quantity']; $total += $subtotal; @endphp
            <tr>
                <td>{{ $item['name'] }}</td>
                <td>Rp {{ number_format($item['price'], 0, ',', '.') }}</td>
                <td>
                    <form action="{{ route('user.orders.update') }}" method="POST" class="d-flex align-items-center">
                        @csrf
                        <input type="hidden" name="food_id" value="{{ $id }}">
                        <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="form-control form-control-sm me-2" style="width: 70px;">
                        <button class="btn btn-sm btn-primary">Ubah</button>
                    </form>
                </td>
                <td>Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                <td>
                    <form method="POST" action="{{ route('user.orders.remove') }}">
                        @csrf
                        <input type="hidden" name="food_id" value="{{ $id }}">
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
            <tr class="fw-bold">
                <td colspan="3">Total</td>
                <td colspan="2">Rp {{ number_format($total, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>

    <form method="POST" action="{{ route('user.orders.checkout') }}">
        @csrf
        <button class="btn btn-success">Checkout Sekarang</button>
    </form>

    @else
    <div class="alert alert-info">Keranjang Anda kosong. Silakan tambahkan makanan dari halaman <a href="{{ route('user.foods.index') }}">Daftar Makanan</a>.</div>
    @endif
</div>
@endsection