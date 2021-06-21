<?php

namespace App\Http\Controllers\Resource;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Property;

class FakerController extends Controller
{
    public function getIndex()
    {
        for($i=0;$i<50;$i++) {
            Property::create([
                'property_code' => 'PR-'.date('mdY').time(),
                'listing_type' => 1,
                'condition_type' => 1,
                'ownership_type' => 0,
                'availability_type' => 1,
                'property_title' => 'wow'.$i,
                'property_classifications' => 1,
                'property_types' => 9,
                'province' => 1,
                'province_title' => 'Metro Manila',
                'city' => 18,
                'city_title' => 'Caloocan City',
                'brgy' => '',
                'street_address' => '',
                'village' => '',
                'google_lang' => '',
                'google_lat' => '',
                'map_options' => '{"marker_type":"","lat":14.7565784,"lng":121.04497679999997,"zoom":15,"marker_scale":100}',
                'lot_area' => 100,
                'floor_area' => 100,
                'bedrooms' => 1,
                'bathrooms' => 1,
                'parking' => 1,
                'balcony' => 1,
                'property_price' => 10000+$i,
                'rental_price' => 10000+$i,
                'rental_stat' => 'per_month',
                'selling_price' => 10000+$i,
                'selling_stat' => 'gross',
                'description' => 'wowow'.$i,
                'user_id' => auth()->check() ? auth()->user()->id : 1,
                'property_status' => 1,
                'property_stat' => '',
                'sharables' => '{"attachments":{"documents":[],"images":[{"checked":true,"file_path":"BrioTower-BrandFeature.jpg","id":65},{"checked":true,"file_path":"BrioTower-Perspective.jpg","id":66},{"checked":true,"file_path":"BrioTower-SiteDevPlan.jpg","id":67},{"checked":true,"file_path":"BrioTower-VicinityMap.jpg","id":68}]},"details":{"description":true,"lot_area":true,"floor_area":true,"bathrooms":true,"parking":true,"rooms":true,"balcony":true},"locations":{"brgy":true,"street_address":true,"village":true}}',
                'files_metadata' => '{"remaining_mb":1739851}',
                'tagging' => '',
                'personal_notes' => 'zxcasd'.$i,
            ]);
        }
    }
}
