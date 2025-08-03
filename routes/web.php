<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PersonController;

Route::resource('categories', CategoriesController::class);
Route::resource('products', ProductController::class);
Route::resource('people', PersonController::class);
