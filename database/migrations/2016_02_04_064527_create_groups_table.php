<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration
{
    public function up()
    {
      Schema::create('groups', function(Blueprint $table) {
        $table->increments('id');
        $table->integer('user_id');
        $table->string('group_title', 100);
        $table->string('group_description', 100);
        $table->string('public',1)->default('0');
        $table->timestamps();
      });
    }

    public function down()
    {
      Schema::dropIfExists('groups');
    }
}
