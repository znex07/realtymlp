<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditMapOptionsOnPropertiesTable extends Migration
{
    public function up()
    {
        Schema::table('properties', function($table)
        {
            $table->dropColumn('marker_type');
            $table->text('map_options')->after('google_lat');
        });
    }
    public function down()
    {        
        Schema::table('properties', function($table)
        {
            $table->dropColumn('map_options');
            $table->string('marker_type')->after('google_lat');
        });
    }
}
