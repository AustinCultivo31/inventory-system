<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
Route::get('/', [DashboardController::class, 'index']);
Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);
