<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeFieldsOnProjectsAndUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function(Blueprint $table){
            $table->string('project_code', 255)->change();
        });
        Schema::table('units', function(Blueprint $table){
            $table->string('project_code', 255)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function(Blueprint $table){
            $table->string('project_code', 10)->change();
        });
        Schema::table('units', function(Blueprint $table){
            $table->string('project_code', 10)->change();
        });
    }
}
