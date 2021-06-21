<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesFeatured extends Migration
{
    public function up()
    {
        Schema::create('files_featured', function(Blueprint $table) {
            $table->increments('id');
            $table->string('project_code',10);
            $table->string('unit_code',10);
            $table->string('file_path');
            $table->string('orig_name');
            $table->string('caption');
            $table->string('image_type',1);
            $table->string('type', 1);
            $table->string('mime_type');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('files_featured');        
    }
}
