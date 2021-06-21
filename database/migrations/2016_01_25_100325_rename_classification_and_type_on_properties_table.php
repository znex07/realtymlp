<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameClassificationAndTypeOnPropertiesTable extends Migration
{
    public function up()
    {
        Schema::table('properties', function(Blueprint $table) {
          $table->renameColumn('property_classification','property_classifications');
          $table->renameColumn('property_type','property_types');
        });
    }

    public function down()
    {
      Schema::table('properties', function(Blueprint $table) {
        $table->renameColumn('property_classifications','property_classification');
        $table->renameColumn('property_types','property_type');
      });
    }
}
