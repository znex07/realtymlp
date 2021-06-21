<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Category;
class EditAvailabilityTypeOnCategoriesTable extends Migration
{
    public function up()
    {
      Category::where('code', 5)->delete();
      $data = [
        ['code' => 5,'category_id' => 1,'title' => 'Availability Type','description' => 'Pre-Selling'],
        ['code' => 5,'category_id' => 2,'title' => 'Availability Type','description' => 'Pre-Leasing'],
        ['code' => 5,'category_id' => 3,'title' => 'Availability Type','description' => 'Ready For Occupancy'],
        ['code' => 5,'category_id' => 4,'title' => 'Availability Type','description' => 'Already Leased'],
        ['code' => 5,'category_id' => 5,'title' => 'Availability Type','description' => 'Already Sold'],
      ];
      foreach ($data as $d) {
        Category::create($d);
      }
    }

    public function down()
    {
      Category::where('code', 5)->delete();
      $data = [
        ['code' => 5,'category_id' => 1,'title' => 'Availability Type','description' => 'Pre-Selling'],
        ['code' => 5,'category_id' => 2,'title' => 'Availability Type','description' => 'Pre-Leasing'],
        ['code' => 5,'category_id' => 3,'title' => 'Availability Type','description' => 'Ready For Occupancy'],
        ['code' => 5,'category_id' => 4,'title' => 'Availability Type','description' => 'Already Leased'],
        ['code' => 5,'category_id' => 5,'title' => 'Availability Type','description' => 'Already Sold'],
      ];
      foreach($data as $d) {
        Category::create($d);
      }
    }
}
