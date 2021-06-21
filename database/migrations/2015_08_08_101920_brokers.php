<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Brokers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brokers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('broker_name');
            $table->string('broker_web', 250);
            $table->text('broker_address');
            $table->text('broker_desc');
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
        Schema::drop('brokers');
    }
}
