<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTaggingOnPropertiesTable extends Migration
{
    public function up()
    {
        Schema::table('properties', function(Blueprint $table) {
          $table->text('tagging')->after('files_metadata');
        });
    }

    public function down()
    {
        Schema::table('properties', function(Blueprint $table) {
          $table->dropColumn('tagging');
        });
    }
}
