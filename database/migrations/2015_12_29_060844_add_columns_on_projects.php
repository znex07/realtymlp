<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsOnProjects extends Migration
{
    public function up()
    {
      Schema::table('projects', function(Blueprint $table) {
        $table->string('building_amenities')->after('whats');
        $table->string('facilities_services')->after('building_amenities');
        $table->string('commercial_area')->after('facilities_services');
      });
    }

    public function down()
    {
      Schema::table('projects', function(Blueprint $table) {
        $table->dropColumn('building_amenities');
        $table->dropColumn('facilities_services');
        $table->dropColumn('commercial_area');
      });
    }
}
