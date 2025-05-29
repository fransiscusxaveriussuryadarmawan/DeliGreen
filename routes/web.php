<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\FoodController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\AuthController;
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

Route::get('/', [DashboardController::class, 'indexAdmin'])->name('dashboard');

Route::prefix('guest')->group(function () {
    Route::get('/', [DashboardController::class, 'indexGuest'])->name('guest.welcome');
    Route::get('/foods', [FoodController::class, 'index'])->name('guest.menu');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'indexAdmin'])->name('admin.dashboard');
    Route::resource('foods', FoodController::class)->names('admin.foods');
    Route::resource('categories', CategoryController::class)->names('admin.categories');
    Route::resource('customers', CustomerController::class)->names('admin.customers');
    Route::get('customers/{customer}/detail', [CustomerController::class, 'show'])->name('admin.customers.detail');
    Route::resource('orders', OrderController::class)->names('admin.orders');

    Route::get('/reports', [ReportController::class, 'index'])->name('admin.reports.index');
    Route::get('/reports/load/{type}', [ReportController::class, 'load'])->name('admin.reports.load');
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
