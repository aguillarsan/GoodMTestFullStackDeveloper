<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product_type;
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement([
                'Coca-cola 3L',
                'Agua 2L',
                'Hamburgesa doble queso, doble carne',
                'Carne',
                'Platanos',
            ]),
            'image' => $this->faker->randomElement([
                '/images/examples/food/botella-de-agua.png',
                '/images/examples/food/coke.png',
                '/images/examples/food/hamburguesa.png',
                '/images/examples/food/meat.png',
                '/images/examples/food/platano.png',
            ]),
            'price' => $this->faker->numberBetween($min = 1500, $max = 4000),
            'discount' => $this->faker->numberBetween($min = 10, $max = 60),
            'stock_product' => $this->faker->numberBetween($min = 0, $max = 20),
            'product_type_id' => Product_type::inRandomOrder()->first()->id,
        ];
    }
}
