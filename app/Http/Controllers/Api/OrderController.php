<?php

namespace App\Http\Controllers\Api;

use mt;
use App\Models\Order;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Shopping_cart;
use App\Http\Controllers\Controller;
use App\Http\Requests\order\OrderRequest;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::with('store')->orderBy('id','desc')->paginate(9);
        return response()->json(compact('orders'));
    }
    public function show(Order $order)
    {
        $order->load('store','products');
        return response()->json(compact('order'));
    }
    public function store(OrderRequest $request)
    {

        //Create Order
        $order = new Order;
        $order->store_id = $request->store_id;
        $order->delivery_type_id = $request->delivery_type_id;
        $order->total_amount = $this->calculateTotalPrice($request->store_id);
        $res = $order->save();
        //if Order is created return code 200
        if ($res) {
            $this->storeOrderProducts($order,$request->store_id);
            return response()->json(
                [
                    'message' => 'Orden creada',
                    'orderNumber' => $order->id
                ],
                200
            );
            return response()->json(['message' => 'Orden creada'], 200);
        }
        //else Order is not created return code 500
        return response()->json(['message' => 'Error al crear orden'], 500);
    }

    public function calculateTotalPrice($store_id)
    {
        $shopping_cart = Shopping_cart::where('store_id', $store_id)
            ->with('product')
            ->get();
        $total = 0;
        foreach ($shopping_cart as $product) {
            $price = $product['product']['price'];
            $discount = $product['product']['discount'];
            $priceWithDiscount = $price - round(($price * $discount / 100));
            $total +=   $priceWithDiscount;
        }
        return $total;
    }

    public function storeOrderProducts($order,$store_id)
    {
        $shopping_cart = Shopping_cart::where('store_id', $store_id)
            ->with('product')
            ->get();
        foreach ($shopping_cart as $product) {
            $order->products()->attach($product->product_id);
        }
    }


    public function destroy($id)
    {
        $order = Order::find($id);
        $res = $order->delete();
        if ($res) {
            return response()->json(['message' => 'Orden eliminada'], 201);
        }
        return response()->json(['message' => 'Error al eliminar Orden'], 500);
    }
}
