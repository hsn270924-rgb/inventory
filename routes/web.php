<?php

use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::post('/orders', [OrderController::class, 'store'])->name('storeOrder');
Route::get('/products', [ProductController::class, 'index'])->name('listProducts');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('showProduct');
Route::get('/search-products', [ProductController::class, 'search']);

//cart
Route::post('/cart/add', [CartController::class, 'add']);
Route::get('/cart', [CartController::class, 'view']);
Route::post('/checkout', [OrderController::class, 'checkout']);
