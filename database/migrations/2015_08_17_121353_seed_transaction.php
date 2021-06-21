<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Transaction;

class SeedTransaction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $data = [
            'For Rent',
            'For Sale',
            'Projects',
        ];
        foreach ($data as $d) {
            Transaction::create([
                'title' => $d,
                'description' => '-'
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
