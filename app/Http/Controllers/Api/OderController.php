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
        $request->validate();
        $orderNumber = Str::uuid();
        $oder = new Order;
        $oder->user_id = auth()->user()->id;
        $oder->store_id = $request('store_id');
        $oder->delivery_type_id = $request('delivery_type_id');
        $oder->order_number =    $orderNumber;
        $oder->total_amount = $request->input('total_amount');
        $res = $oder->save();
        if ($res) {
            return response()->json(['message' => 'Orden creada'], 201);
        }
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
