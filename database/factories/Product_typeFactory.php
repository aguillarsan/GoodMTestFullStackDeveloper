<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class Product_typeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' =>  $this->faker->unique()->randomElement([
                'snaks',
                'Lacteos',
                'Congelados',
                'Packs sorpresa'
            ]),
        ];
    }
}
