<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Order;
use App\Models\OrderItem;

class OrderItemController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);

        $orders = Order::withCount('items')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('user.orders.index', compact('cart', 'orders'));
    }

    public function show($id)
    {
        $order = Order::with('items.food')->findOrFail($id);
        return view('user.orders.show', compact('order'));
    }

    public function addToCart(Request $request)
    {
        $food = Food::findOrFail($request->food_id);

        $cart = session()->get('cart', []);

        if (isset($cart[$food->id])) {
            $cart[$food->id]['quantity'] += 1;
        } else {
            $cart[$food->id] = [
                'name' => $food->name,
                'price' => $food->price,
                'quantity' => 1
            ];
        }

        session()->put('cart', $cart);

        return back()->with('success', 'Makanan ditambahkan ke keranjang.');
    }

    public function removeFromCart(Request $request)
    {
        $cart = session()->get('cart', []);
        unset($cart[$request->food_id]);
        session()->put('cart', $cart);

        return back()->with('success', 'Item dihapus dari keranjang.');
    }

    public function updateCart(Request $request)
    {
        $foodId = $request->input('food_id');
        $quantity = max(1, (int) $request->input('quantity'));

        $cart = session()->get('cart', []);

        if (!isset($cart[$foodId])) {
            if ($request->expectsJson()) {
                return response()->json(['error' => 'Item tidak ditemukan di keranjang.'], 404);
            }
            return back()->with('error', 'Item tidak ditemukan di keranjang.');
        }

        $cart[$foodId]['quantity'] = $quantity;
        session()->put('cart', $cart);

        $subtotal = $cart[$foodId]['price'] * $quantity;
        $total = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'subtotal' => $subtotal,
                'total' => $total,
            ]);
        }

        return back()->with('success', 'Jumlah makanan diperbarui.');
    }

    public function checkout(Request $request)
    {
        $cart = session()->get('cart', []);

        if (count($cart) == 0) {
            return back()->with('error', 'Keranjang Anda kosong.');
        }

        $order = Order::create([
            'user_id' => auth()->id(),
            'status' => 'pending',
            'total_price' => 0,
        ]);

        $total = 0;

        foreach ($cart as $food_id => $item) {
            $itemPrice = floatval(str_replace(',', '', $item['price']));

            OrderItem::create([
                'order_id' => $order->id,
                'food_id' => $food_id,
                'user_id' => auth()->id(),
                'quantity' => $item['quantity'],
                'price' => $itemPrice,
            ]);

            $total += $itemPrice * $item['quantity'];
        }

        $order->update(['total_price' => $total]);

        session()->forget('cart');

        return redirect()->route('member.orders.index')->with('success', 'Checkout berhasil! Pesanan Anda telah dibuat.');
    }

    public function clearCart()
    {
        session()->forget('cart');
        return back()->with('success', 'Keranjang berhasil dikosongkan.');
    }
}
