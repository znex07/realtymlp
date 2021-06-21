<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedJointVentureOnTransactionsType extends Migration
{

    public function up()
    {
        App\Transaction::create([
          'title' => 'Joint Venture',
          'description' => '-',
        ]);
    }

    public function down()
    {
        App\Transaction::where('title', 'Joint Venture')->delete();
    }
}
