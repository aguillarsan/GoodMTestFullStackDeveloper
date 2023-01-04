<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;

use Tests\TestCase;
use App\Models\Store;

class StoreApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_stores()
    {
        // Enviar una solicitud GET al endpoint /stores 
        $response = $this->get('/api/stores');

        // Comprobamos que la respuesta tiene un código de estado 200
        $response->assertStatus(200);

        // Comprobamos que la respuesta contiene la matriz de tiendas
        $response->assertJsonStructure(['stores']);
    }
    public function test_show_store()
    {
        //Obtengo una tienda de la base de datos
        $store = Store::first();

        // Enviar una solicitud GET al endpoint /stores/{id} 
        $response = $this->get("/api/stores/{$store->id}");

        //Comprobamos que la respuesta tiene un código de estado 200
        $response->assertStatus(200);

        //Comprobamos que la respuesta contiene el objeto de la tienda
        $response->assertJsonStructure(['store']);
    }
    public function test_create_store()
    {
        // Configurar los datos de la solicitud
        $data = [
            'name' => 'My Store',
            'direction' => '123 Main St',
            'delivery_type_id' => 1,
            'actual_price' => 5000,
            'old_price' => 19000,
            'opening_hours' => '9:00',
            'closing_time' => '5:00',
        ];
        // Enviar una solicitud POST al endpoint /stores  
        $response = $this->post('/api/stores', $data);

        // Comprobamos que el código de estado de respuesta es 201 (Creado)
        $response->assertStatus(201);
        // Comprobamos que la respuesta contiene un mensaje de éxito 
        $response->assertJsonFragment([
            'message' => 'Tienda creada',
        ]);
    }
    public function test_destroy_store()
    {
        // Obtengo una tienda de la base de datos
        $store = Store::first();

        // Enviar una solicitud DELETE al endpoint /stores   
        $response = $this->delete('/api/stores/' . $store->id);

        // Comprobamos que el código de estado de respuesta es 201 
        $response->assertStatus(201);

        // Comprobamos que la respuesta contiene un mensaje de éxito 
        $response->assertJsonFragment(['message' => 'Tienda eliminada']);

        //Comprueba que la tienda se eliminó de la base de datos mediante softDeletes
        $this->assertSoftDeleted('stores', ['id' => $store->id]);
    }
    public function test_update_store()
    {
        // Obtengo una tienda de la base de datos
        $store = Store::first();
        // Configurar los datos de la solicitud
        $data = [
            'name' => 'Minimarket los santos',
            'direction' => '123 Main St',
            'delivery_type_id' => 1,
            'actual_price' => 5000,
            'old_price' => 19000,
            'opening_hours' => '9:00',
            'closing_time' => '5:00',
        ];

        // Enviar una solicitud PUT al endpoint /stores   
        $response = $this->put('/api/stores/' . $store->id, $data);

        // Comprobamos que el código de estado de respuesta es 201 
        $response->assertStatus(201);

        // Comprobamos que la respuesta contiene un mensaje de éxito 
        $response->assertJsonFragment(['message' => 'Tienda editada']);

        //Comprobamos que la tienda se actualizó en la base de datos
        $this->assertDatabaseHas('stores', [
            'id' => $store->id,
            'name' => 'Minimarket los santos',
            'direction' => '123 Main St',
            'delivery_type_id' => 1,
            'actual_price' => 5000,
            'old_price' => 19000,
            'opening_hours' => '9:00',
            'closing_time' => '5:00',
        ]);
    }
}
