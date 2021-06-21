<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProjectUpdated extends Migration
{
    
    public function up()
    {
        Schema::table('units', function(Blueprint $table) {
            $table->string('project_updated');
        });
    }

    public function down()
    {
        Schema::table('units', function(Blueprint $table) {
            $table->dropColumn('project_updated');
        });
    }
}
