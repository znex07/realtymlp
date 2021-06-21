<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Building_Tables extends Model
{
    //
    protected $table = 'building_tables';
    protected $fillable = [
        'bldg_name','province_id','province_name','city_id','city_name','brgy','street_address'
    ];
}
