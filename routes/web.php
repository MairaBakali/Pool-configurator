<?php

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
Route::get('/fetch/shopware/products',[JobsController::class,'fetchProductFromShopware']);

Route::get('/{any}', function () {
    return view('home');
})->where('any', '.*');
