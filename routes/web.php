<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\MovementsController;

Route::resource('categories', CategoriesController::class);
Route::resource('products', ProductController::class);
Route::resource('people', PersonController::class);
Route::resource('movements', MovementsController::class);
