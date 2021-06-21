<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Department;
class AddWarehouseOnDepartmentTable extends Migration
{
    
    public function up()
    {
        Department::create([
            'parent_id' => 2,
            'department_name' => 'Warehouse'
        ]);
    }

    public function down()
    {
        Department::where('department_name','Warehouse')
            ->where('parent_id',2)->delete();
    }
}
