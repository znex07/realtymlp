<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddThumbnail extends Migration
{

    public function up()
    {
        Schema::table('files_featured', function(Blueprint $table) {
          $table->string('thumbnail',1)->after('mime_type');
        });
    }

    public function down()
    {
      Schema::table('files_featured', function(Blueprint $table) {
        $table->dropColumn('thumbnail');
      });
    }
}
