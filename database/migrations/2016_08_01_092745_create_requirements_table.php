<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequirementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requirements', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('property_id');
            $table->text('listing_type');
            $table->text('condition_type');
            $table->text('availability_type');
            $table->text('property_classification');
            $table->text('location');
            $table->text('brgy');
            $table->text('street_address');
            $table->text('budget_min');
            $table->text('budget_max');
            $table->integer('rooms');
            $table->integer('bathrooms');
            $table->integer('parking');
            $table->integer('balcony');
            $table->text('notes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('requirements', function (Blueprint $table) {
            //
        });
    }
}
