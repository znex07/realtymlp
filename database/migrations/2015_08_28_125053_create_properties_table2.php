<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('property_code');
            $table->string('listing_type',10);
            $table->string('property_title', 100);
            $table->integer('property_classification');
            $table->integer('property_type');

            $table->integer('province');
            $table->integer('city');
            $table->integer('brgy');
            $table->string('property_address', 200);
            $table->string('google_lang', 50);
            $table->string('google_lat', 50);

            $table->string('lot_area',100);
            $table->string('floor_area',100);
            $table->string('bedrooms',10);
            $table->string('bathrooms',10);
            $table->string('parking',10);
            $table->string('balcony',10);
            $table->string('property_price',200);
            $table->text('description');

            $table->integer('user_id');
            $table->string('property_status');
            $table->string('property_stat');
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
        Schema::drop('properties_tmp');
    }
}
