<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertyUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_user',function(BluePrint $table){
            $table->increments('id');
            $table->integer('property_id');
            $table->integer('user_id');
            $table->string('user_fullname');
            $table->text('sharables');
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
        Schema::drop('property_user');
    }
}
