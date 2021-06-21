<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocationProperty extends Model
{
    protected $table = 'location_property';

    protected $fillable = [
      'property_code',
      'address',
      'street_address',
      'brgy',
      'village',
      'city_title',
      'province_title',
    ];

    public function property()
    {
      $this->belongsTo('App\Property','property_code','property_code');
    }

}
