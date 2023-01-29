<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

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

Route::group(['prefix' => 'categories', 'name' => 'categories.'], function () {
    Route::post('change-status', [CategoryController::class, 'changeStatus'])->name('categories.changeStatus');
});
Route::resource('categories', CategoryController::class);
