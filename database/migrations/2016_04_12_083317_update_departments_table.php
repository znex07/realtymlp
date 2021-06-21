<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Department;
class UpdateDepartmentsTable extends Migration
{
    public function up()
    {
        DB::statement('TRUNCATE departments');
        $data = [
            'Residential',
            'Commercial',
            'Industrial',
            'Agricultural',
            'Institutional',
        ];
        $subdept = [
            1=>['Vacant Lot / Raw Land','House & Lot','Rowhouse / Townhouse Unit','Apartment / Condo Unit','Dorm / Pension House Unit','Parking Unit','Cabin / Cottage / Villa'],
            2=>['Vacant Lot / Raw Land','Office Unit','Office Building','Retail or Service Unit','Retail Complex / Mall','Leisure & Entertainment Unit','Leisure & Entertainment Building','Hospital or Clinic','Hotel or Resort','Tourist Destination','Parking Unit ','Parking Building','Transport Hub or Unit','Memoral Park Lot','Columbary Niche Unit'],
            3=>['Vacant Lot / Raw Land','Warehouse','Factory','Processing & Recovery Center','Utility Generation / Distribution','R&D Building','Telecom / Data Center'],
            4=>['Vacant Lot / Raw Land','Beach Lot','Island Property','Farm / Cropland / Plantation','Grazing / Cattle Land','Greenhouse / Shed','Poultry / Hog / Fish / others'],
            5=>['Vacant Lot / Raw Land','Religious Structure','Historical / Cultural Building','Educational Buildings','Public Hospital','Public Clinic','Government Building','Fire Station','Police Station'],
        ];
        foreach ($data as $d) {
            App\Department::create([
                'parent_id' => 0,
                'department_name' => $d
            ]);
        }
        foreach ($subdept as $key=>$value){
            foreach($value as $v){
                App\Department::create([
                    'parent_id' => $key,
                    'department_name' => $v
                ]);
            }
        }
    }

    public function down()
    {
      DB::statement('TRUNCATE departments');
      $data = [
         'RESIDENTIAL',
         'COMMERCIAL',
         'INDUSTRIAL',
         'AGRICULTURAL',
         'INSTITUTIONAL',
      ];
      $subdept = [
         1=>['Vacant Lot','House & Lot','Rowhouse / Townhouse','Apartment / Condominium','Dormitory / Boarding House / Pension House Unit',],
         2=>['Vacant Lot / Raw Land','Office Unit','Office Building','Retail or Service Unit / Shop / Station','Retail Complex / Malls','Recreational and Entertainment','Hospitality & Tourism','Parking Unit', 'Parking Building','Transportation','Columbarium & Memorial Park'],
         3=>['Vacant Lot / Raw Land','Warehouse & Storage','Factory & Production','Processing & Recovery','Utility Generation / Distribution (Water, Electricity, Communications)',],
         4=>['Vacant Lot / Raw Land','Beach Lot / Island Property','Farm / Cropland / Plantation','Greenhouse / Hothouse / Shed','Poultry / Hog / Fish / Other Animals',],
         5=>['Vacant Lot / Raw Land','Religious (Churches, Seminaries, Convents, etc.) ','Historical / Cultural (Museum, National Landmark, etc.)','Educational (Universities, Colleges, Schools)','Public Hospitals and Clinics','Government Buildings','Fire Station / Police Station',],
      ];
      foreach ($data as $d) {
         App\Department::create([
            'parent_id' => 0,
            'department_name' => $d
         ]);
      }
      foreach ($subdept as $key=>$value){
         foreach($value as $v){
            App\Department::create([
              'parent_id' => $key,
              'department_name' => $v
            ]);
         }
      }
    }
}
