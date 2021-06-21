<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConditionsAndAvailabilitiesOnCategoriesTable extends Migration
{
    public function up()
    {
        $data = [
          // Condition Type
          ['code' => 4,'category_id' => 1,'title' => 'Condition Type','description' => 'Brand New'],
          ['code' => 4,'category_id' => 2,'title' => 'Condition Type','description' => 'Pre-Owned'],
          ['code' => 4,'category_id' => 3,'title' => 'Condition Type','description' => 'Foreclosed'],
          // Availability Type
          ['code' => 5,'category_id' => 1,'title' => 'Availability Type','description' => 'Pre-Selling'],
          ['code' => 5,'category_id' => 2,'title' => 'Availability Type','description' => 'Pre-Leasing'],
          ['code' => 5,'category_id' => 3,'title' => 'Availability Type','description' => 'Ready For Occupancy'],
          ['code' => 5,'category_id' => 4,'title' => 'Availability Type','description' => 'Already Leased'],
          ['code' => 5,'category_id' => 5,'title' => 'Availability Type','description' => 'Already Sold'],
          // Listing Ownership
          ['code' => 6,'category_id' => -1,'title' => 'Listing Ownership','description' => 'I am the owner of the property'],
          ['code' => 6,'category_id' => 0,'title' => 'Listing Ownership','description' => 'I am direct to the owner'],
          ['code' => 6,'category_id' => 1,'title' => 'Listing Ownership','description' => 'I am one broker away'],
          ['code' => 6,'category_id' => 2,'title' => 'Listing Ownership','description' => 'I am two broker away'],
        ];
        foreach($data as $d) {
          App\Category::create($d);
        }

    }

    public function down()
    {
      App\Category::where('code','=',4)->delete();
      App\Category::where('code','=',5)->delete();
      App\Category::where('code','=',6)->delete();
    }
}
