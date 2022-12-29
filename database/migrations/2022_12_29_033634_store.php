<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Store extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_types', function (Blueprint $table) {
            $table->id();
            $table->string('name_delivery_type');
            $table->timestamps();
        });
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('direction');
            $table->integer('stock');
            $table->unsignedInteger('delivery_type_id');
            $table->integer('actual_price');
            $table->integer('old_price');
            $table->string('opening_hours');
            $table->string('closing_time');
            $table->string('distance_kilometers');
            $table->string('foot_distance');
            $table->timestamps();


            $table->foreign('delivery_type_id')
                ->references('id')
                ->on('delivery_types')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
