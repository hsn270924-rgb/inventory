<?php

use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [ProductController::class, 'index']);
Route::get('/search-products', [ProductController::class, 'search']);

//cart
Route::post('/cart/add', [CartController::class, 'add']);
Route::get('/cart', [CartController::class, 'view']);
Route::post('/checkout', [OrderController::class, 'store']);
