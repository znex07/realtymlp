<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddListingToSubscribeLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subscribe_log', function (Blueprint $table) {
            //
            $table->integer('listings')->after('balance');
            $table->integer('requirements')->after('listings');
            $table->integer('affiliates')->after('requirements');
            $table->integer('group_subs')->after('affiliates');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subscribe_log', function (Blueprint $table) {
            //
            $table->dropColumn('listings');
            $table->dropColumn('requirements');
            $table->dropColumn('affiliates');
            $table->dropColumn('group_subs');
        });
    }
}
