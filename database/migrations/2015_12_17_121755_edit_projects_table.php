<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditProjectsTable extends Migration
{
    public function up()
    {
        Schema::table('projects', function(Blueprint $table) {
            $table->dropColumn([
                'developer_id',
                'name',
                'type',
                'municipality',
                'description',
                'sub_description'
            ]);
        });
        Schema::table('projects', function(Blueprint $table) {
            $table->string('developer_code',10);
            $table->text('property_classification');
            $table->string('project_description');
            $table->text('project_availability');
            $table->integer('province');
            $table->integer('city');
            $table->string('street_address');
            $table->string('brgy');
            $table->string('geopolitical_location');
            $table->float('google_lat');
            $table->float('google_lng');
            $table->string('marker_type', 4);
            $table->text('full_location');
        });
    }

    public function down()
    {
        Schema::table('projects', function(Blueprint $table) {
            $table->integer('developer_id');
            $table->string('name');
            $table->string('type');
            $table->string('municipality');
            $table->text('description');
            $table->text('sub_description');
        });

        Schema::table('projects', function(Blueprint $table) {
            $table->dropColumn([
                'developer_code',
                'property_classification',
                'project_description',
                'project_availability',
                'province',
                'city',
                'street_address',
                'brgy',
                'geopolitical_location',
                'google_lat',
                'google_lng',
                'marker_type',
                'full_location'
            ]);
        });
    }
}
