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
    /**
     * @OA\Get(
     *   path="/orders",
     *   summary="Obtener una lista de ordenes",
     *   operationId="indexOrders",
     *   tags={"Orders"},
     *   @OA\Response(
     *     response="200", description="Una lista de ordenes ordenadas de forma decente por el id",
     *      @OA\JsonContent(
     *              @OA\Property(property="stores",type="object")
     *        )
     * )
     * )
     */
    public function index()
    {
        $orders = Order::with('store')->orderBy('id', 'desc')->paginate(9);
        return response()->json(compact('orders'));
    }
    /**
     * @OA\Get(
     *     path="/orders/{id}",
     *     operationId="showOrders",
     *     tags={"Orders"},
     *     summary="Recupera una orden y sus productos asociados",
     *     description="Recupera una orden y sus productos asociados",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="El ID de la orden",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Orden recuperada con éxito",
     *         @OA\JsonContent(
     *              @OA\Property(property="store",type="object")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Orden no encontrada",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Orden no encontrada")
     *         )
     *     ),
     * )
     */
    public function show($id)
    {
        $order = Order::find($id);
        if ($order) {
            $order->load('store', 'products');
            return response()->json(compact('order'));
        }
        return response()->json(
            [
                'code' => 404,
                'message' => 'Orden no encontrada'
            ]
        );
    }
    /**
     * @OA\Post(
     *     path="/orders",
     *     operationId="storeOrders",
     *     tags={"Orders"},
     *     summary="Crear una nueva orden",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *            required={"store_id", "delivery_type_id", "total_amount"},
     *            @OA\Property(property="store_id", type="integer", format="integer", example="2"),
     *            @OA\Property(property="delivery_type_id", type="integer", format="integer", example="1"),
     *            @OA\Property(property="total_amount", type="integer", format="integer", example="256300"),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Mensaje de exito al crear la orden",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Orden creada"),
     *             @OA\Property(property="orderNumber", type="integer", example="1")
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Mesaje de error en caso de que la tienda no es creada",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Error al crear la orden")
     *         )
     *     ),
     * )
     */
    public function store(OrderRequest $request)
    {

        $order = new Order;
        $order->store_id = $request->store_id;
        $order->delivery_type_id = $request->delivery_type_id;
        $order->total_amount = $request->total_amount;
        $res = $order->save();
        if ($res) {
            return response()->json(
                [
                    'message' => 'Orden creada',
                    'orderNumber' => $order->id
                ],
                201
            );
        }
        return response()->json(['message' => 'Error al crear orden'], 500);
    }

    public function storeOrderProducts(Request $request)
    {
        $order = Order::find($request->order_id);
        $shopping_cart = Shopping_cart::where('store_id', $request->store_id)
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
