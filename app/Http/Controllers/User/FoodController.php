<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Food;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $foods = Food::with('category')->paginate(9);
        return view('user.foods.index', compact('foods'));
    }

    public function order(Request $request)
    {
        $request->validate([
            'food_id' => 'required|exists:foods,id',
        ]);

        $user = auth()->user();

        $order = Order::firstOrCreate(
            ['user_id' => $user->id, 'status' => 'pending'],
            ['total_price' => 0]
        );

        $item = OrderItem::where('order_id', $order->id)
            ->where('food_id', $request->food_id)
            ->first();

        if ($item) {
            $item->quantity += 1;
            $item->save();
        } else {
            $food = Food::findOrFail($request->food_id);
            OrderItem::create([
                'order_id' => $order->id,
                'food_id' => $food->id,
                'quantity' => 1,
                'price' => $food->price,
            ]);
        }

        return back()->with('success', 'Makanan berhasil ditambahkan ke keranjang!');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
