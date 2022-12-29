<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class Delivery_TypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name_delivery_type' => $this->faker->unique()->randomElement([
                'Retiro',
                'Delivery',
            ]),

        ];
    }
}
