<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAffiliateLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('affiliate_log', function (Blueprint $table) {
           $table->increments('id');
           $table->string('user_id');
           $table->string('code');
           $table->string('affiliate_name', 250);
           $table->string('action')->nullable();
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
        Schema::drop('affiliate_log');
    }
}
