<?php

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