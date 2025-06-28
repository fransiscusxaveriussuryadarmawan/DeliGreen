<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Events\OrderStatusUpdated;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::query();

        if (request('status')) {
            $orders->where('status', request('status'));
        }

        if (request('date')) {
            $orders->whereDate('created_at', request('date'));
        }

        $orders = $orders->with('user')->latest()->paginate(10);

        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $order->load(['user', 'items.food']);
        return view('admin.orders.show', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status = $request->input('status'); 
        $order->save();

        
        // event(new \App\Events\OrderStatusUpdated($order));

       
        event(new OrderStatusUpdated('Hai, makananmu sedang diproses di restoran kami!', $order->user_id));

        return back()->with('success', 'Status berhasil diperbarui');
    }

//     public function update(Request $request, $id)
// {
//     $order = Order::findOrFail($id);
//     $order->status = $request->status;
//     $order->save();

//     session()->flash('status_updated', "Status pesanan dengan ID #{$order->id} telah diperbarui.");
//     return redirect()->to('/user/orders')->with('status_updated', "Status pesanan dengan ID #{$order->id} telah diperbarui.");
// }

}
