<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Department;
class SeedDepartments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $data = [
            'RESIDENTIAL',
            'COMMERCIAL & INDUSTRIAL',
            'AGRICULTURAL',
            'INSTITUTIONAL'
        ];
        $subdept = [
            1=>['Vacant Lot','House & Lot','Rowhouse / Townhouse','Apartment / Condominium'],
            2=>['Vacant Lot','Office Unit','Office Building',' Industrial Unit','Industrial Building','Retail Unit','Retail Complex & Malls','Healthcare & Wellness','Hospitality & Tourism'],
            3=>['Raw Land','Beach Lot','Crop Land','Grazing Land'],
            4=>['Religious','Historical / Cultural','Educational']
        ];
        foreach ($data as $d) {
            Department::create([
                'parent_id' => 0,
                'department_name' => $d
            ]);
        }
        foreach ($subdept as $key=>$value){
            foreach($value as $v){
                Department::create([
                    'parent_id' => $key,
                    'department_name' => $v
                ]);
            }
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
