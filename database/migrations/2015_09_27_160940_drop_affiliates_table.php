<?php

use Illuminate\Database\Migrations\Migration;

class DropAffiliatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::drop('affiliates');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('affiliates', function ($table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('affiliate_id');
            $table->integer('status');
            $table->timestamps();
        });
    }
}
