<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('direction');
            $table->unsignedBigInteger('delivery_type_id');
            $table->integer('actual_price');
            $table->integer('old_price');
            $table->string('opening_hours');
            $table->string('closing_time');
            $table->string('distance_kilometers')->nullable();
            $table->string('foot_distance')->nullable();
            $table->integer('qualification')->nullable();
            $table->string('image_store')->nullable();;
            $table->string('logo_store')->nullable();;
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('delivery_type_id')
            ->references('id')
            ->on('delivery_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stores');
    }
}
