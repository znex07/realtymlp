<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddWhatsInTheUnit extends Migration
{
    public function up()
    {
        Schema::table('projects', function(Blueprint $table) {
          $table->string('whats',255)->after('project_description');
        });
    }

    public function down()
    {
      Schema::table('projects', function(Blueprint $table) {
        $table->dropColumn('whats');
      });
    }
}
