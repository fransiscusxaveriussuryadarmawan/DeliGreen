<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::withCount('orders')->paginate(10);
        return view('admin.customers.index', compact('customers'));
    }

    public function show(Customer $customer)
    {
        $orders = $customer->orders()->latest()->get();

        return view('admin.customers.show', compact('customer', 'orders'));
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('admin.customers.index')->with('success', 'Customer berhasil dihapus!');
    }
}
