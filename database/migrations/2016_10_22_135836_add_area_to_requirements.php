<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAreaToRequirements extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('requirements', function (Blueprint $table) {
            $table->string('lot_area_minimum')->after('budget_max');
            $table->string('lot_area_maximum')->after('lot_area_minimum');
            $table->string('floor_area_minimum')->after('lot_area_maximum');
            $table->string('floor_area_maximum')->after('floor_area_minimum');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('requirements', function (Blueprint $table) {
            //
        });
    }
}
