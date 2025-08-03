<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/product/create', [ProductController::class , 'index']);
Route::post('/product/store',[ProductController::class, 'store'])->name('product.store');
