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
        // Send a GET request to the /stores endpoint
        $response = $this->get('/api/stores');

        // Assert that the response has a 200 status code
        $response->assertStatus(200);

        // Assert that the response contains the stores array
        $response->assertJsonStructure(['stores']);
    }
    public function test_show_store()
    {
        // get a store from database
        $store = Store::first();

        // Send a GET request to the /stores/{id} endpoint
        $response = $this->get("/api/stores/{$store->id}");

        // Assert that the response has a 200 status code
        $response->assertStatus(200);

        // Assert that the response contains the store object
        $response->assertJsonStructure(['store']);
    }
    public function test_create_store()
    {
        // Set up the request data
        $data = [
            'name' => 'My Store',
            'direction' => '123 Main St',
            'delivery_type_id' => 1,
            'actual_price' => 5000,
            'old_price' => 19000,
            'opening_hours' => '9:00',
            'closing_time' => '5:00',
        ];

        $response = $this->post('/api/stores', $data);

        // Assert that the response status code is 201 (Created)
        $response->assertStatus(201);

        $response->assertJsonFragment([
            'message' => 'Tienda creada',
        ]);
    }
    public function test_destroy_store()
    {
        // get a test store for the database
        $store = Store::first();

        // Send a DELETE request to the API endpoint
        $response = $this->delete('/api/stores/' . $store->id);

        // Assert that the response status code is 201 (Created)
        $response->assertStatus(201);

        // Assert that the response contains a success message
        $response->assertJsonFragment(['message' => 'Tienda eliminada']);

        // Assert that the store was deleted from the database
        $this->assertSoftDeleted('stores', ['id' => $store->id]);
    }
    public function test_update_store()
    {
        $store = Store::first();
        // Set up the request data
        $data = [
            'name' => 'Minimarket los santos',
            'direction' => '123 Main St',
            'delivery_type_id' => 1,
            'actual_price' => 5000,
            'old_price' => 19000,
            'opening_hours' => '9:00',
            'closing_time' => '5:00',
        ];

        // Send a PUT request to the API endpoint
        $response = $this->put('http://your-api-domain.com/api/stores/' . $store->id, $data);

        // Assert that the response status code is 201 (Created)
        $response->assertStatus(201);

        // Assert that the response contains a success message
        $response->assertJsonFragment(['message' => 'Tienda editada']);

        // Assert that the store was updated in the database
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
