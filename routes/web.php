<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductController;

Route::resource('categories', CategoriesController::class);
Route::resource('products', ProductController::class);
