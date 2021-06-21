<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('property_id');
            $table->string('total_price', 200);
            $table->string('ot_area', 20);
            $table->string('price', 200);
            $table->string('unit_price', 200);
            $table->string('floors');
            $table->string('floor_area');
            $table->string('bedrooms');
            $table->string('bathrooms');
            $table->string('land_size');
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('details');
    }
}
