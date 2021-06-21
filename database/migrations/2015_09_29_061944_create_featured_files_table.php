<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeaturedFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('featured_file', function(Blueprint $table) {
            $table->increments('id');
            $table->string('property_code');
            $table->integer('file_category');
            $table->string('file_path');
            $table->string('orig_name');
            $table->string('mime_type');
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
        Schema::drop('featured_file');
    }
}
