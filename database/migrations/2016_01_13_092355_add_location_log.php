<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLocationLog extends Migration
{
    public function up()
    {
        Schema::create('location_log', function(Blueprint $table) {
          $table->increments('id');
          $table->string('address');
          $table->timestamps();
        });
    }

    public function down()
    {
      Schema::drop('location_log');
    }
}
