<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Category;
class SeedListingOwnership extends Migration
{
    public function up()
    {
      $data = [
        ['code' => 6,'category_id' => 3,'title' => 'Listing Ownership','description' => 'I am three brokers away'],
        ['code' => 6,'category_id' => 4,'title' => 'Listing Ownership','description' => 'I am four brokers away'],
      ];
      foreach($data as $d) {
        Category::create($d);
      }
    }

    public function down()
    {
      Category::where('code',6)->whereIn('category_id',[3,4])->delete();
    }
}
