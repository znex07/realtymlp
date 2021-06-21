<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConditionTypeOnPropertiesTable extends Migration
{
    public function up()
    {
      Schema::table('properties', function(Blueprint $table) {
        $table->string('condition_type', 10)->after('listing_type');
      });
    }

    public function down()
    {
        Schema::table('properties', function(Blueprint $table) {
          $table->dropColumn('condition_type');
        });
    }
}
