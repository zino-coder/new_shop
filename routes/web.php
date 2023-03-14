<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('/admin')->group(__DIR__.'/admin.php');

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('add-to-cart.html', [\App\Http\Controllers\CartController::class, 'add'])->name('addToCart');
Route::get('info', [\App\Http\Controllers\CartController::class, 'index']);
Route::get('cart.html', [\App\Http\Controllers\CartController::class, 'index'])->name('cart');
Route::get('checkout.html', [\App\Http\Controllers\CheckoutController::class, 'index'])->name('checkout');
Route::get('/{product_slug}.html', [\App\Http\Controllers\HomeController::class, 'productDetail'])->name('product_detail');
