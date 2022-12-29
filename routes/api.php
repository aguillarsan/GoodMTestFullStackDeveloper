<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::apiResource('/stores', 'Api\StoreController');
Route::apiResource('/orders', 'Api\OderController');
Route::apiResource('/products', 'Api\ProductController');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


