<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Transaction;
class DeleteProjectsDataOnTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $project = Transaction::where('title','=','Projects')->delete();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Transaction::create([
            'title'=>'Projects',
            'description'=>'-'
        ]);
    }
}
