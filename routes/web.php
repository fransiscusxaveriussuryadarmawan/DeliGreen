<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\FoodController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route untuk halaman utama
Route::get('/', [DashboardController::class, 'indexAdmin'])->name('dashboard');

Route::resource('food', FoodController::class);
Route::resource('category', CategoryController::class);

// Make sure you have these routes defined with EXACTLY these names
Route::prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'indexAdmin'])->name('admin.dashboard');
    Route::resource('foods', FoodController::class)->names('admin.foods');
    Route::resource('categories', CategoryController::class)->names('admin.categories');
    Route::get('categories/report', [CategoryController::class, 'report'])->name('admin.categories.report');
    Route::resource('customers', CustomerController::class)->names('admin.customers');
    Route::resource('orders', OrderController::class)->names('admin.orders');
});

Route::prefix('customer')->group(function () {
    Route::get('/', [DashboardController::class, 'indexCustomer'])->name('customer.dashboard');
    Route::resource('orders', OrderController::class)->names('customer.orders');
});

Route::prefix('master')->group(function () {
    Route::get('/foods', function () {
        return view('master.foods');
    })->name('master.foods');

    Route::get('/categories', function () {
        return view('master.categories');
    })->name('master.categories');

    Route::get('/customers', function () {
        return view('master.customers');
    })->name('master.customers');

    Route::get('/orders', function () {
        return view('master.orders');
    })->name('master.orders');
});