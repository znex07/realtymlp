<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddIsConfirmableToAffiliateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_user', function (Blueprint $table) {
            $table->boolean('is_confirmable');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_user', function (Blueprint $table) {
            $table->dropColumn('is_confirmable');
        });
    }
}
