<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuildingMetadataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('building_tables', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bldg_name');
            $table->string('province_id');
            $table->string('province_name');
            $table->string('city_id');
            $table->string('city_name');
            $table->string('bryg');
            $table->string('street_address');
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
        Schema::drop('building_tables');
    }
}
