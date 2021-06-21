<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPersonalNoteOnPropertiesTable extends Migration
{
    public function up()
    {
        Schema::table('properties', function(Blueprint $table) {
            $table->text('personal_notes')->after('tagging');
        });
    }

    public function down()
    {
        Schema::table('properties', function(Blueprint $table) {
            $table->dropColumn('personal_notes');
        });
    }
}
