<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Requirements extends Model
{
    protected $table = 'requirements';
    protected $fillable = [
        'user_id',
        'property_id',
        'listing_type',
        'condition_type',
        'availability_type',
        'property_classification',
        'property_type',
        'location',
        'brgy',
        'street_address',
        'budget_min',
        'budget_max',
        'lot_area_minimum',
        'lot_area_maximum',
        'floor_area_minimum',
        'floor_area_maximum',
        'rooms',
        'bathrooms',
        'parking',
        'balcony',
        'notes',
        'visibility',
        'updated_at'
    ];
    public function getRequirementLocations($location_id){
        return json_decode(Requirements::where('id', '=', $location_id)->orderBy('created_at','desc')->pluck('location'));
    }
    public function getNumLocation($location_id){
        return count(json_decode(Requirements::where('id', '=', $location_id)->orderBy('created_at','desc')->pluck('location'),true));
    }
    public function getListingType($id){
        return Transaction::where('id',$id)->pluck('title');
    }
    public function matchRequirements(){


    }
}
