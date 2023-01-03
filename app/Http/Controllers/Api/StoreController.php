<?php

namespace App\Http\Controllers\Api;

use App\Models\Store;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\store\StoreRequest;

/**
 * @OA\Info(title="CRUD stores", version="1.0")
 */
class StoreController extends Controller
{

    /**
     * @OA\Get(
     *   path="/stores",
     *   summary="Obtener una lista de tiendas",
     *   @OA\Response(response="200", description="Una lista de tiendas con la cantidad de productos de cada tienda")
     * )
     */
    public function index()
    {
        $stores = Store::withCount('products')->paginate(9);
        return response()->json(compact('stores'));
    }


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

    public function uploadFile($file)
    {
        if ($file) {
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('uploads', $fileName);
            return Storage::url($path);
        }
        return null;
    }

    public function show(Store $store)
    {
        $store->load('products');
        return response()->json(compact('store'));
    }

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
