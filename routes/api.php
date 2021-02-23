<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// http://pool-configurator.test/api/products?limit=5&offset=1
Route::get('/base/products', [APIController::class, 'getBaseProducts']);
Route::post('/compatible/products', [APIController::class, 'getCompatibleProduct']);
Route::get('/product/services', [APIController::class, 'getProductService']);
Route::post('/save/bundle-product',[APIController::class,'storeBundleProduct']);
Route::get('/bundle-product',[APIController::class,'getBundleProducts']);
