<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnSharedByMe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_subscribe', function (Blueprint $table) {
            $table->integer('shared_by_me')->after('shared_to_me')->add();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_subscribe', function (Blueprint $table) {
            $table->dropColumn('shared_by_me');
        });
    }
}
