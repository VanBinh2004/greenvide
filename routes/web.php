<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| GreenTech — Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/san-pham', [HomeController::class, 'products'])->name('products');
Route::get('/san-pham/{slug}', [HomeController::class, 'productDetail'])->name('product.detail');

Route::view('/login', 'auth.login')->name('login');
