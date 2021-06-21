<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class UpdateTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users', function (Blueprint $table) {
            $table->string('company_name')->after('broker_name');
            $table->string('company_web')->after('company_name');
            $table->string('company_address')->after('company_web');
            $table->string('company_desc')->after('company_address');
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
        Schema::table('users', function (Blueprint $table) {
            $table->string('company_name')->after('broker_name');
            $table->string('company_web')->after('company_name');
            $table->string('company_address')->after('company_web');
            $table->string('company_desc')->after('company_address');
        });
    }
}
