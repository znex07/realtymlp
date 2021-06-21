<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditLocationPropertyTable extends Migration
{
    public function up()
    {
        Schema::table('location_property', function(Blueprint $table) {
          $table->string('street_address')->after('address');
          $table->string('brgy')->after('street_address');
          $table->string('village')->after('brgy');
          $table->string('city')->after('village');
          $table->string('province')->after('city');
        });
    }

    public function down()
    {
      Schema::table('location_property', function(Blueprint $table) {
        $table->dropColumn([
          'street_address',
          'brgy',
          'village',
          'city',
          'province',
        ]);
      });
    }
}
