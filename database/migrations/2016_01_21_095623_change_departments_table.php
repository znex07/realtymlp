<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class ChangeDepartmentsTable extends Migration
{
    public function up()
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

    public function down()
    {
      DB::statement('TRUNCATE departments');
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
