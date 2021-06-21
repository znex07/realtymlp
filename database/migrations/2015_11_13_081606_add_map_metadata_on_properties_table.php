<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMapMetadataOnPropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('properties', function(Blueprint $table) {
            $table->string('files_metadata')->after('viewables');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('properties', function(Blueprint $table) {
            $table->dropColumn('files_metadata');
        });
    }
}
