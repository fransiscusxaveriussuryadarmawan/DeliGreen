@extends('components.app')

@section('content')
<div class="container py-4">
    <h2 class="text-success mb-4">🛒 Keranjang Anda</h2>

    @if(count($cart) > 0)
    <div class="d-flex justify-content-end mb-3 gap-2">
        <form method="POST" action="{{ route('member.orders.clear') }}">
            @csrf
            <button type="submit" class="btn btn-outline-danger">
                <i class="fas fa-trash-alt me-1"></i> Kosongkan Keranjang
            </button>
        </form>
    </div>

    {{-- TABEL UTAMA UNTUK DESKTOP --}}
    <div class="table-responsive d-none d-md-block">
        <table class="table table-striped align-middle">
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
                        <form action="{{ route('member.orders.update') }}" method="POST" class="d-flex align-items-center">
                            @csrf
                            <input type="hidden" name="food_id" value="{{ $id }}">
                            <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="form-control form-control-sm me-2 quantity-input" data-food-id="{{ $id }}" style="width: 70px;">
                        </form>
                    </td>
                    <td class="subtotal" data-id="{{ $id }}">Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                    <td>
                        <form method="POST" action="{{ route('member.orders.remove') }}">
                            @csrf
                            <input type="hidden" name="food_id" value="{{ $id }}">
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                <tr class="fw-bold">
                    <td colspan="3">Total</td>
                    <td colspan="2" class="total">Rp {{ number_format($total, 0, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    {{-- TAMPILAN MOBILE (KARTU PER ITEM) --}}
    <div class="d-block d-md-none">
        @php $total = 0; @endphp
        @foreach($cart as $id => $item)
        @php $subtotal = $item['price'] * $item['quantity']; $total += $subtotal; @endphp
        <div class="card mb-3 shadow-sm">
            <div class="card-body">
                <h5 class="card-title">{{ $item['name'] }}</h5>
                <p class="card-text mb-1">Harga: <strong>Rp {{ number_format($item['price'], 0, ',', '.') }}</strong></p>
                <p class="card-text mb-1">Subtotal: <strong class="subtotal" data-id="{{ $id }}">Rp {{ number_format($subtotal, 0, ',', '.') }}</strong></p>

                {{-- input AJAX tanpa form --}}
                <input type="number"
                       name="quantity"
                       value="{{ $item['quantity'] }}"
                       min="1"
                       inputmode="numeric"
                       pattern="[0-9]*"
                       class="form-control form-control-sm quantity-input mb-2"
                       data-food-id="{{ $id }}"
                       style="width: 80px;">

                <form method="POST" action="{{ route('member.orders.remove') }}">
                    @csrf
                    <input type="hidden" name="food_id" value="{{ $id }}">
                    <button class="btn btn-sm btn-outline-danger w-100">Hapus</button>
                </form>
            </div>
        </div>
        @endforeach

        <div class="text-end fw-bold fs-5 mb-3 total">Total: Rp {{ number_format($total, 0, ',', '.') }}</div>
    </div>

    <div class="mt-4 text-end">
        <button class="btn btn-success btn-md" data-bs-toggle="modal" data-bs-target="#confirmCheckoutModal">
            <i class="fas fa-check-circle me-1"></i> Checkout Sekarang
        </button>
    </div>

    {{-- Modal Checkout --}}
    <div class="modal fade" id="confirmCheckoutModal" tabindex="-1" aria-labelledby="confirmCheckoutModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmCheckoutModalLabel">Konfirmasi Checkout</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin melanjutkan proses checkout?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <form method="POST" action="{{ route('member.orders.checkout') }}">
                        @csrf
                        <button type="submit" class="btn btn-success">Ya, Checkout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="alert alert-info">Keranjang Anda kosong. Silakan tambahkan makanan dari halaman <a href="{{ route('member.foods.index') }}">Daftar Makanan</a>.
    </div>
    @endif

    <hr class="my-5">

    <h2 class="text-success mb-4">📦 Riwayat Pesanan Anda</h2>

    @if($orders->count() > 0)
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Tanggal</th>
                    <th>Jumlah Item</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>#{{ $order->id }}</td>
                    <td>{{ $order->created_at->format('d M Y') }}</td>
                    <td>{{ $order->items_count }} item</td>
                    <td>Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                    <td>
                        @if($order->status === 'completed')
                        <span class="badge bg-success">Selesai</span>
                        @elseif($order->status === 'processing')
                        <span class="badge bg-warning text-dark">Diproses</span>
                        @else
                        <span class="badge bg-info">Menunggu</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('member.orders.show', $order->id) }}" class="btn btn-sm btn-outline-success">
                            <i class="fas fa-eye"></i> Detail
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <div class="alert alert-warning mt-4">Belum ada pesanan yang dilakukan.</div>
    @endif
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        function updateQty(foodId, quantity) {
            if (quantity < 1 || !foodId) return;

            $.ajax({
                url: "{{ route('member.orders.update') }}",
                type: "POST",
                contentType: "application/json",
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: JSON.stringify({ food_id: foodId, quantity: quantity }),
                success: function (data) {
                    $(`.subtotal[data-id="${foodId}"]`).text(`Rp ${data.subtotal.toLocaleString('id-ID')}`);
                    $('.total').text(`Rp ${data.total.toLocaleString('id-ID')}`);
                    // Sinkronkan quantity di semua input dengan data-food-id yang sama
                    $(`.quantity-input[data-food-id="${foodId}"]`).val(quantity);

                    const toast = $(`
                        <div class="toast align-items-center text-bg-success show position-fixed top-0 end-0 m-3" style="z-index: 1085;">
                            <div class="d-flex">
                                <div class="toast-body">✔ Jumlah diperbarui</div>
                                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                            </div>
                        </div>
                    `);
                    $('body').append(toast);
                    setTimeout(() => toast.remove(), 2500);
                },
                error: function (err) {
                    console.error('Update quantity error:', err);
                }
            });
        }

        // Tangkap input di mobile & desktop
        $(document).on('input change blur', '.quantity-input', function () {
            const foodId = $(this).data('food-id');
            const quantity = $(this).val();
            updateQty(foodId, quantity);
        });

        // Prevent form default submit on Enter
        $('.quantity-input').closest('form').on('submit', function (e) {
            e.preventDefault();
        });
    });
</script>
@endpush