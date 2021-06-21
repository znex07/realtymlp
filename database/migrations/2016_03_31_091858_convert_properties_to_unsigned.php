<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConvertPropertiesToUnsigned extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('ALTER TABLE properties MODIFY COLUMN floor_area INTEGER');
        DB::statement('ALTER TABLE properties MODIFY COLUMN lot_area INTEGER');
        DB::statement('ALTER TABLE properties MODIFY COLUMN bedrooms INTEGER');
        DB::statement('ALTER TABLE properties MODIFY COLUMN bathrooms INTEGER');
        DB::statement('ALTER TABLE properties MODIFY COLUMN balcony INTEGER');
        DB::statement('ALTER TABLE properties MODIFY COLUMN parking INTEGER');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('ALTER TABLE properties MODIFY COLUMN floor_area VARCHAR(100)');
        DB::statement('ALTER TABLE properties MODIFY COLUMN lot_area VARCHAR(100)');
        DB::statement('ALTER TABLE properties MODIFY COLUMN bedrooms VARCHAR(100)');
        DB::statement('ALTER TABLE properties MODIFY COLUMN bathrooms VARCHAR(100)');
        DB::statement('ALTER TABLE properties MODIFY COLUMN balcony VARCHAR(100)');
        DB::statement('ALTER TABLE properties MODIFY COLUMN parking VARCHAR(100)');
    }
}
