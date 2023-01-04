<?php

namespace Database\Factories;

use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'store_id' => Store::inRandomOrder()->first()->id,
            'delivery_type_id' => 1,
            'total_amount' => $this->faker->numberBetween($min = 1500, $max = 10000),
            'amount_delivery' => $this->faker->numberBetween($min = 1500, $max = 3500),
        ];
    }
}
