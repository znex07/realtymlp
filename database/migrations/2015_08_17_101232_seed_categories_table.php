<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Category;

class SeedCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
//        $data = [
//          'For Rent',
//          'For Sale',
//          'Projects'
//        ];
//        foreach ($data as $d) {
//            Category::create([
//                'title' => $d,
//                'description' => '-'
//            ]);
//        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
