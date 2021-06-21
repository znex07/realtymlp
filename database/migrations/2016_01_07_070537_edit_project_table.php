<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditProjectTable extends Migration
{
    public function up()
    {
        Schema::table('projects', function(Blueprint $table) {
          $table->text('project_description')->change();
          $table->text('whats')->change();
          $table->text('building_amenities')->change();
          $table->text('facilities_services')->change();
          $table->text('commercial_area')->change();
        });
    }

    public function down()
    {
      Schema::table('projects', function(Blueprint $table) {
        $table->string('project_description')->change();
        $table->string('whats')->change();
        $table->string('building_amenities')->change();
        $table->string('facilities_services')->change();
        $table->string('commercial_area')->change();
      });
    }
}
