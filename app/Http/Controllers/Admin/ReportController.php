<?php

namespace App\Http\Controllers\Admin;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Food;
use App\Models\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $topCustomer = Customer::withCount('orders')
            ->orderByDesc('orders_count')
            ->first();

        $topFood = Food::select('foods.id', 'foods.name', 'foods.image')
            ->join('order_items', 'order_items.food_id', '=', 'foods.id')
            ->selectRaw('SUM(order_items.quantity) as total_sold')
            ->groupBy('foods.id', 'foods.name', 'foods.image')
            ->orderByDesc('total_sold')
            ->first();


        $monthlyRevenue = Order::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('total_price');

        $topCategory = Category::select('categories.id', 'categories.name')
            ->join('foods', 'foods.category_id', '=', 'categories.id')
            ->join('order_items', 'order_items.food_id', '=', 'foods.id')
            ->selectRaw('SUM(order_items.quantity) as total_orders')
            ->whereMonth('order_items.created_at', now()->month)
            ->groupBy('categories.id', 'categories.name')
            ->orderByDesc('total_orders')
            ->first();


        return view('admin.reports.index', compact(
            'topCustomer',
            'topFood',
            'monthlyRevenue',
            'topCategory'
        ));
    }


    public function show($id)
    {
        // Logic to fetch and display a specific report
        return view('admin.reports.show', compact('id'));
    }

    public function generate(Request $request)
    {
        // Logic to generate a report based on the request data
        return response()->json(['message' => 'Report generated successfully']);
    }

    public function download($id)
    {
        // Logic to download a specific report
        return response()->download(storage_path("app/reports/{$id}.pdf"));
    }

    public function delete($id)
    {
        // Logic to delete a specific report
        return response()->json(['message' => 'Report deleted successfully']);
    }

    public function filter(Request $request)
    {
        // Logic to filter reports based on request data
        return response()->json(['message' => 'Reports filtered successfully']);
    }
}
