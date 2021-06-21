<?php

namespace App\Http\Controllers\Dashboard\Requirement;

use App\Property;
use App\Requirements;
use App\Transaction;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Searchy;

class MatchController extends Controller
{
    public function getIndex($req_id, $listing_type)
    {
        $user = auth()->user();
        $requirements = Requirements::where('id', '=', $req_id)->orderBy('created_at', 'desc')->first();
        $location = new Requirements();
        $requirements_location = $location->getRequirementLocations($req_id);
        $property = Property::orderBy('created_at', 'desc')->first();
        $property_matched = Searchy::driver('fuzzy')->properties('property_title','property_classifications')->query('Ar')->    get();
        // dd($property_matched);  
        if ($location->getNumLocation($req_id) == 1) {
            $property_result = Property::where('listing_type', $listing_type)
                ->orWhere('city_title', rtrim($this->getCityTitle(1, $requirements_location)[0]))
                ->orderBy('created_at', 'desc')->paginate(12);
            $property_accurate_result = Property::where('listing_type', $listing_type)
                ->where('city_title','LIKE', '%' . rtrim($this->getCityTitle(1, $requirements_location)[0]))
                ->where('bedrooms', $requirements->rooms)
                ->where('parking', $requirements->parking)
                ->where('bathrooms', $requirements->rooms)
                ->where('balcony', $requirements->balcony)
                ->get();
        } else if ($location->getNumLocation($req_id) == 2) {
            $property_result = Property::where('listing_type', $listing_type)->orWhere('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(1, $requirements_location)[0]) . '%')
                ->orWhere('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(2, $requirements_location)[0]) . '%')
                ->orderBy('created_at', 'desc')->paginate(12);
            $property_accurate_result1 = Property::where('listing_type', $listing_type)
                ->where('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(1, $requirements_location)[0]) . '%')
                ->where('bedrooms', $requirements->rooms)
                ->where('bathrooms', $requirements->rooms)
                ->where('parking', $requirements->parking)
                ->where('balcony', $requirements->balcony)
                ->orderBy('created_at', 'desc')->paginate(12);
            $property_accurate_result2 = Property::where('listing_type', $listing_type)
                ->where('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(2, $requirements_location)[0]) . '%')
                ->where('bedrooms', $requirements->rooms)
                ->where('bathrooms', $requirements->rooms)
                ->where('parking', $requirements->parking)
                ->where('balcony', $requirements->balcony)
                ->orderBy('created_at', 'desc')->paginate(12);
            $property_accurate_result = $property_accurate_result1->merge($property_accurate_result2);
        } else if ($location->getNumLocation($req_id) == 3) {
            $property_result = Property::where('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(1, $requirements_location)[0]) . '%')
                ->orWhere('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(2, $requirements_location)[0]) . '%')
                ->orWhere('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(3, $requirements_location)[0]) . '%')
                ->orderBy('created_at', 'desc')->paginate(12);
            $property_accurate_result1 = Property::where('listing_type', $listing_type)
                ->where('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(1, $requirements_location)[0]) . '%')
                ->where('bedrooms', $requirements->rooms)
                ->where('bathrooms', $requirements->rooms)
                ->where('parking', $requirements->parking)
                ->where('balcony', $requirements->balcony)
                ->orderBy('created_at', '=', 'desc')->paginate(12);
            $property_accurate_result2 = Property::where('listing_type', $listing_type)
                ->where('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(2, $requirements_location)[0]) . '%')
                ->where('bedrooms', $requirements->rooms)
                ->where('bathrooms', $requirements->rooms)
                ->where('parking', $requirements->parking)
                ->where('balcony', $requirements->balcony)
                ->orderBy('created_at', '=', 'desc')->paginate(12);
            $property_accurate_result3 = Property::where('listing_type', $listing_type)
                ->where('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(3, $requirements_location)[0]) . '%')
                ->where('bedrooms', $requirements->rooms)
                ->where('bathrooms', $requirements->rooms)
                ->where('parking', $requirements->parking)
                ->where('balcony', $requirements->balcony)
                ->orderBy('created_at', '=', 'desc')->paginate(12);
            $property_accurate_result = $property_accurate_result1->merge($property_accurate_result2)->merge($property_accurate_result3);
        } else if ($location->getNumLocation($req_id) == 4) {
            $property_result = Property::where('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(1, $requirements_location)[0]) . '%')
                ->orWhere('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(2, $requirements_location)[0]) . '%')
                ->orWhere('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(3, $requirements_location)[0]) . '%')
                ->orWhere('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(4, $requirements_location)[0]) . '%')
                ->orderBy('created_at', 'desc')->paginate(12);
            $property_accurate_result1 = Property::where('listing_type', $listing_type)
                ->where('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(1, $requirements_location)[0]) . '%')
                ->where('bedrooms', $requirements->rooms)
                ->where('bathrooms', $requirements->rooms)
                ->where('parking', $requirements->parking)
                ->where('balcony', $requirements->balcony)
                ->orderBy('created_at', '=', 'desc')->paginate(12);
            $property_accurate_result2 = Property::where('listing_type', $listing_type)
                ->where('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(2, $requirements_location)[0]) . '%')
                ->where('bedrooms', $requirements->rooms)
                ->where('bathrooms', $requirements->rooms)
                ->where('parking', $requirements->parking)
                ->where('balcony', $requirements->balcony)
                ->orderBy('created_at', '=', 'desc')->paginate(12);
            $property_accurate_result3 = Property::where('listing_type', $listing_type)
                ->where('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(3, $requirements_location)[0]) . '%')
                ->where('bedrooms', $requirements->rooms)
                ->where('bathrooms', $requirements->rooms)
                ->where('parking', $requirements->parking)
                ->where('balcony', $requirements->balcony)
                ->orderBy('created_at', '=', 'desc')->paginate(12);
            $property_accurate_result4 = Property::where('listing_type', $listing_type)
                ->where('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(4, $requirements_location)[0]) . '%')
                ->where('bedrooms', $requirements->rooms)
                ->where('bathrooms', $requirements->rooms)
                ->where('parking', $requirements->parking)
                ->where('balcony', $requirements->balcony)
                ->orderBy('created_at', '=', 'desc')->paginate(12);
            $property_accurate_result = $property_accurate_result1->merge($property_accurate_result2)->merge($property_accurate_result3)->merge($property_accurate_result4);
        } else if ($location->getNumLocation($req_id) == 5) {
            $property_result = Property::where('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(1, $requirements_location)[0]) . '%')
                ->orWhere('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(2, $requirements_location)[0]) . '%')
                ->orWhere('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(3, $requirements_location)[0]) . '%')
                ->orWhere('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(4, $requirements_location)[0]) . '%')
                ->orWhere('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(5, $requirements_location)[0]) . '%')
                ->orderBy('created_at', 'desc')->paginate(12);
            $property_accurate_result1 = Property::where('listing_type', $listing_type)
                ->where('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(1, $requirements_location)[0]) . '%')
                ->where('bedrooms', $requirements->rooms)
                ->where('bathrooms', $requirements->rooms)
                ->where('parking', $requirements->parking)
                ->where('balcony', $requirements->balcony)
                ->orderBy('created_at', '=', 'desc')->paginate(12);
            $property_accurate_result2 = Property::where('listing_type', $listing_type)
                ->where('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(2, $requirements_location)[0]) . '%')
                ->where('bedrooms', $requirements->rooms)
                ->where('bathrooms', $requirements->rooms)
                ->where('parking', $requirements->parking)
                ->where('balcony', $requirements->balcony)
                ->orderBy('created_at', '=', 'desc')->paginate(12);
            $property_accurate_result3 = Property::where('listing_type', $listing_type)
                ->where('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(3, $requirements_location)[0]) . '%')
                ->where('bedrooms', $requirements->rooms)
                ->where('bathrooms', $requirements->rooms)
                ->where('parking', $requirements->parking)
                ->where('balcony', $requirements->balcony)
                ->orderBy('created_at', '=', 'desc')->paginate(12);
            $property_accurate_result4 = Property::where('listing_type', $listing_type)
                ->where('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(4, $requirements_location)[0]) . '%')
                ->where('bedrooms', $requirements->rooms)
                ->where('bathrooms', $requirements->rooms)
                ->where('parking', $requirements->parking)
                ->where('balcony', $requirements->balcony)
                ->orderBy('created_at', '=', 'desc')->paginate(12);
            $property_accurate_result5 = Property::where('listing_type', $listing_type)
                ->where('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(5, $requirements_location)[0]) . '%')
                ->where('bedrooms', $requirements->rooms)
                ->where('bathrooms', $requirements->rooms)
                ->where('parking', $requirements->parking)
                ->where('balcony', $requirements->balcony)
                ->orderBy('created_at', '=', 'desc')->paginate(12);
            $property_accurate_result = $property_accurate_result1->merge($property_accurate_result2)->merge($property_accurate_result3)->merge($property_accurate_result4)->merge($property_accurate_result5);
        } else if ($location->getNumLocation($req_id) == 6) {
            $property_result = Property::where('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(1, $requirements_location)[0]) . '%')
                ->orWhere('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(2, $requirements_location)[0]) . '%')
                ->orWhere('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(3, $requirements_location)[0]) . '%')
                ->orWhere('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(4, $requirements_location)[0]) . '%')
                ->orWhere('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(5, $requirements_location)[0]) . '%')
                ->orWhere('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(6, $requirements_location)[0]) . '%')
                ->orderBy('created_at', 'desc')->paginate(12);
            $property_accurate_result1 = Property::where('listing_type', $listing_type)
                ->where('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(1, $requirements_location)[0]) . '%')
                ->where('bedrooms', $requirements->rooms)
                ->where('bathrooms', $requirements->rooms)
                ->where('parking', $requirements->parking)
                ->where('balcony', $requirements->balcony)
                ->orderBy('created_at', '=', 'desc')->paginate(12);
            $property_accurate_result2 = Property::where('listing_type', $listing_type)
                ->where('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(2, $requirements_location)[0]) . '%')
                ->where('bedrooms', $requirements->rooms)
                ->where('bathrooms', $requirements->rooms)
                ->where('parking', $requirements->parking)
                ->where('balcony', $requirements->balcony)
                ->orderBy('created_at', '=', 'desc')->paginate(12);
            $property_accurate_result3 = Property::where('listing_type', $listing_type)
                ->where('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(3, $requirements_location)[0]) . '%')
                ->where('bedrooms', $requirements->rooms)
                ->where('bathrooms', $requirements->rooms)
                ->where('parking', $requirements->parking)
                ->where('balcony', $requirements->balcony)
                ->orderBy('created_at', '=', 'desc')->paginate(12);
            $property_accurate_result4 = Property::where('listing_type', $listing_type)
                ->where('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(4, $requirements_location)[0]) . '%')
                ->where('bedrooms', $requirements->rooms)
                ->where('bathrooms', $requirements->rooms)
                ->where('parking', $requirements->parking)
                ->where('balcony', $requirements->balcony)
                ->orderBy('created_at', '=', 'desc')->paginate(12);
            $property_accurate_result5 = Property::where('listing_type', $listing_type)
                ->where('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(5, $requirements_location)[0]) . '%')
                ->where('bedrooms', $requirements->rooms)
                ->where('bathrooms', $requirements->rooms)
                ->where('parking', $requirements->parking)
                ->where('balcony', $requirements->balcony)
                ->orderBy('created_at', '=', 'desc')->paginate(12);
            $property_accurate_result6 = Property::where('listing_type', $listing_type)
                ->where('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(6, $requirements_location)[0]) . '%')
                ->where('bedrooms', $requirements->rooms)
                ->where('bathrooms', $requirements->rooms)
                ->where('parking', $requirements->parking)
                ->where('balcony', $requirements->balcony)
                ->orderBy('created_at', '=', 'desc')->paginate(12);
            $property_accurate_result = $property_accurate_result1->merge($property_accurate_result2)->merge($property_accurate_result3)->merge($property_accurate_result4)->merge($property_accurate_result5)->merge($property_accurate_result6);
        } else if ($location->getNumLocation($req_id) == 7) {
            $property_result = Property::where('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(1, $requirements_location)[0]) . '%')
                ->orWhere('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(2, $requirements_location)[0]) . '%')
                ->orWhere('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(3, $requirements_location)[0]) . '%')
                ->orWhere('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(4, $requirements_location)[0]) . '%')
                ->orWhere('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(5, $requirements_location)[0]) . '%')
                ->orWhere('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(6, $requirements_location)[0]) . '%')
                ->orWhere('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(7, $requirements_location)[0]) . '%')
                ->orderBy('created_at', 'desc')->paginate(12);
            $property_accurate_result1 = Property::where('listing_type', $listing_type)
                ->where('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(1, $requirements_location)[0]) . '%')
                ->where('bedrooms', $requirements->rooms)
                ->where('bathrooms', $requirements->rooms)
                ->where('parking', $requirements->parking)
                ->where('balcony', $requirements->balcony)
                ->orderBy('created_at', '=', 'desc')->paginate(12);
            $property_accurate_result2 = Property::where('listing_type', $listing_type)
                ->where('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(2, $requirements_location)[0]) . '%')
                ->where('bedrooms', $requirements->rooms)
                ->where('bathrooms', $requirements->rooms)
                ->where('parking', $requirements->parking)
                ->where('balcony', $requirements->balcony)
                ->orderBy('created_at', '=', 'desc')->paginate(12);
            $property_accurate_result3 = Property::where('listing_type', $listing_type)
                ->where('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(3, $requirements_location)[0]) . '%')
                ->where('bedrooms', $requirements->rooms)
                ->where('bathrooms', $requirements->rooms)
                ->where('parking', $requirements->parking)
                ->where('balcony', $requirements->balcony)
                ->orderBy('created_at', '=', 'desc')->paginate(12);
            $property_accurate_result4 = Property::where('listing_type', $listing_type)
                ->where('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(4, $requirements_location)[0]) . '%')
                ->where('bedrooms', $requirements->rooms)
                ->where('bathrooms', $requirements->rooms)
                ->where('parking', $requirements->parking)
                ->where('balcony', $requirements->balcony)
                ->orderBy('created_at', '=', 'desc')->paginate(12);
            $property_accurate_result5 = Property::where('listing_type', $listing_type)
                ->where('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(5, $requirements_location)[0]) . '%')
                ->where('bedrooms', $requirements->rooms)
                ->where('bathrooms', $requirements->rooms)
                ->where('parking', $requirements->parking)
                ->where('balcony', $requirements->balcony)
                ->orderBy('created_at', '=', 'desc')->paginate(12);
            $property_accurate_result6 = Property::where('listing_type', $listing_type)
                ->where('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(6, $requirements_location)[0]) . '%')
                ->where('bedrooms', $requirements->rooms)
                ->where('bathrooms', $requirements->rooms)
                ->where('parking', $requirements->parking)
                ->where('balcony', $requirements->balcony)
                ->orderBy('created_at', '=', 'desc')->paginate(12);
            $property_accurate_result7 = Property::where('listing_type', $listing_type)
                ->where('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(7, $requirements_location)[0]) . '%')
                ->where('bedrooms', $requirements->rooms)
                ->where('bathrooms', $requirements->rooms)
                ->where('parking', $requirements->parking)
                ->where('balcony', $requirements->balcony)
                ->orderBy('created_at', '=', 'desc')->paginate(12);
            $property_accurate_result = $property_accurate_result1->merge($property_accurate_result2)->merge($property_accurate_result3)->merge($property_accurate_result4)->merge($property_accurate_result5)->merge($property_accurate_result6)->merge($property_accurate_result7);
        } else if ($location->getNumLocation($req_id) == 8) {
            $property_result = Property::where('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(1, $requirements_location)[0]) . '%')
                ->orWhere('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(2, $requirements_location)[0]) . '%')
                ->orWhere('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(3, $requirements_location)[0]) . '%')
                ->orWhere('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(4, $requirements_location)[0]) . '%')
                ->orWhere('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(5, $requirements_location)[0]) . '%')
                ->orWhere('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(6, $requirements_location)[0]) . '%')
                ->orWhere('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(7, $requirements_location)[0]) . '%')
                ->orWhere('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(8, $requirements_location)[0]) . '%')
                ->orderBy('created_at', 'desc')->paginate(12);
            $property_accurate_result1 = Property::where('listing_type', $listing_type)
                ->where('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(1, $requirements_location)[0]) . '%')
                ->where('bedrooms', $requirements->rooms)
                ->where('bathrooms', $requirements->rooms)
                ->where('parking', $requirements->parking)
                ->where('balcony', $requirements->balcony)
                ->orderBy('created_at', '=', 'desc')->paginate(12);
            $property_accurate_result2 = Property::where('listing_type', $listing_type)
                ->where('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(2, $requirements_location)[0]) . '%')
                ->where('bedrooms', $requirements->rooms)
                ->where('bathrooms', $requirements->rooms)
                ->where('parking', $requirements->parking)
                ->where('balcony', $requirements->balcony)
                ->orderBy('created_at', '=', 'desc')->paginate(12);
            $property_accurate_result3 = Property::where('listing_type', $listing_type)
                ->where('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(3, $requirements_location)[0]) . '%')
                ->where('bedrooms', $requirements->rooms)
                ->where('bathrooms', $requirements->rooms)
                ->where('parking', $requirements->parking)
                ->where('balcony', $requirements->balcony)
                ->orderBy('created_at', '=', 'desc')->paginate(12);
            $property_accurate_result4 = Property::where('listing_type', $listing_type)
                ->where('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(4, $requirements_location)[0]) . '%')
                ->where('bedrooms', $requirements->rooms)
                ->where('bathrooms', $requirements->rooms)
                ->where('parking', $requirements->parking)
                ->where('balcony', $requirements->balcony)
                ->orderBy('created_at', '=', 'desc')->paginate(12);
            $property_accurate_result5 = Property::where('listing_type', $listing_type)
                ->where('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(5, $requirements_location)[0]) . '%')
                ->where('bedrooms', $requirements->rooms)
                ->where('bathrooms', $requirements->rooms)
                ->where('parking', $requirements->parking)
                ->where('balcony', $requirements->balcony)
                ->orderBy('created_at', '=', 'desc')->paginate(12);
            $property_accurate_result6 = Property::where('listing_type', $listing_type)
                ->where('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(6, $requirements_location)[0]) . '%')
                ->where('bedrooms', $requirements->rooms)
                ->where('bathrooms', $requirements->rooms)
                ->where('parking', $requirements->parking)
                ->where('balcony', $requirements->balcony)
                ->orderBy('created_at', '=', 'desc')->paginate(12);
            $property_accurate_result7 = Property::where('listing_type', $listing_type)
                ->where('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(7, $requirements_location)[0]) . '%')
                ->where('bedrooms', $requirements->rooms)
                ->where('bathrooms', $requirements->rooms)
                ->where('parking', $requirements->parking)
                ->where('balcony', $requirements->balcony)
                ->orderBy('created_at', '=', 'desc')->paginate(12);
            $property_accurate_result8 = Property::where('listing_type', $listing_type)
                ->where('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(8, $requirements_location)[0]) . '%')
                ->where('bedrooms', $requirements->rooms)
                ->where('bathrooms', $requirements->rooms)
                ->where('parking', $requirements->parking)
                ->where('balcony', $requirements->balcony)
                ->orderBy('created_at', '=', 'desc')->paginate(12);
            $property_accurate_result = $property_accurate_result1->merge($property_accurate_result2)->merge($property_accurate_result3)->merge($property_accurate_result4)->merge($property_accurate_result5)->merge($property_accurate_result6)->merge($property_accurate_result7)->merge($property_accurate_result8);
        } else if ($location->getNumLocation($req_id) == 9) {
            $property_result = Property::where('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(1, $requirements_location)[0]) . '%')
                ->orWhere('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(2, $requirements_location)[0]) . '%')
                ->orWhere('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(3, $requirements_location)[0]) . '%')
                ->orWhere('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(4, $requirements_location)[0]) . '%')
                ->orWhere('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(5, $requirements_location)[0]) . '%')
                ->orWhere('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(6, $requirements_location)[0]) . '%')
                ->orWhere('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(7, $requirements_location)[0]) . '%')
                ->orWhere('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(8, $requirements_location)[0]) . '%')
                ->orWhere('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(9, $requirements_location)[0]) . '%')
                ->orderBy('created_at', 'desc')->paginate(12);
            $property_accurate_result1 = Property::where('listing_type', $listing_type)
                ->where('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(1, $requirements_location)[0]) . '%')
                ->where('bedrooms', $requirements->rooms)
                ->where('bathrooms', $requirements->rooms)
                ->where('parking', $requirements->parking)
                ->where('balcony', $requirements->balcony)
                ->orderBy('created_at', '=', 'desc')->paginate(12);
            $property_accurate_result2 = Property::where('listing_type', $listing_type)
                ->where('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(2, $requirements_location)[0]) . '%')
                ->where('bedrooms', $requirements->rooms)
                ->where('bathrooms', $requirements->rooms)
                ->where('parking', $requirements->parking)
                ->where('balcony', $requirements->balcony)
                ->orderBy('created_at', '=', 'desc')->paginate(12);
            $property_accurate_result3 = Property::where('listing_type', $listing_type)
                ->where('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(3, $requirements_location)[0]) . '%')
                ->where('bedrooms', $requirements->rooms)
                ->where('bathrooms', $requirements->rooms)
                ->where('parking', $requirements->parking)
                ->where('balcony', $requirements->balcony)
                ->orderBy('created_at', '=', 'desc')->paginate(12);
            $property_accurate_result4 = Property::where('listing_type', $listing_type)
                ->where('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(4, $requirements_location)[0]) . '%')
                ->where('bedrooms', $requirements->rooms)
                ->where('bathrooms', $requirements->rooms)
                ->where('parking', $requirements->parking)
                ->where('balcony', $requirements->balcony)
                ->orderBy('created_at', '=', 'desc')->paginate(12);
            $property_accurate_result5 = Property::where('listing_type', $listing_type)
                ->where('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(5, $requirements_location)[0]) . '%')
                ->where('bedrooms', $requirements->rooms)
                ->where('bathrooms', $requirements->rooms)
                ->where('parking', $requirements->parking)
                ->where('balcony', $requirements->balcony)
                ->orderBy('created_at', '=', 'desc')->paginate(12);
            $property_accurate_result6 = Property::where('listing_type', $listing_type)
                ->where('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(6, $requirements_location)[0]) . '%')
                ->where('bedrooms', $requirements->rooms)
                ->where('bathrooms', $requirements->rooms)
                ->where('parking', $requirements->parking)
                ->where('balcony', $requirements->balcony)
                ->orderBy('created_at', '=', 'desc')->paginate(12);
            $property_accurate_result7 = Property::where('listing_type', $listing_type)
                ->where('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(7, $requirements_location)[0]) . '%')
                ->where('bedrooms', $requirements->rooms)
                ->where('bathrooms', $requirements->rooms)
                ->where('parking', $requirements->parking)
                ->where('balcony', $requirements->balcony)
                ->orderBy('created_at', '=', 'desc')->paginate(12);
            $property_accurate_result8 = Property::where('listing_type', $listing_type)
                ->where('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(8, $requirements_location)[0]) . '%')
                ->where('bedrooms', $requirements->rooms)
                ->where('bathrooms', $requirements->rooms)
                ->where('parking', $requirements->parking)
                ->where('balcony', $requirements->balcony)
                ->orderBy('created_at', '=', 'desc')->paginate(12);
            $property_accurate_result9 = Property::where('listing_type', $listing_type)
                ->where('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(9, $requirements_location)[0]) . '%')
                ->where('bedrooms', $requirements->rooms)
                ->where('bathrooms', $requirements->rooms)
                ->where('parking', $requirements->parking)
                ->where('balcony', $requirements->balcony)
                ->orderBy('created_at', '=', 'desc')->paginate(12);
            $property_accurate_result = $property_accurate_result1->merge($property_accurate_result2)->merge($property_accurate_result3)->merge($property_accurate_result4)->merge($property_accurate_result5)->merge($property_accurate_result6)->merge($property_accurate_result7)->merge($property_accurate_result8)->merge($property_accurate_result9);
        } else if ($location->getNumLocation($req_id) == 10) {
            $property_result = Property::where('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(1, $requirements_location)[0]) . '%')
                ->orWhere('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(2, $requirements_location)[0]) . '%')
                ->orWhere('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(3, $requirements_location)[0]) . '%')
                ->orWhere('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(4, $requirements_location)[0]) . '%')
                ->orWhere('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(5, $requirements_location)[0]) . '%')
                ->orWhere('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(6, $requirements_location)[0]) . '%')
                ->orWhere('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(7, $requirements_location)[0]) . '%')
                ->orWhere('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(8, $requirements_location)[0]) . '%')
                ->orWhere('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(9, $requirements_location)[0]) . '%')
                ->orWhere('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(10, $requirements_location)[0]) . '%')
                ->orderBy('created_at', 'desc')->paginate(12);
            $property_accurate_result1 = Property::where('listing_type', $listing_type)
                ->where('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(1, $requirements_location)[0]) . '%')
                ->where('bedrooms', $requirements->rooms)
                ->where('bathrooms', $requirements->rooms)
                ->where('parking', $requirements->parking)
                ->where('balcony', $requirements->balcony)
                ->orderBy('created_at', '=', 'desc')->paginate(12);
            $property_accurate_result2 = Property::where('listing_type', $listing_type)
                ->where('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(2, $requirements_location)[0]) . '%')
                ->where('bedrooms', $requirements->rooms)
                ->where('bathrooms', $requirements->rooms)
                ->where('parking', $requirements->parking)
                ->where('balcony', $requirements->balcony)
                ->orderBy('created_at', '=', 'desc')->paginate(12);
            $property_accurate_result3 = Property::where('listing_type', $listing_type)
                ->where('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(3, $requirements_location)[0]) . '%')
                ->where('bedrooms', $requirements->rooms)
                ->where('bathrooms', $requirements->rooms)
                ->where('parking', $requirements->parking)
                ->where('balcony', $requirements->balcony)
                ->orderBy('created_at', '=', 'desc')->paginate(12);
            $property_accurate_result4 = Property::where('listing_type', $listing_type)
                ->where('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(4, $requirements_location)[0]) . '%')
                ->where('bedrooms', $requirements->rooms)
                ->where('bathrooms', $requirements->rooms)
                ->where('parking', $requirements->parking)
                ->where('balcony', $requirements->balcony)
                ->orderBy('created_at', '=', 'desc')->paginate(12);
            $property_accurate_result5 = Property::where('listing_type', $listing_type)
                ->where('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(5, $requirements_location)[0]) . '%')
                ->where('bedrooms', $requirements->rooms)
                ->where('bathrooms', $requirements->rooms)
                ->where('parking', $requirements->parking)
                ->where('balcony', $requirements->balcony)
                ->orderBy('created_at', '=', 'desc')->paginate(12);
            $property_accurate_result6 = Property::where('listing_type', $listing_type)
                ->where('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(6, $requirements_location)[0]) . '%')
                ->where('bedrooms', $requirements->rooms)
                ->where('bathrooms', $requirements->rooms)
                ->where('parking', $requirements->parking)
                ->where('balcony', $requirements->balcony)
                ->orderBy('created_at', '=', 'desc')->paginate(12);
            $property_accurate_result7 = Property::where('listing_type', $listing_type)
                ->where('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(7, $requirements_location)[0]) . '%')
                ->where('bedrooms', $requirements->rooms)
                ->where('bathrooms', $requirements->rooms)
                ->where('parking', $requirements->parking)
                ->where('balcony', $requirements->balcony)
                ->orderBy('created_at', '=', 'desc')->paginate(12);
            $property_accurate_result8 = Property::where('listing_type', $listing_type)
                ->where('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(8, $requirements_location)[0]) . '%')
                ->where('bedrooms', $requirements->rooms)
                ->where('bathrooms', $requirements->rooms)
                ->where('parking', $requirements->parking)
                ->where('balcony', $requirements->balcony)
                ->orderBy('created_at', '=', 'desc')->paginate(12);
            $property_accurate_result9 = Property::where('listing_type', $listing_type)
                ->where('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(9, $requirements_location)[0]) . '%')
                ->where('bedrooms', $requirements->rooms)
                ->where('bathrooms', $requirements->rooms)
                ->where('parking', $requirements->parking)
                ->where('balcony', $requirements->balcony)
                ->orderBy('created_at', '=', 'desc')->paginate(12);
            $property_accurate_result10 = Property::where('listing_type', $listing_type)
                ->where('city_title', 'LIKE', '%' . rtrim($this->getCityTitle(9, $requirements_location)[0]) . '%')
                ->where('bedrooms', $requirements->rooms)
                ->where('bathrooms', $requirements->rooms)
                ->where('parking', $requirements->parking)
                ->where('balcony', $requirements->balcony)
                ->orderBy('created_at', '=', 'desc')->paginate(12);
            $property_accurate_result = $property_accurate_result1->merge($property_accurate_result2)->merge($property_accurate_result3)->merge($property_accurate_result4)->merge($property_accurate_result5)->merge($property_accurate_result6)->merge($property_accurate_result7)->merge($property_accurate_result8)->merge($property_accurate_result9)->merge($property_accurate_result10);
        }
        $listings_number = sizeof($property_result);
        $data = [
            'accurate_property' => $property_accurate_result,
            'property' => $property_result,
            'requirement' => $requirements,
            'requirements_location' => $requirements_location,
            'location' => $location,
            'view_from' => BLOWUP_FROM_DASHBOARD,
            'listings_number' => $listings_number,
            'newMessage' => sizeof($user->newMessage)
        ];
        return view('main.dashboard.requirement.match')->with($data);
    }

    public function getCityTitle($id, $loc)
    {
        return explode(",", rtrim($loc->{'location' . $id}));
    }
    public function getAccurateListing(){

    }
}
