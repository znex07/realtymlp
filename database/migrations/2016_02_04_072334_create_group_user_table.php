<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupUserTable extends Migration
{
    public function up()
    {
      Schema::create('group_user', function(Blueprint $table) {
        $table->increments('id');
        $table->integer('group_id')->unsigned();
        $table->integer('user_id')->unsigned();
        $table->integer('property_id')->unsigned();
        $table->text('sharables');
        $table->timestamps();
      });
    }

    public function down()
    {
      Schema::drop('group_user');
    }
}
