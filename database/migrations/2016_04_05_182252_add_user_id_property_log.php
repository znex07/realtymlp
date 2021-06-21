<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AddUserIdPropertyLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::table('property_log', function (Blueprint $table) {
            $table->string('user_code')->after('inquirer_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //

        Schema::table('property_log', function (Blueprint $table) {
            $table->dropColumn('user_code');
        });
    }
}
