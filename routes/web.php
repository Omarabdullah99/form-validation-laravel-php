<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/phpinfo', function () {
    phpinfo();
});

Route::get('/products', [ProductController::class, 'show']);

Route::get('/product/create', [ProductController::class, 'index']);
Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');

// Route::get('/products/{product}', [ProductController::class, 'single']);

Route::get('/products/{id}', [ProductController::class, 'single']);
