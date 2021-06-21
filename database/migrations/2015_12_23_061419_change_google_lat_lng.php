<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeGoogleLatLng extends Migration
{
    public function up()
    {
        Schema::table('projects', function(Blueprint $table) {
            $table->string('google_lat')->change();
            $table->string('google_lng')->change();
        });
    }

    public function down()
    {
        Schema::table('projects', function(Blueprint $table) {
            $table->float('google_lat')->change();
            $table->float('google_lng')->change();
        });   
    }
}
