<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\Order;
use App\Models\Store;
use App\Models\Product;
use App\Models\Shopping_cart;
use App\Http\Requests\order\OrderRequest;
use Illuminate\Foundation\Testing\WithFaker;
use App\Http\Controllers\Api\OrderController;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OrderApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_orders()
    {
        // Enviar una solicitud GET al endpoint /oders 
        $response = $this->get('/api/orders');

        // Comprobamos que la respuesta tiene un código de estado 200
        $response->assertStatus(200);

        // Comprobamos que la respuesta contiene la matriz de las ordenes
        $response->assertJsonStructure(['orders']);
    }
    public function test_store_order()
    {
        // Configurar los datos de la solicitud
        $data = [
            'store_id' => 1,
            'delivery_type_id' => 1,
            'total_amount' => 15000,

        ];
        // Enviar una solicitud POST al endpoint /orders  
        $response = $this->post('/api/orders', $data);

        // Comprobamos que el código de estado de respuesta es 201 (Creado)
        $response->assertStatus(201);
        // Comprobamos que la respuesta contiene un mensaje de éxito 
        $response->assertJsonFragment([
            'message' => 'Orden creada',
            'orderNumber' => 1
        ]);
    }
    public function test_show_order()
    {
        //creo una orden una orden en la base de datos
        Order::factory()->create();
        //Obtengo una orden una orden de la base de datos
        $order = Order::with('store', 'products')->first();
        // Load the store and products relationships for the order

        // Enviar una solicitud GET al endpoint /order/{id} 
        $response = $this->get("/api/orders/{$order->id}");

        //Comprobamos que la respuesta tiene un código de estado 200
        $response->assertStatus(200);

        //Comprobamos que la respuesta contiene el objeto de la orden
        $response->assertJsonStructure(['order']);
    }

    public function test_destroy_order()
    {
        // Obtengo una orden de la base de datos
        $order = Order::first();

        // Enviar una solicitud DELETE al endpoint /orders   
        $response = $this->delete('/api/orders/' . $order->id);

        // Comprobamos que el código de estado de respuesta es 201 
        $response->assertStatus(201);

        // Comprobamos que la respuesta contiene un mensaje de éxito 
        $response->assertJsonFragment(['message' => 'Orden eliminada']);

        //Comprueba que la orden se eliminó de la base de datos mediante softDeletes
        $this->assertSoftDeleted('orders', ['id' => $order->id]);
    }

    
}
