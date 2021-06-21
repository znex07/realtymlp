<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditGroupUserTable extends Migration
{
    public function up()
    {
        Schema::table('group_user', function(Blueprint $table) {
            $table->dropColumn('property_id');
            $table->dropColumn('sharables');
        });
    }
    
    public function down()
    {
        Schema::table('group_user', function(Blueprint $table) {
            $table->integer('property_id')->unsigned()->after('user_id');
            $table->text('sharables');
        });
    }
}
