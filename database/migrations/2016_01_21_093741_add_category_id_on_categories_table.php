<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCategoryIdOnCategoriesTable extends Migration
{
    public function up()
    {
        Schema::table('categories', function(Blueprint $table) {
          $table->string('category_id', 5)->after('code');
        });
    }

    public function down()
    {
      Schema::table('categories', function(Blueprint $table) {
        $table->dropColumn('category_id');
      });
    }
}
