<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;



class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users', function($table) {
            $table->string('broker_name')->after('remember_token')->add();
            $table->string('broker_web')->after('broker_name')->add();
            $table->string('broker_address')->after('broker_web')->add();
            $table->string('broker_desc')->after('broker_address')->add();

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
    }
}
