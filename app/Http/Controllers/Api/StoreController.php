<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Store;
use App\Http\Requests\store\StoreRequest;

class StoreController extends Controller
{

    public function index()
    {
        $stores = Store::paginate(20);
        return response()->json(compact('stores'));
    }


    public function store(StoreRequest $request)
    {
        $request->validated();
        $store = new Store();
        $url_image_hero_store = $this->uploadImageHeroStore($request->file('image_hero_store'));
        $store->name = $request->input('name');
        $store->image_store = $url_image_hero_store;
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

    private function uploadImageHeroStore($image)
    {
        $path_info = pathinfo($image->getClientOriginalName());
        $post_path = 'images/store';
        $rename = uniqid() . '.' . $path_info['extension'];
        $image->move(public_path() . "/$post_path", $rename);
        return "$post_path/$rename";
    }

    public function show(Store $store)
    {
        return response()->json(compact('store'));
    }

    public function update(StoreRequest $request, $id)
    {
        $request->validated();
        $store = Store::find($id);
        $store->name = $request->input('name');
        $url_image_hero_store = $this->uploadImageHeroStore($request->file('image_hero_store'));
        $store->image_store = $url_image_hero_store;
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
