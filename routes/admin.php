<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DropzoneController;
use App\Http\Controllers\Auth\Admin\LoginController;
use App\Http\Controllers\Auth\Admin\LogoutController;
use App\Http\Controllers\AdminController;

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
})->name('admin.home');

Route::get('/login', [LoginController::class, 'getLoginForm'])->name('admin.login');

Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('admin.authenticate');

Route::get('logout', [LogoutController::class, 'logout'])->name('admin.logout');

Route::middleware('auth:admin')->group(function () {
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

    Route::name('accounts.')->prefix('accounts')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');
        Route::get('/create', [AdminController::class, 'create'])->name('create');
        Route::post('/', [AdminController::class, 'store'])->name('store');
        Route::get('/{uuid}', [AdminController::class, 'show'])->name('show');
        Route::get('/{uuid}/edit', [AdminController::class, 'edit'])->name('edit');
        Route::put('/{uuid}', [AdminController::class, 'update'])->name('update');
        Route::delete('/{uuid}', [AdminController::class, 'destroy'])->name('destroy');
    });

//DropzoneJS
    Route::prefix('dropzone')->name('dropzone.')->group(function () {
        Route::post('/upload', [DropzoneController::class, 'upload'])->name('upload');
    });
});
