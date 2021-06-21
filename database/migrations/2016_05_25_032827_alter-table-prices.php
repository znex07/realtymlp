<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AlterTablePrices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::table('prices', function (Blueprint $table) {
            $table->dropColumn('regular_post');
            $table->dropColumn('quick_post');
            $table->string('unit')->after('lifespan');
            $table->string('listings')->after('unit');
            $table->string('requirements')->after('listings');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('prices', function (Blueprint $table) {

        $table->string('regular_post')->after('lifespan');
        $table->string('quick_post')->after('regular_post');
        $table->dropColumn('unit');
        $table->dropColumn('listings');
        $table->dropColumn('requirements');

      });

    }
}
