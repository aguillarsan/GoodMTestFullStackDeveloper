<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Shopping_cart;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\shopping_cart\ShoppingCartRequest;

class ShoppingCartController extends Controller
{

    public function index(Request $request)
    {
        $product_shopping_cart = Shopping_cart::with('product')
            ->where('store_id', $request->store_id)
            ->groupBy('product_id')
            ->select('product_id', DB::raw('count(product_id) as total_product'))
            ->get();
        return response()->json(compact('product_shopping_cart'));
    }


    public function create()
    {
        //
    }


    public function store(ShoppingCartRequest $request)
    {

        // $request->validate();
        $shopping_cart =  new Shopping_cart;
        $shopping_cart->product_id = $request->product_id;
        $shopping_cart->store_id = $request->store_id;
        $resp =  $shopping_cart->save();
        if ($resp) {
            return response()->json(['message' => 'Producto agregado al carrito de compras'], 201);
        }

        return response()->json(['message' => 'Error al agregar producto'], 500);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }

    public function shoppingCartTotalProducts($store_id)
    {
        $total_products =  Shopping_cart::where('store_id', $store_id)->count();
        return response()->json(compact('total_products'));
    }
}
