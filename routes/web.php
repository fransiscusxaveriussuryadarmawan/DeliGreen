<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\FoodController as AdminFoodController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\ReportController as AdminReportController;

use App\Http\Controllers\User\CategoryController as UserCategoryController;
use App\Http\Controllers\User\FoodController as UserFoodController;
use App\Http\Controllers\User\OrderController as UserOrderController;
use App\Http\Controllers\User\OrderItemController as UserOrderItemController;
use App\Http\Controllers\User\ReportController as UserReportController;

use App\Http\Controllers\Guest\CategoryController as GuestCategoryController;
use App\Http\Controllers\Guest\FoodController as GuestFoodController;
use App\Http\Controllers\Guest\OrderController as GuestOrderController;
use App\Http\Controllers\Guest\ReportController as GuestReportController;

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

Route::get('/', [DashboardController::class, 'indexGuest'])->name('welcome');

Route::prefix('guest')->name('guest.')->middleware('blockIfLoggedIn')->group(function () {
    Route::get('/foods', [GuestFoodController::class, 'index'])->name('foods.index');
    Route::get('/categories', [GuestCategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/{id}', [GuestCategoryController::class, 'show'])->name('categories.show');
    Route::get('/orders', fn() => redirect('/register'))->name('orders.index');
    Route::get('/reports', fn() => redirect('/register'))->name('reports.index');
});

Route::get('/register', [AuthController::class, 'showRegistrationPage'])->name('register.page');
Route::post('/register/verify', [AuthController::class, 'registerProcess'])->name('register.verify');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin.only'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'indexAdmin'])->name('dashboard');
    Route::resource('foods', AdminFoodController::class);
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('orders', AdminOrderController::class);
    Route::resource('users', AdminUserController::class);
    Route::resource('reports', AdminReportController::class);
    Route::get('/reports/load/{type}', [AdminReportController::class, 'load'])->name('reports.load');
});

Route::prefix('user')->name('user.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'indexCustomer'])->name('dashboard');
    Route::get('/foods', [UserFoodController::class, 'memberIndex'])->name('foods.index');
    Route::resource('categories', UserCategoryController::class);
    Route::resource('orders', UserOrderController::class);
    Route::resource('order_items', UserOrderItemController::class);
    Route::resource('reports', UserReportController::class);
    Route::post('/foods/order', [UserFoodController::class, 'order'])->name('foods.order');
});
