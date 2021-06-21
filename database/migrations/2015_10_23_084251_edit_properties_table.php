<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditPropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('properties', function($table)
        {
            $table->renameColumn('property_address', 'street_address');
            $table->string('village')->after('property_address');
            $table->string('brgy', 50)->change();
        });

        Schema::table('properties', function(Blueprint $table) {
          $table->string('city_title')->after('city');
          $table->string('province_title')->after('province');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('properties', function($table)
        {
            $table->renameColumn('street_address', 'property_address');
            $table->dropColumn('village');
            $table->int('brgy')->change();
        });   

        Schema::table('properties', function(Blueprint $table) {
        $table->dropColumn('city_title');
        $table->dropColumn('province_title');
      });
    }
}
