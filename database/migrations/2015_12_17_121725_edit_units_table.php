<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditUnitsTable extends Migration
{
        public function up()
    {
        Schema::table('units', function(Blueprint $table) {
            $table->dropColumn([
                'project_id',
                'title',
                'floor_area',
                'baths',
                'min_price',
                'max_price',
                'parking',
                'available_at'
            ]);
        });

        Schema::table('units', function(Blueprint $table) {
            $table->string('developer_code',10);
            $table->string('unit_name',60);
            $table->string('unit_codename',30);
            $table->string('property_type',100);
            $table->string('quantity', 100); // 10/50
            $table->string('unit_area', 100);
            $table->integer('rooms');
            $table->integer('bathrooms');
            $table->integer('parkings');
        });
    }

    public function down()
    {
        Schema::table('units', function(Blueprint $table) {
            $table->integer('project_id');
            $table->string('title');
            $table->string('floor_area');
            $table->string('baths');
            $table->string('min_price');
            $table->string('max_price');
            $table->string('parking');
            $table->string('available_at');
        });

        Schema::table('units', function(Blueprint $table) {
            $table->dropColumn([
                'developer_code',
                'unit_name',
                'unit_codename',
                'property_type',
                'quantity',
                'unit_area',
                'rooms',
                'bathrooms',
                'parkings'
            ]);
        });
    }
}
