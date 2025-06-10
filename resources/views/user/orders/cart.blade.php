@extends('components.app')

@section('content')
<div class="container py-4">
    <h2>Keranjang Saya</h2>
    <p>Berikut adalah daftar makanan yang telah Anda tambahkan ke keranjang.</p>
    <hr>

    @if($cartItems->isEmpty())
        <div class="alert alert-warning" role="alert">
            Keranjang Anda kosong! Silakan tambahkan makanan ke keranjang.
        </div>
        <a href="{{ route('user.foods.index') }}" class="btn btn-success">Lihat Makanan</a>
    @else
        <table class="table table-striped align-middle">
            <thead>
                <tr>
                    <th>Nama Makanan</th>
                    <th>Harga Satuan</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $item)
                <tr>
                    <td>{{ $item->food->name }}</td>
                    <td>Rp {{ number_format($item->food->price, 0, ',', '.') }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>Rp {{ number_format($item->food->price * $item->quantity, 0, ',', '.') }}</td>
                    <td>
                        <!-- Bisa tambahkan tombol hapus atau update quantity -->
                        <form action="{{ route('user.cart.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus item?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="3" class="text-end fw-bold">Total Harga</td>
                    <td colspan="2" class="fw-bold">Rp {{ number_format($totalPrice, 0, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>

        <a href="{{ route('user.orders.create') }}" class="btn btn-success">
            Lanjutkan ke Pemesanan
        </a>
    @endif
</div>
@endsection