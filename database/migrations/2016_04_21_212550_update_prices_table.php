<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class UpdatePricesTable extends Migration
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
            $table->string('regular_post')->after('lifespan');
            $table->string('quick_post')->after('regular_post');
            $table->string('affiliates')->after('quick_post');
            $table->string('shared_to_me')->after('affiliates');
            $table->string('no_img')->after('shared_to_me');
            $table->string('no_att')->after('no_img');
            $table->string('size_img')->after('no_att');
            $table->string('size_att')->after('size_img');
            $table->string('single_msg')->after('size_att');
            $table->string('group_msg')->after('single_msg');
            $table->string('library')->after('group_msg');
            $table->string('group')->after('library');
            $table->string('auto_matching')->after('group');
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
            $table->dropColumn('regular_post');
            $table->dropColumn('quick_post');
            $table->dropColumn('affiliates');
            $table->dropColumn('shared_to_me');
            $table->dropColumn('no_img');
            $table->dropColumn('no_att');
            $table->dropColumn('size_img');
            $table->dropColumn('size_att');
            $table->dropColumn('single_msg');
            $table->dropColumn('group_msg');
            $table->dropColumn('library');
            $table->dropColumn('group');
            $table->dropColumn('auto_matching');
        });
    }
}
