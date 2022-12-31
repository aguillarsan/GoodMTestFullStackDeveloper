<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\order\OrderRequest;

class OderController extends Controller
{
  
    public function index()
    {
        $orders = Order::paginate(20);
        return response()->json(compact('orders'));
    }
    public function show(Order $order)
    {
        return response()->json(compact('order'));
    }
    public function store(OrderRequest $request)
    {
        //validate form
        $request->validate();
        //Generate unique orderId
        $orderNumber = Str::uuid();
        //Create Order
        $oder = new Order;
        $oder->user_id = auth()->user()->id;
        $oder->store_id = $request('store_id');
        $oder->delivery_type_id = $request('delivery_type_id');
        $oder->order_number =    $orderNumber;
        $oder->total_amount = $request->input('total_amount');
        $res = $oder->save();
        //if Order is created return code 200
        if ($res) {
            return response()->json(['message' => 'Orden creada'], 200);
        }
        //else Order is not created return code 500
        return response()->json(['message' => 'Error al crear orden'], 500);
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
