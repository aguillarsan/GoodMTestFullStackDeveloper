<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Shopping_cart;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\shopping_cart\ShoppingCartRequest;

class ShoppingCartController extends Controller
{
    /**
     * @OA\Get(
     *   path="/shopping-cart",
     *   operationId="indexShoppingCart",
     *   tags={"ShoppingCart"},
     *   summary="Obtiene los productos del carrito de compras",
     *   @OA\Parameter(
     *     name="store_id",
     *     in="query",
     *     required=true,
     *     @OA\Schema(type="integer")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Success",
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(
     *         property="product_shopping_cart",
     *         type="array",
     *         @OA\Items(
     *           type="object",
     *           @OA\Property(property="product_id", type="integer"),
     *           @OA\Property(property="total_product", type="integer")
     *         )
     *       )
     *     )
     *   ),
     *   @OA\Response(
     *     response=400,
     *     description="Bad request"
     *   )
     * )
     */

    public function index(Request $request)
    {
        $product_shopping_cart = Shopping_cart::with('product')
            ->where('store_id', $request->store_id)
            ->groupBy('product_id')
            ->select('product_id', DB::raw('count(product_id) as total_product'))
            ->get();
        return response()->json(compact('product_shopping_cart'));
    }


    /**
     * @OA\Post(
     *   path="/shopping-cart",
     *   operationId="storeShoppingCart",
     *   tags={"ShoppingCart"},
     *   summary="Agrega un producto al carrito de compras",
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       type="object",
     *       required={"product_id", "store_id"},
     *       @OA\Property(property="product_id", type="integer"),
     *       @OA\Property(property="store_id", type="integer")
     *     )
     *   ),
     *   @OA\Response(
     *     response=201,
     *     description="Mensaje de exito",
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(property="code", type="integer"),
     *       @OA\Property(property="message", type="string")
     *     )
     *   ),
     *   @OA\Response(
     *     response=500,
     *     description="Mensaje de error",
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(property="message", type="string")
     *     )
     *   )
     * )
     */
    public function store(ShoppingCartRequest $request)
    {

        $shopping_cart =  new Shopping_cart;
        $shopping_cart->product_id = $request->product_id;
        $shopping_cart->store_id = $request->store_id;
        $resp =  $shopping_cart->save();
        if ($resp) {
            return response()->json([
                'code' => 201,
                'message' => 'Producto agregado al carrito de compras'
            ]);
        }

        return response()->json(['message' => 'Error al agregar producto'], 500);
    }



    /**
     * @OA\Get(
     *   path="/shopping/total-products/{store_id}",
     *   summary="Obtiene el número total de productos en el carrito de comprast",
     *   @OA\Parameter(
     *     name="store_id",
     *     in="query",
     *     required=true,
     *     @OA\Schema(type="integer")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Success",
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(property="total_products", type="integer")
     *     )
     *   ),
     *   @OA\Response(
     *     response=400,
     *     description="Bad request"
     *   )
     * )
     */
    public function shoppingCartTotalProducts($store_id)
    {
        $total_products =  Shopping_cart::where('store_id', $store_id)->count();
        return response()->json(compact('total_products'));
    }
}
