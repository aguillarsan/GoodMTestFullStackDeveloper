<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product_type;
class ProductTypeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product_type::factory(4)->create();
    }
}
