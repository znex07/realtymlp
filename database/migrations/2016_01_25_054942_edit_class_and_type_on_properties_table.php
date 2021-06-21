<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditClassAndTypeOnPropertiesTable extends Migration
{
    public function up()
    {
      Schema::table('properties', function(Blueprint $table) {
        $table->text('property_classification')->change();
        $table->text('property_type')->change();
      });
    }

    public function down()
    {
      Schema::table('properties', function(Blueprint $table) {
        $table->text('property_classification')->change();
        $table->text('property_type')->change();
      });
    }
}
