<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class UpdatePropertyLog extends Migration
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
            $table->string('inquirer_type')->after('ip_address');
            $table->string('inquirer_name')->after('inquirer_type');

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
            $table->dropColumn('inquirer_name');
            $table->dropColumn('inquirer_type');
        });
    }
}
