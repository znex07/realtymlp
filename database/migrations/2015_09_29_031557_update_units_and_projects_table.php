<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUnitsAndProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('units', function (Blueprint $table) {
            $table->string('project_code',10)->after('project_id');
        });
        Schema::table('projects', function (Blueprint $table) {
            $table->string('project_code',10)->after('developer_id');
        });
        Schema::table('projects_picture', function (Blueprint $table) {
            $table->string('code',10)->after('units_code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('units', function($table)
        {
            $table->dropColumn('project_code');
        });
        Schema::table('projects', function($table)
        {
            $table->dropColumn('project_code');
        });
        Schema::table('projects_picture', function($table)
        {
            $table->dropColumn('code');
        });
    }
}
