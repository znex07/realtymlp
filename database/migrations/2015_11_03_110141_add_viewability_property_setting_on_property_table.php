<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddViewabilityPropertySettingOnPropertyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('properties', function(Blueprint $table) {
            $table->text('sharables')->after('property_stat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('properties', function(Blueprint $table) {
            $table->dropColumn('sharables');
        });
    }
}
