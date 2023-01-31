<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DropzoneController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
   return view('admin.home.index');
});

Route::get('/login', function () {
    return view('admin.auth.login');
})->name('admin.login');

Route::name('categories.')->prefix('categories')->group(function () {
    Route::post('change-status', [CategoryController::class, 'changeStatus'])->name('changeStatus');
    Route::get('/', [CategoryController::class, 'index'])->name('index');
    Route::post('/', [CategoryController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('edit');
    Route::put('/{id}', [CategoryController::class, 'update'])->name('update');
    Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('destroy');
});

Route::name('products.')->prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::get('/create', [ProductController::class, 'create'])->name('create');
    Route::post('/', [ProductController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('edit');
    Route::put('/{id}', [ProductController::class, 'update'])->name('update');
    Route::delete('/{id}', [ProductController::class, 'destroy'])->name('destroy');
});

//DropzoneJS
Route::prefix('dropzone')->name('dropzone.')->group(function () {
    Route::post('/upload', [DropzoneController::class, 'upload'])->name('upload');
});
