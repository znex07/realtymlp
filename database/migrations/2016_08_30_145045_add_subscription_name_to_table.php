<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSubscriptionNameToTable extends Migration
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
            $table->string('subscription_name')->after('subscription_id');
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
            $table->dropColumn('subscription_name');
        });
    }
}
