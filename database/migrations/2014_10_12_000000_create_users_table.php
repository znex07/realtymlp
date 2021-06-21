<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_code', 250);
            $table->string('status', 11);
            $table->string('user_type', 10);
            $table->string('user_lname', 50);
            $table->string('user_fname', 50);
            $table->string('email', 50)->unique();
            $table->string('password', 100);
            $table->string('user_mobile', 20);
            $table->string('user_phone', 20);
            $table->text('current_address');
            $table->string('lat', 100);
            $table->string('lang', 100);
            $table->integer('referrer_id');
            $table->string('activation_code', 100);
            $table->string('remember_token')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
