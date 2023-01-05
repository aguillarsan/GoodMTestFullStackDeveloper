<?php

namespace Tests\Unit\Api;

use PHPUnit\Framework\TestCase;
use App\Http\Controllers\Api\ProductController;

class ValidationFormProduct extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testValidateFormValid()
    {
       
        $request = $this->createMock(Request::class);
        $request->method('all')->willReturn([
            'name' => 'Product A',
            'price' => 10.50,
            'discount' => 0,
            'stock_product' => 20,
            'product_type_id' => 1,
            'store_id' => 1,
        ]);


        $controller = new ProductController();

  
        $validation = $controller->validateForm($request);
        $this->assertTrue($validation->validate());
        $this->assertEmpty($validation->errors());
    }

    public function testValidateFormInvalid()
    {
      
        $request = $this->createMock(Request::class);
        $request->method('all')->willReturn([
            'name' => '',
            'price' => '',
            'discount' => '',
            'stock_product' => '',
            'product_type_id' => '',
            'store_id' => '',
        ]);

     
        $controller = new ProductController();

      
        $validation = $controller->validateForm($request);
        $this->assertFalse($validation->validate());
        $this->assertEquals([
            'name' => ['El nombre es obligatorio '],
            'price' => ['El precio es obligatorio.'],
            'discount' => ['El descuento es obligatorio.'],
            'stock_product' => ['El stock es obligatorio'],
            'product_type_id' => ['El tipo de producto es obligatorio'],
            'store_id' => ['El id de la tienda es obligatorio'],
        ], $validation->errors()->toArray());
    }
}
