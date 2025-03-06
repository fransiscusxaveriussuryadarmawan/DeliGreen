<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
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

        return view('dashboard', $data);
    }
}
