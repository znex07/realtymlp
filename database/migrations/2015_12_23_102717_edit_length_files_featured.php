<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditLengthFilesFeatured extends Migration
{
    public function up()
    {
        Schema::table('files_featured', function(Blueprint $table) {
            $table->string('project_code')->change();
            $table->string('unit_code')->change();
        });
    }

    public function down()
    {
        Schema::table('files_featured', function(Blueprint $table) {
            $table->string('project_code',10)->change();
            $table->string('unit_code',10)->change();
        });
    }
}
