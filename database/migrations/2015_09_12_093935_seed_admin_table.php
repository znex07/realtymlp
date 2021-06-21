<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Admin;

class SeedAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        $data  = [
            'admin1' => [
                'lastname' => 'Admin',
                'firstname' => 'Admin',
                'username' => 'admin',
                'password' => Hash::make('admin')
            ],

            'admin2' => [
                'lastname' => 'Segovia',
                'firstname' => 'Joseph',
                'username' => 'joseph',
                'password' => Hash::make('segovia')
            ],
        ];

        foreach ($data as $admin => $a) 
        {
            Admin::create([
                'lastname' => $a['lastname'],
                'firstname' => $a['firstname'],
                'username' => $a['username'],
                'password' => $a['password']
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
