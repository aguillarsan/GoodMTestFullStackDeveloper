<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->randomElement([
                'GooMeal Market',
                'Jumbo', 
                'OXO',
                'Natural King',
                'Unimarc',
                'Lider',
                'Dunkin Donuts',
            ]),
            'direction' => $this->faker->text(15),
            'delivery_type_id' => $this->faker->randomElement([1, 2]),
            'actual_price' => $this->faker->numberBetween($min = 1500, $max = 4000),
            'old_price' => $this->faker->numberBetween($min = 6000, $max = 15000),
            'opening_hours' => $this->faker->randomElement([
                '09:00',
                '10:00',
                '1:00'
            ]),
            'closing_time' => $this->faker->randomElement([
                '21:00',
                '22:00',
                '23:00'
            ]),
            'distance_kilometers' => $this->faker->randomElement([
                '5',
                '10',
                '1'
            ]),
            'foot_distance' => $this->faker->randomElement([
                '5',
                '10',
                '1'
            ]),
            'image_store' => $this->faker->randomElement([
                '/images/examples/stores/store_1.jpg',
                '/images/examples/stores/store_2.jpg',
                '/images/examples/stores/store_3.jpg',
            ]),
            'logo_store' => $this->faker->randomElement([
                '/images/logos/logo.webp'
            ]),
            'qualification' => $this->faker->numberBetween($min = 1, $max = 5),


        ];
    }
}
