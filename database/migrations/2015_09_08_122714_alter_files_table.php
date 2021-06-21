<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('files',function($table){
            
            $table->string('orig_name',255)->after('file_path');
            $table->string('mime_type',100)->after('orig_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('files',function($table){
            $table->dropColumn(['orig_name','mime_type']);
        });
    }
}
