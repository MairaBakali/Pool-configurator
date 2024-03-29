<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\JsonController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Cron\JobsController;
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

Auth::routes();
Route::get('/admin', [AdminController::class,'index']);
Route::post('/save/configurator', [AdminController::class,'store']);
Route::get('/fetch/Shopware/products',[JobsController::class,'fetchProductFromShopware']);



Route::get('/{any}', function () {
    return view('home');
})->where('any', '.*');

Route::get('/article', [CustomerController::class,'store']);
Route::get('/products', [ProductController::class,'index']);
Route::get('/store', 'App\Http\Controllers\JsonController@store');
// Route::get('/view','App\Http\Controllers\ProductController@index');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
