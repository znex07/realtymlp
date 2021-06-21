<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Describe extends Migration
{
    public function up()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->text('describe')->after('headline');
        });
    }

    public function down()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->dropColumn('describe');
        });
    }
}
