<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use App\Models\Order;
use App\Models\Food;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function indexAdmin()
    {
        $totalToday = Order::whereDate('created_at', today())->sum('total_price');
        $totalYesterday = Order::whereDate('created_at', today()->subDay())->sum('total_price');

        $growth = $totalYesterday > 0
            ? (($totalToday - $totalYesterday) / $totalYesterday) * 100
            : 0;

        $monthlyOmzet = Order::selectRaw('MONTH(created_at) as month, SUM(total_price) as total')
            ->whereYear('created_at', now()->year)
            ->groupBy('month')
            ->pluck('total', 'month');

        $labels = [];
        $values = [];

        for ($i = 1; $i <= 12; $i++) {
            $labels[] = Carbon::create()->month($i)->format('M');
            $values[] = $monthlyOmzet[$i] ?? 0;
        }

        return view('admin.dashboard', [
            'chartLabels' => $labels,
            'chartData' => $values,
            'categoryCount' => Category::count(),
            'foodCount' => Food::count(),
            'orderCount' => Order::count(),
            'customerCount' => User::where('role', 'member')->count(),

            'totalOmzet' => Order::sum('total_price'),
            'activeOrders' => Order::where('status', 'pending')->count(),

            'bestSellers' => Food::withCount('order_items')
                ->orderByDesc('order_items_count')
                ->take(3)
                ->get(),

            'latestOrder' => Order::latest()
                ->with('user')
                ->first(),
            'growth' => round($growth, 2),
            'newOrders' => Order::whereDate('created_at', today())->count(),
        ]);
    }

    public function indexCustomer()
    {
        $user = Auth::user();

        $categories = Category::withCount('foods')->paginate(10);
        $recommendedFoods = Food::with('category')
            ->inRandomOrder()
            ->take(8)
            ->get();
        $recentOrders = Order::where('user_id', $user->id)
            ->withCount('items')
            ->latest()
            ->take(5)
            ->get();
        return view('user.dashboard', compact('categories', 'recommendedFoods', 'recentOrders'));
    }

    // public function indexGuest()
    // {
    //     $data = [
    //         'totalOmzet' => 0,
    //         'activeOrders' => 0,
    //         'bestSellers' => [],
    //     ];

    //     return view('guest.welcome', $data);
    // }

    public function indexGuest()
    {
        $categories = Category::withCount('foods')->paginate(10);
        $foods = Food::with('category')->orderBy('name')->paginate(10);
        return view('guest.welcome', compact('categories', 'foods'));
    }
}
