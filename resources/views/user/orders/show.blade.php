@extends('components.app')

@section('content')
<div class="container py-4">
    <h2 class="text-success mb-4">🧾 Detail Pesanan #{{ $order->id }}</h2>

    <p><strong>Tanggal Pesanan:</strong> {{ $order->created_at->format('d M Y H:i') }}</p>

    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>Nama Makanan</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Subtotal</th>  <!-- Subtotal berada di dalam kolom yang sesuai -->
            </tr>
        </thead>
        <tbody>
            @foreach($order->items as $item)
            <tr>
                <td>{{ $item->food->name }}</td>
                <td>Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                <td>{{ $item->quantity }}</td>
                <td>Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</td>
            </tr>
            @endforeach
            <tr class="fw-bold">
                <td colspan="3" class="text-end">Total</td>  <!-- Memastikan Total berada di kolom yang sama -->
                <td>Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>

    <!-- Menampilkan Jenis Pemesanan (Dine In / Takeaway) setelah subtotal -->
    <p><strong>Jenis Pemesanan:</strong> 
        @if($order->order_type == 'dine_in')
            <span class="badge bg-info">Dine In</span>
        @else
            <span class="badge bg-secondary">Takeaway</span>
        @endif
    </p>

    <p><strong>Status:</strong>
        @if($order->status === 'pending')
        <span class="badge bg-info">Menunggu</span>
        @elseif($order->status === 'processing')
        <span class="badge bg-warning text-dark">Diproses</span>
        @elseif($order->status === 'completed')
        <span class="badge bg-success">Selesai</span>
        @endif
    </p>

    <a href="{{ route('member.orders.index') }}" class="btn btn-success mt-3">
        <i class="fas fa-arrow-left me-1"></i> Kembali ke Daftar Pesanan
    </a>
</div>
@endsection