<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Delivery_type;
class DeliveryTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Delivery_type::factory(2)->create();
    }
}
