<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUserSubscribe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_subscribe',function (Blueprint $table){
            $table->increments('id');
            $table->string('name',250);
            $table->integer('price');
            $table->string('user_code', 250);
            $table->integer('lifespan');
            $table->integer('listings');
            $table->integer('requirements');
            $table->integer('affiliates');
            $table->integer('shared_to_me');
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
        Schema::drop('user_subscribe');
    }
}
