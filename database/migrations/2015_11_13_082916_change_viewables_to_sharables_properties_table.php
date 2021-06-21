<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeViewablesToSharablesPropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('properties', function(Blueprint $table) {
            $table->renameColumn('viewables','sharables');
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
            $table->renameColumn('sharables','viewables');
        });
    }
}
