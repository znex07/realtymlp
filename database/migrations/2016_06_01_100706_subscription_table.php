<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SubscriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscription', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->string('name',250);
            $table->integer('price');
            $table->integer('lifespan');
            $table->string('uom',50);
            $table->integer('listings');
            $table->integer('requirements');
            $table->integer('affiliates');
            $table->integer('shared_to_me');
            $table->integer('no_img');
            $table->integer('no_att');
            $table->integer('size_img_mb');
            $table->integer('size_att_mb');
            $table->string('single_msg');
            $table->string('group_msg');
            $table->string('library');
            $table->integer('group');
            $table->integer('auto_matching');
            $table->integer('status');
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
        Schema::drop('subscription');
    }
}
