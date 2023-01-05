<?php

namespace App\Http\Controllers\Api;

use App\Models\Store;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\product\ProductRequest;

class ProductController extends Controller
{

    /**
     * @OA\Get(
     *   path="/products",
     *   summary="Obtener una lista de productos",
     *   operationId="indexProducts",
     *   tags={"Products"},
     *   @OA\Response(
     *     response="200", description="Una lista de tiendas de los productos",
     *      @OA\JsonContent(
     *              @OA\Property(property="stores",type="object")
     *        )
     * )
     * )
     */
    public function index()
    {
        $products = Product::paginate(10);
        return response()->json(compact('products'));
    }
    /**
     * @OA\Post(
     *     path="/products",
     *     operationId="storeProduct",
     *     tags={"Products"},
     *     summary="Crear un nuevo producto",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *            required={"product_name", "price", "old_price","discount","stock_product","product_type_id"},
     *            @OA\Property(property="product_name", type="string", format="string", example="Bebida más jugo"),
     *            @OA\Property(property="price", type="integer", format="integer", example="2500"),
     *            @OA\Property(property="discount", type="integer", format="integer", example="20"),
     *            @OA\Property(property="stock_product", type="integer", format="integer", example="2"),
     *            @OA\Property(property="product_type_id", type="integer", format="integer", example="2"),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Mensaje de exito al crear el producto",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Producto creado")
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Mesaje de error en caso de que el producto no es creada",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Error crear producto")
     *         )
     *     ),
     * )
     */

    public function store(Request $request)
    {
        $validation = $this->validateForm($request);

        if ($validation->validate()) {
            $product = new Product();
            $product->name = $request->input('name');
            $product->price = $request->input('price');
            $product->discount = $request->input('discount');
            $product->stock_product = $request->input('stock_product');
            $product->product_type_id = $request->input('product_type_id');

            $res = $product->save();
            if ($res) {
                $product->stores()->attach($request->store_id);
                return response()->json(['message' => 'Producto creado'], 201);
            }
            return response()->json(['message' => 'Error crear producto'], 500);
        }
        return response()->json(['errors' => $validation->errors()], 500);
    }

    /**
     * @OA\Post(
     *   path="/validateForm",
     *   summary="Validates a form",
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       type="object",
     *       required={"name", "price", "discount", "stock_product", "product_type_id", "store_id"},
     *       @OA\Property(property="name", type="string", maxLength=150),
     *       @OA\Property(property="price", type="number"),
     *       @OA\Property(property="discount", type="number"),
     *       @OA\Property(property="stock_product", type="number"),
     *       @OA\Property(property="product_type_id", type="number"),
     *       @OA\Property(property="store_id", type="number") 
     *     )
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Validación exitosa"
     *   ),
     *   @OA\Response(
     *     response=400,
     *     description="Validación fallida",
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(property="message", type="string", description="Mesaje de error"),
     *       @OA\Property(
     *         property="errors",
     *         type="array",
     *         description="Lista de erorres de la validacion",
     *         @OA\Items(
     *           type="object",
     *           @OA\Property(property="field", type="string", description="Campo que falló la validación"),
     *           @OA\Property(property="rule", type="string", description="Regla de validación que falló")
     *         )
     *       )
     *     )
     *   )
     * )
     */
    public function validateForm($request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required|max:150',
            'price' => 'required',
            'discount' => 'required',
            'stock_product' => 'required',
            'product_type_id' => 'required',
            'store_id' => 'required',
        ], [
            'name.required' => 'El nombre es obligatorio ',
            'price.required' => 'El precio es obligatorio.',
            'discount.required' => 'El descuento es obligatorio.',
            'stock_product.required' => 'El stock es obligatorio',
            'product_type_id.required' => 'El tipo de producto es obligatorio',
            'store_id.required' => 'El id de la tienda es obligatorio'
        ]);
        return  $validation;
    }
    /**
     * @OA\Get(
     *     path="/products/{id}",
     *     operationId="showProduct",
     *     tags={"Products"},
     *     summary="Recupera un producto",
     *     description="Recupera un producto",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="El ID del producto",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Producto recuperada con éxito",
     *         @OA\JsonContent(
     *              @OA\Property(property="product",type="object")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Producto no encontrada",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Producto no encontrada")
     *         )
     *     ),
     * )
     */
    public function show($id)
    {
        $product = Product::find($id);
        if ($product) {
            return response()->json(compact('product'));
        }
        return response()->json(['message' => 'Producto no encontrado'], 404);
    }

    /**
     * @OA\PUT(
     *     path="/products",
     *     operationId="putProduct",
     *     tags={"Products"},
     *     summary="Actualizar un  producto",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *            required={"product_name", "price", "old_price","discount","stock_product","product_type_id"},
     *            @OA\Property(property="product_name", type="string", format="string", example="Bebida más jugo"),
     *            @OA\Property(property="price", type="integer", format="integer", example="2500"),
     *            @OA\Property(property="discount", type="integer", format="integer", example="20"),
     *            @OA\Property(property="stock_product", type="integer", format="integer", example="2"),
     *            @OA\Property(property="product_type_id", type="integer", format="integer", example="2"),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Mensaje de exito al editar el producto",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Producto editar")
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Mesaje de error en caso de que el producto no es editado",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Error  editar producto")
     *         )
     *     ),
     * )
     */

    public function update(Request $request, $id)
    {
        $validation = $this->validateForm($request);
        if ($validation->validate()) {
            $product =  Product::find($id);
            $product->product_name = $request->input('product_name');
            $product->price = $request->input('price');
            $product->discount = $request->input('discount');
            $product->stock_product = $request->input('stock_product');
            $product->product_type_id = $request->input('product_type_id');
            $res = $product->save();
            if ($res) {
                return response()->json(['message' => 'Producto editado'], 201);
            }
            return response()->json(['message' => 'Error al editar producto'], 500);
        }
        return response()->json(['errors' => $validation->errors()], 500);
    }

    /**
     * @OA\Delete(
     *     path="/products/{id}",
     *     operationId="destroyProduct",
     *     tags={"Products"},
     *     summary="Eliminar un producto",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="El ID del producto",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Mesaje de producto eliminado",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Prducto eliminado")
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Mesanje de error al eliminar el producto",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Error al eliminar producto")
     *         )
     *     ),
     * )
     */
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
