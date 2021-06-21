<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Department;
class EditDepartmentClassifications extends Migration
{
    
    public function up()
    {
        for ($i=1;$i<=4;$i++) {
            $dept = Department::findOrFail($i);
            $dept->department_name = ucfirst(strtolower($dept->department_name));
            $dept->save();
        }
        $type = Department::findOrFail(12);
        $type->department_name = 'Industrial Unit';
        $type->save();
    }

    
    public function down()
    {
        for ($i=1;$i<=4;$i++) {
            $dept = Department::findOrFail($i);
            $dept->department_name = ucfirst(strtolower($dept->department_name));
            $dept->save();
        }   
        $type = Department::findOrFail(12);
        $type->department_name = 'Industrial Unit';
        $type->save();
    }
}
