<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user.app');
})->name('welcome');

Route::get('/katalog', [KatalogController::class, 'index'])->name('katalog');

// Grup khusus admin
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('products', ProductController::class);
        Route::resource('users', UserController::class);

        Route::get('/orders', [AdminOrderController::class, 'index'])->name('orders.index');
        Route::get('/orders/{order}', [AdminOrderController::class, 'show'])->name('orders.show');
        Route::post('/orders/{order}/approve', [AdminOrderController::class, 'approve'])->name('orders.approve');
        Route::post('/orders/{order}/reject', [AdminOrderController::class, 'reject'])->name('orders.reject');
    });

// Route profile (bawaan Breeze) + fitur pemesanan (khusus user login)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/pesanan-saya', [OrderController::class, 'index'])->name('pesanan.index');

    Route::get('/pesan/{product}', [OrderController::class, 'create'])->name('pesan');
    Route::post('/pesan/{product}', [OrderController::class, 'store'])->name('pesan.store');

    Route::get('/pesanan/{order}/checkout', [OrderController::class, 'checkout'])->name('pesanan.checkout');
    Route::get('/pesanan/{order}/qris', [OrderController::class, 'qris'])->name('pesanan.qris');
    Route::post('/pesanan/{order}/konfirmasi', [OrderController::class, 'confirm'])->name('pesanan.confirm');
    Route::get('/pesanan/{order}/selesai', [OrderController::class, 'selesai'])->name('pesanan.selesai');
});

require __DIR__ . '/auth.php';
