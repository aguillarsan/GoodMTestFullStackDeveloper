<?php

namespace App\Http\Controllers\Api;

use App\Models\Store;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\product\ProductRequest;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::paginate(20);
        return response()->json(compact('products'));
    }


    public function store(ProductRequest $request)
    {
        $request->validate();
        $product = new Product();
        $product->product_name = $request->input('product_name');
        $product->price = $request->input('price');
        $product->old_price = $request->input('old_price');
        $product->discount = $request->input('discount');
        $product->stock_product = $request->input('stock_product');
        $product->product_type_id = $request->input('product_type_id');
        $res = $product->save();
        if ($res) {
            $store = Store::find($request->store_id);
            $product->stores()->attach($store->id);
            return response()->json(['message' => 'Producto creado'], 201);
        }
        return response()->json(['message' => 'Error crear producto'], 500);
    }


    public function show(Product $product)
    {
        return response()->json(compact('order'));
    }

    public function update(ProductRequest $request, $id)
    {
        $request->validate();
        $product =  Product::find($id);
        $product->product_name = $request->input('product_name');
        $product->price = $request->input('price');
        $product->old_price = $request->input('old_price');
        $product->discount = $request->input('discount');
        $product->stock_product = $request->input('stock_product');
        $product->product_type_id = $request->input('product_type_id');
        $res = $product->save();
        if ($res) {
            return response()->json(['message' => 'Producto editado'], 201);
        }
        return response()->json(['message' => 'Error crear editado'], 500);
    }


    public function destroy($id)
    {
        $product = Product::find($id);
        $res = $product->delete();
        if ($res) {
            return response()->json(['message' => 'Producto eliminado'], 201);
        }
        return response()->json(['message' => 'Error al eliminar producto'], 500);
    }
}
