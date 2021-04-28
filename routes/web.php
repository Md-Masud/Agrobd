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

Route::get('/', [App\Http\Controllers\frontend\ProductController::class, 'index'])->name('index');
Route::get('detail/{id}', [App\Http\Controllers\frontend\ProductController::class, 'show'])->name('index.show');
Route::get('allProduct', [App\Http\Controllers\frontend\ProductController::class, 'allProduct'])->name('all.product');


Route::group(['as'=>'admin.','prefix'=>'admin','middleware'=>['auth','admin']],function () {
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('category', App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('product', App\Http\Controllers\Admin\ProductController::class);
    Route::resource('productApprove', App\Http\Controllers\Admin\productApproveController::class);
});
Route::group(['as'=>'user.','prefix'=>'user','middleware'=>['auth','user']],function () {
    Route::get('dashboard', [App\Http\Controllers\User\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('product', App\Http\Controllers\User\productController::class);
});
Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
