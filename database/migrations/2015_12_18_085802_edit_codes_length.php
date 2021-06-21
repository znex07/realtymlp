<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditCodesLength extends Migration
{
    public function up()
    {
        Schema::table('developers', function(Blueprint $table) {
            $table->string('developer_code', 50)->change();
        });
        Schema::table('projects', function(Blueprint $table) {
            $table->string('developer_code', 50)->change();
            $table->string('project_code', 50)->change();
        });
        Schema::table('units', function(Blueprint $table) {
            $table->string('developer_code', 50)->change();
            $table->string('project_code', 50)->change();
            $table->string('unit_code', 50)->change();
        });
    }

    public function down()
    {
        Schema::table('developers', function(Blueprint $table) {
            $table->string('developer_code', 50)->change();
        });
        Schema::table('projects', function(Blueprint $table) {
            $table->string('developer_code', 50)->change();
            $table->string('project_code', 50)->change();
        });
        Schema::table('units', function(Blueprint $table) {
            $table->string('developer_code', 50)->change();
            $table->string('project_code', 50)->change();
            $table->string('unit_code', 50)->change();
        });
    }
}
