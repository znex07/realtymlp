<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePropertyLogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // DB::statement('ALTER TABLE property_log ADD log_type VARCHAR(2) AFTER id');
        Schema::table('property_log', function(Blueprint $table) {
          $table->string('log_type',2)->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // DB::statement('ALTER TABLE property_log ADD log_type VARCHAR(2) AFTER id');
        Schema::table('property_log', function(Blueprint $table) {
          $table->dropColumn('log_type');
        });
    }
}
