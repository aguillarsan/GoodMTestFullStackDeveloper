<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::apiResource('/stores', 'Api\StoreController');
Route::apiResource('/orders', 'Api\OrderController');
Route::apiResource('/products', 'Api\ProductController');
Route::apiResource('/shopping-cart','Api\ShoppingCartController');
Route::get('/shopping/total-products/{store_id}','Api\ShoppingCartController@shoppingCartTotalProducts');
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


