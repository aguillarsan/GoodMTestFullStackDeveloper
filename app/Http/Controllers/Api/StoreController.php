<?php

namespace App\Http\Controllers\Api;

use App\Models\Store;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\store\StoreRequest;

/**
 * @OA\Info(
 *      version="1.1",
 *      title="Api documentation",
 *      description="Api documentation",
 *      @OA\Contact(
 *          email="saguilarsanhuza@gmail.com"
 *      ),
 *      @OA\License(
 *          name="Apache 2.0",
 *          url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *      )
 * )
 *
 * @OA\Server(
 *      url=L5_SWAGGER_CONST_HOST,
 *      description="Demo API Server"
 * )
 *
 * @OA\Tag(
 *     name="GoodMead",
 *     description="API Endpoints"
 * )
 */
class StoreController extends Controller
{

    /**
     * @OA\Get(
     *   path="/stores",
     *   summary="Obtener una lista de tiendas",
     *   operationId="index",
     *   tags={"Stores"},
     *   @OA\Response(
     *     response="200", description="Una lista de tiendas con la cantidad de productos de cada tienda",
     *      @OA\JsonContent(
     *              @OA\Property(property="stores",type="object")
     *        )
     * )
     * )
     */
    public function index()
    {
        $stores = Store::withCount('products')->paginate(9);
        return response()->json(compact('stores'));
    }

    /**
     * @OA\Post(
     *     path="/store",
     *     operationId="store",
     *     tags={"Stores"},
     *     summary="Crear una nueva tienda",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *            required={"name", "image_store", "direction","delivery_type_id","actual_price","old_price","opening_hours","closing_time","logo_store"},
     *            @OA\Property(property="name", type="string", format="string", example="Oxxo"),
     *            @OA\Property(property="image_store", type="string", format="string", example="/storage/images/image.jpg"),
     *            @OA\Property(property="direction", type="string", format="string", example="av los toros"),
     *            @OA\Property(property="delivery_type_id", type="integer", format="integer", example="1"),
     *            @OA\Property(property="actual_price", type="integer", format="integer", example="25000"),
     *            @OA\Property(property="old_price", type="integer", format="integer", example="25000"),
     *            @OA\Property(property="opening_hours", type="string", format="string", example="9:00"),
     *            @OA\Property(property="closing_time", type="string", format="string", example="21:00"),
     *            @OA\Property(property="logo_store", type="string", format="string", example="/storage/images/image.jpg"),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Mensaje de exito al crear la tienda",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Tienda creada")
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Mesaje de error en caso de que la tienda no es creada",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Error al crear tienda")
     *         )
     *     ),
     * )
     */
    public function store(StoreRequest $request)
    {
        $request->validated();
        $store = new Store();
        $url_image_hero_store = $this->uploadFile($request->file('image_hero_store'));
        $url_logo_store = $this->uploadFile($request->file('logo_store'));
        $store->name = $request->input('name');
        $store->image_store = $url_image_hero_store;
        $store->logo_store =  $url_logo_store;
        $store->direction = $request->input('direction');
        $store->delivery_type_id = $request->input('delivery_type_id');
        $store->actual_price = $request->input('actual_price');
        $store->old_price = $request->input('old_price');
        $store->opening_hours = $request->input('opening_hours');
        $store->closing_time = $request->input('closing_time');

        $res = $store->save();
        if ($res) {
            return response()->json(['message' => 'Tienda creada'], 201);
        }
        return response()->json(['message' => 'Error al crear tienda'], 500);
    }


    /**
     * @OA\Post(
     *     path="/upload-file",
     *     operationId="uploadFile",
     *     tags={"Stores"},
     *     summary="Cargar imagenes de la tienda",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="file", type="string", format="binary"),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="retornamos la url del archivo cargado",
     *     ),
     * )
     */
    public function uploadFile($file)
    {
        if ($file) {
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('uploads', $fileName);
            return Storage::url($path);
        }
        return null;
    }

    /**
     * @OA\Get(
     *     path="/store/{store}",
     *     operationId="show",
     *     tags={"Stores"},
     *     summary="Recupera una tienda y sus productos",
     *     description="Recupera una tienda y sus productos",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="El ID de la tienda",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Tienda recuperada con éxito",
     *         @OA\JsonContent(
     *              @OA\Property(property="store",type="object")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Tienda no encontrada",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Tienda no encontrada")
     *         )
     *     ),
     * )
     */
    public function show(Store $store)
    {
        if ($store) {
            $store->load('products');
            return response()->json(compact('store'));
        }
        return response()->json(['message' => 'Tienda no encontrada'], 404);
    }

    /**
     * @OA\Put(
     *     path="/store/{store}",
     *     operationId="update",
     *     tags={"Stores"},
     *     summary="Actualizar tiendas",
     *     @OA\Parameter(
     *         name="store",
     *         in="path",
     *         required=true,
     *         description="El ID de la tienda",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *            required={"name", "image_store", "direction","delivery_type_id","actual_price","old_price","opening_hours","closing_time","logo_store"},
     *            @OA\Property(property="name", type="string", format="string", example="Oxxo"),
     *            @OA\Property(property="image_store", type="string", format="string", example="/storage/images/image.jpg"),
     *            @OA\Property(property="direction", type="string", format="string", example="av los toros"),
     *            @OA\Property(property="delivery_type_id", type="integer", format="integer", example="1"),
     *            @OA\Property(property="actual_price", type="integer", format="integer", example="25000"),
     *            @OA\Property(property="old_price", type="integer", format="integer", example="25000"),
     *            @OA\Property(property="opening_hours", type="string", format="string", example="9:00"),
     *            @OA\Property(property="closing_time", type="string", format="string", example="21:00"),
     *            @OA\Property(property="logo_store", type="string", format="string", example="/storage/images/image.jpg"),
     *           )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Tienda actualizada correctamente",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Tienda editada")
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Error al actualizar tienda",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Error al editar tienda")
     *         )
     *     ),
     * )
     */
    public function update(StoreRequest $request, $id)
    {
        $request->validated();
        $store = Store::find($id);
        $store->name = $request->input('name');

        $store->direction = $request->input('direction');
        $store->delivery_type_id = $request->input('delivery_type_id');
        $store->actual_price = $request->input('actual_price');
        $store->old_price = $request->input('old_price');
        $store->opening_hours = $request->input('opening_hours');
        $store->closing_time = $request->input('closing_time');
        $res = $store->save();

        if ($res) {
            return response()->json(['message' => 'Tienda editada'], 201);
        }
        return response()->json(['message' => 'Error al editar tienda'], 500);
    }
    /**
     * @OA\Delete(
     *     path="/store/{store}",
     *     operationId="destroy",
     *     tags={"Stores"},
     *     summary="Eliminar una tienda",
     *     @OA\Parameter(
     *         name="store",
     *         in="path",
     *         required=true,
     *         description="El ID de la tienda",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Tienda eliminada con éxito",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Tienda eliminada")
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Error al eliminar la tienda",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Error al eliminar tienda")
     *         )
     *     ),
     * )
     */
    public function destroy($id)
    {
        $store = Store::find($id);
        $res = $store->delete();
        if ($res) {
            return response()->json(['message' => 'Tienda eliminada'], 201);
        }
        return response()->json(['message' => 'Error al eliminar tienda'], 500);
    }
}
