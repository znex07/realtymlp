<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOwnershipIdToPropertyUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('property_user', function (Blueprint $table) {
            //
            $table->string('ownership_id')->after('ownership_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('property_user', function (Blueprint $table) {
            //
            Schema::drop('property_user');
        });
    }
}
