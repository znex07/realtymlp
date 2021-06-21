<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //file_category: 1=Avatar, 2=Property Pictures, 3= Property Documents
        Schema::create('files',function(Blueprint $table){
            $table->increments('id');
            $table->integer('user_id');
            $table->string('property_code');
            $table->integer('file_category');
            $table->integer('file_type');
            $table->string('file_path',255);
            $table->integer('status');
            $table->integer('public');
            $table->timestamps();
        });
        Schema::create('file_property',function(Blueprint $table){
            $table->increments('id');
            $table->integer('file_id')->unsigned()->index();
            $table->foreign('file_id')->references('id')->on('files')->onDelete('cascade');
            $table->integer('property_id')->unsigned()->index();
            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
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
        Schema::drop('files');
        Schema::drop('file_property');
    }
}
