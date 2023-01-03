<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shopping_cart;
class ShoppingCartController extends Controller
{
    
    public function index()
    {
        $product_shopping_cart = Shopping_cart::get();
        return response()->json(compact('product_shopping_cart'));
    }

    
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        
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
}
