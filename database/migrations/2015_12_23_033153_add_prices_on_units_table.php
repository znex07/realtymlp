<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPricesOnUnitsTable extends Migration
{
    
    public function up()
    {
        Schema::table('units', function(Blueprint $table) {
            $table->float('min_price', 15);
            $table->float('max_price', 15);
        });
    }

    public function down()
    {
        Schema::table('units', function(Blueprint $table) {
            $table->dropColumn('min_price');
            $table->dropColumn('max_price');
        });
    }
}
