<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GroupProperty extends Migration
{
    public function up()
    {
        Schema::create('group_property', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('group_id');
            $table->integer('property_id');
            $table->string('group_name');
            $table->text('sharables');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('group_property');
    }
}
