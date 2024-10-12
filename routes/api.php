<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;


Route::get('/products', [ProductController::class, 'index'])->name('api.products.index');
Route::get('/products/search', [ProductController::class, 'search'])->name('api.products.search');
Route::post('/products', [ProductController::class, 'store'])->name('api.products.store');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('api.products.update');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('api.products.destroy');





// API routes for orders
Route::get('/orders', [OrderController::class, 'index']);
Route::post('/orders', [OrderController::class, 'store']);
Route::put('/orders/{id}', [OrderController::class, 'update']);
Route::delete('/orders/{id}', [OrderController::class, 'destroy']);
Route::get('/orders/{order_id}/items', [OrderController::class, 'orderItems'])->name('orders.items');





// API routes for customers
Route::get('/customers', [CustomerController::class, 'index']);
Route::post('/customers', [CustomerController::class, 'store']);
Route::put('/customers/{id}', [CustomerController::class, 'update']);
Route::delete('/customers/{id}', [CustomerController::class, 'destroy']);


// API routes for categories
Route::get('/categories', [CategoryController::class, 'index']);
Route::post('/categories', [CategoryController::class, 'store']);
Route::put('/categories/{id}', [CategoryController::class, 'update']);
Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);

