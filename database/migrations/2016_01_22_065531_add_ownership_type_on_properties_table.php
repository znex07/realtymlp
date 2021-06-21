<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOwnershipTypeOnPropertiesTable extends Migration
{
    public function up()
    {
      Schema::table('properties', function(Blueprint $table) {
        $table->string('ownership_type', 5)->after('condition_type');
        $table->string('availability_type', 2)->after('ownership_type');
      });
    }

    public function down()
    {
      Schema::table('properties', function(Blueprint $table) {
        $table->dropColumn('ownership_type');
        $table->dropColumn('availability_type');
      });
    }
}
