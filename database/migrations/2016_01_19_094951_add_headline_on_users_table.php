<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHeadlineOnUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->string('headline', 180);
        });
    }

    public function down()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->dropColumn('headline');
        });
    }
}
