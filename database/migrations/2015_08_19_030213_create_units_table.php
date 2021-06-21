<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id');
            $table->string('title');
            $table->string('floor_area');
            $table->string('baths');
            $table->string('min_price');
            $table->string('max_price');
            $table->string('parking');
            $table->string('available_at');
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
        Schema::drop('units');
    }
}
