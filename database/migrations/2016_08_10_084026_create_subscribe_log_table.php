<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscribeLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscribe_log', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('subscription_id');
            $table->integer('remaining_days');
            $table->integer('total_payment');
            $table->integer('balance');
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
        Schema::drop('subscribe_log');
    }
}
