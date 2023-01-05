<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\Store;
use App\Models\Product;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_products()
    {
        // Enviar una solicitud GET al endpoint /products 
        $response = $this->get('/api/products');

        // Comprobamos que la respuesta tiene un código de estado 200
        $response->assertStatus(200);

        // Comprobamos que la respuesta contiene la matriz de los productos
        $response->assertJsonStructure(['products']);
    }

    public function test_store_product()
    {

        // Configurar los datos de la solicitud
        $productData = [
            'name' => 'Bebida grande',
            'price' => 19000,
            'discount' => 10,
            'stock_product' => 10,
            'product_type_id' => 1,
            'store_id' => 1
        ];
        // Enviar una solicitud POST al endpoint /products  
        $response = $this->post('/api/products', $productData);
        // Comprobamos que el código de estado de respuesta es 201 (Creado)
        $response->assertStatus(201);

        // Comprobamos que la respuesta contiene un mensaje de éxito 
        $response->assertJsonFragment([
            'message' => 'Producto creado',
        ]);

        $this->assertDatabaseHas('store_products', [
            'product_id' => 12,
            'store_id' =>  1,
            'created_at' => null,
            'updated_at' => null
        ]);


        // Comprobamos que los datos del producto registrado coincida con los datos enviados
        $this->assertDatabaseHas('products', [
            'name' => 'Bebida grande',
            'price' => 19000,
            'discount' => 10,
            'stock_product' => 10,
            'product_type_id' => 1,
        ]);
    }

    public function test_show_product()
    {
        //Obtengo un producto de la base de datos
        $product = Product::first();

        // Enviar una solicitud GET al endpoint /products/{id} 
        $response = $this->get("/api/products/{$product->id}");

        //Comprobamos que la respuesta tiene un código de estado 200
        $response->assertStatus(200);

        //Comprobamos que la respuesta contiene el objeto del producto
        $response->assertJsonStructure(['product']);
    }

    // public function test_update_product()
    // {
    //     // Obtengo un producto de la base de datos
    //     $product = Product::first();
    //     // Configurar los datos de la solicitud
    //     $productData = [
    //         'name' => 'Bebida grande',
    //         'price' => 19000,
    //         'discount' => 10,
    //         'stock_product' => 10,
    //         'product_type_id' => 1,
    //         'store_id' => 1
    //     ];

    //     // Enviar una solicitud PUT al endpoint /products   
    //     $response = $this->put('/api/products/' . $product->id, $productData);

    //     // Comprobamos que el código de estado de respuesta es 201 
    //     $response->assertStatus(201);

    //     // Comprobamos que la respuesta contiene un mensaje de éxito 
    //     $response->assertJsonFragment(['message' => 'Producto editado']);

    //     //Comprobamos que la tienda se actualizó en la base de datos
    //     $this->assertDatabaseHas('stores', [
    //         'id' =>  $product->id,
    //         'name' => 'Bebida grande',
    //         'price' => 19000,
    //         'discount' => 10,
    //         'stock_product' => 10,
    //         'product_type_id' => 1,
    //     ]);
    // }

    public function test_destroy_product()
    {
        // Obtengo un producto de la base de datos
        $product = Product::first();

        // Enviar una solicitud DELETE al endpoint /products   
        $response = $this->delete('/api/products/' . $product->id);

        // Comprobamos que el código de estado de respuesta es 201 
        $response->assertStatus(201);

        // Comprobamos que la respuesta contiene un mensaje de éxito 
        $response->assertJsonFragment(['message' => 'Producto eliminado']);

        //Comprueba que el producto se eliminó de la base de datos mediante softDeletes
        $this->assertSoftDeleted('products', ['id' => $product->id]);
    }
}
