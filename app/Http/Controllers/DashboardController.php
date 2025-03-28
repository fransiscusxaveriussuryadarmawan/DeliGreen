<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function indexAdmin()
    {
        $data = [
            'totalOmzet' => 245000000,
            'activeOrders' => 15,
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
