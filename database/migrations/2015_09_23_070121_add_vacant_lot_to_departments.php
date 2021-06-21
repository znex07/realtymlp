<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Department;
class AddVacantLotToDepartments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $subdept = [
            3=>'Raw Lot',
            4=>'Vacant Lot'
        ];
        foreach($subdept as $s=>$v){
            Department::create([
                'parent_id' => $s,
                'department_name' => $v
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
        
    }
}
