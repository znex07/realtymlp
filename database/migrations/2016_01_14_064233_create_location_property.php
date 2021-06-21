<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationProperty extends Migration
{
    public function up()
    {
        Schema::create('location_property', function(Blueprint $table) {
          $table->increments('id');
          $table->string('property_code');
          $table->string('address');
          $table->timestamps();

        });
    }

    public function down()
    {
        Schema::drop('location_property');
    }
}
