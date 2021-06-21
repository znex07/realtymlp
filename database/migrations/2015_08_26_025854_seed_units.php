<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Units;
class SeedUnits extends Migration
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
            'unit1' => [
                'project_id' => '1',
                'title' => 'Studio Unit',
                'floor_area' => '22.95 SQM',
                'baths' => '1',
                'min_price' => 'PHP 2,708,000.00',
                'max_price' => 'PHP 2,995,000.00',
                'parking' => '',
                'available_at' => '2020'
            ],
            'unit2' => [
                'project_id' => '1',
                'title' => 'One Bedroom Unit',
                'floor_area' => '26.35 SQM to 31.45 SQM',
                'baths' => '1',
                'min_price' => 'PHP 2,978,000.00',
                'max_price' => 'PHP 3,650,000.00',
                'parking' => '',
                'available_at' => '2020'
            ],
            'unit3' => [
                'project_id' => '1',
                'title' => 'Two Bedroom Unit',
                'floor_area' => '36.55 SQM to 46.38 SQM',
                'baths' => '2',
                'min_price' => 'PHP 4,148,000.00',
                'max_price' => 'PHP 5,733,000.00',
                'parking' => '',
                'available_at' => '2020'
            ],
            //unit asten
            'unit4' => [
                'project_id' => '2',
                'title' => 'Studio Unit',
                'floor_area' => '22.40 SQM to 28.53 SQM',
                'baths' => '1',
                'min_price' => 'PHP 2,254,000.00',
                'max_price' => 'PHP 2,704,000.00',
                'parking' => '',
                'available_at' => '2017'
            ],
            'unit5' => [
                'project_id' => '2',
                'title' => 'One Bedroom',
                'floor_area' => '34.81 SQM to 51.94 SQM',
                'baths' => '1',
                'min_price' => 'PHP 3,659,040.00',
                'max_price' => 'PHP 5,529,440.00',
                'parking' => '',
                'available_at' => '2017'
            ],
            'unit9' => [
                'project_id' => '2',
                'title' => 'Two Bedroom',
                'floor_area' => '61.64 SQM',
                'baths' => '3',
                'min_price' => 'PHP 6,543,040.00',
                'max_price' => 'PHP 6,884,640.00',
                'parking' => '',
                'available_at' => '2017'
            ],

            //units sanlazaro

            'unit6' => [
                'project_id' => '3',
                'title' => 'Studio Unit',
                'floor_area' => '22.08 SQM to 22.18 SQM',
                'baths' => '1',
                'min_price' => 'PHP 1,800,000.00',
                'max_price' => 'PHP 2,000,000.00',
                'parking' => '',
                'available_at' => '2015'
            ],

            'unit7' => [
                'project_id' => '3',
                'title' => 'One Bedroom',
                'floor_area' => '33.81 SQM to 38.31 SQM',
                'baths' => '1',
                'min_price' => 'PHP 3,100,000.00',
                'max_price' => 'PHP 3,800,000.00',
                'parking' => '',
                'available_at' => '2015'
            ],

            'unit8' => [
                'project_id' => '3',
                'title' => 'Two Bedroom',
                'floor_area' => '52.5 SQM',
                'baths' => '2',
                'min_price' => 'PHP 4,800,000.00',
                'max_price' => 'PHP 5,400,000.00',
                'parking' => '',
                'available_at' => '2015'
            ],

        ];

        foreach($data as $u=>$units)
        {
            Units::create([
                'project_id' => $units['project_id'],
                'title' => $units['title'],
                'floor_area' => $units['floor_area'],
                'baths' => $units['baths'],
                'min_price' => $units['min_price'],
                'max_price' => $units['max_price'],
                'parking' => $units['parking'],
                'available_at' => $units['available_at']
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
