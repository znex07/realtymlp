<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditDevelopersTable extends Migration
{
    public function up()
    {
        Schema::table('developers', function(Blueprint $table) {
            $table->dropColumn(['name','contact_no','office_address','status']);
        });
        Schema::table('developers', function(Blueprint $table) {
            $table->string('developer_code', 10); // D00001
            $table->string('developer_name', 255); // 
        });
    }

    public function down()
    {
        Schema::table('developers', function(Blueprint $table) {
            // $table->dropColumn(['office_address','status']);
            $table->string('name', 255);
            $table->string('contact_no', 255);
            $table->string('office_address', 255);
            $table->integer('status');
        });   
        Schema::table('developers', function(Blueprint $table) {
            // $table->string('developer_code', 10); // D00001
            // $table->string('developer_name', 255); // 
            $table->dropColumn(['developer_code','developer_name']);
        });
    }
}
