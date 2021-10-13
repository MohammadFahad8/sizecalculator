<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/size-recommend',[App\Http\Controllers\AttributeController::class,'calculateSize']);
Route::post('/add-or-update-product',[App\Http\Controllers\AttributeController::class,'addOrUpdateProduct']);
Route::post('/permission-to-show',[App\Http\Controllers\AttributeController::class,'permissionToShowBodyFit']);
Route::get('/get-attrbutes/{id}',[App\Http\Controllers\AttributeController::class,'attributeTypeFront']);
Route::post('/get-attributes-to-height-weight',[App\Http\Controllers\AttributeController::class,'getAttributesOnHeightWeight']);
Route::get('/post-purchase', [App\Http\Controllers\AttributeController::class, 'postPurchase'])->name('postpurchase');


