<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Developers;

class SeedsDevelopers extends Migration
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
            'developer1' => [
                'name' => 'SMDC',
                'status' => '1'
                ],
            'developer2' => [
                'name' => 'Avida Land',
                'status' => '1'
            ],
            'developer3' => [
                'name' => 'DMCI',
                'status' => '1'
            ],
            'developer4' => [
                'name' => 'Century Properties Group, Inc.',
                'status' => '1'
            ],
            'developer5' => [
                'name' => 'Alveo',
                'status' => '1'
            ],




        ];

        foreach($data as $d=>$dev)
        {
            Developers::create([
                'name' => $dev['name'],
                'status' =>$dev['status']
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
