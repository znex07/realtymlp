<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSlugUnitName extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('units', function (Blueprint $table) {
            //
            $table->string('slug_name')->after('unit_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('units', function (Blueprint $table) {
            //
            $table->dropColumn('slug_name');
        });
    }
}
