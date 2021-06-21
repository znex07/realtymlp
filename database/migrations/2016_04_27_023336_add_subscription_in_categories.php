<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Categories;

class AddSubscriptionInCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        $data = [
            'code' => '2',
            'title' => 'Subscription Type',
            'description' => 'Premium +',
        ];
        
        Categories::create($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Categories::where('code','=','28')->delete();
        
    }
}
