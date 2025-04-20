<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function indexAdmin()
    {
        $oneHourAgo = Carbon::now()->subHour();

        $recentOrders = Order::whereIn('status', ['completed', 'pending', 'canceled'])
                            ->where('updated_at', '>=', $oneHourAgo)
                            ->get();

        $activeOrders = Order::where('status', 'pending')->count();

        $todayPendingOrders = Order::where('status', 'pending')
                                    ->whereDate('order_date', Carbon::today())
                                    ->count();

        $data = [
            'totalOmzet' => 245000000,
            'activeOrders' => $activeOrders,  
            'todayPendingOrders' => $todayPendingOrders,  
            'recentOrders' => $recentOrders,
            'bestSellers' => [
                ['name' => 'Salad Sayur Organik', 'sold' => 45],
                ['name' => 'Smoothie Mangga', 'sold' => 30],
                ['name' => 'Nasi Goreng Quinoa', 'sold' => 25],
            ],
        ];

        return view('admin.dashboard', $data);
    }

    public function indexCustomer()
    {
        $data = [
            'totalOmzet' => 0,
            'activeOrders' => 0,
            'bestSellers' => [],
        ];

        return view('customer.dashboard', $data);
    }
}
