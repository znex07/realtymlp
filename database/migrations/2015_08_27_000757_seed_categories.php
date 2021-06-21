<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Categories;
class SeedCategories extends Migration
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
            //user_type
            'category1' => [
                'code' => '1',
                'title' => 'User Type',
                'description' => 'Owner'
            ],
            'category2' => [
                'code' => '1',
                'title' => 'User Type',
                'description' => 'Broker'
            ],
            'category3' => [
                'code' => '1',
                'title' => 'User Type',
                'description' => 'Company'
            ],

            //subscription
            'category4' => [
                'code' => '2',
                'title' => 'Subscription Type',
                'description' => 'Free'
            ],
            'category5' => [
                'code' => '2',
                'title' => 'Subscription Type',
                'description' => 'Premium'
            ],
        ];

        foreach($data as $category=>$c)
        {
            Categories::create([
                'code' => $c['code'],
                'title' => $c['title'],
                'description' => $c['description']
            ]);
        }

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
