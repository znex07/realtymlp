<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameSharablesFieldOnPropertyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('properties', function(Blueprint $table) {
            $table->renameColumn('sharables','viewables');
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
            $table->renameColumn('viewables','sharables');
        });
    }
}
