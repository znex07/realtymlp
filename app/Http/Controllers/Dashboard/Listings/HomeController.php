<?php

namespace App\Http\Controllers\Dashboard\Listings;

use App\Http\Controllers\Controller;
use App\Jobs\Resource\Property\MoveProperty;
use App\Property;
use App\Property_User;
use Illuminate\Support\Facades\Input;
use App\Property_Log;
use App\UserSubscribe;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        //


//        return view('main.dashboard.listings.index');
    }

    public function moveProperty(Input $input)
    {
        $id = $input->get('id');
        $to = $input->get('to');
        $property = Property::find($id);
        if ($to === 'Private') {
            $property->property_status = 2;
            $property->save();
        } elseif ($to === 'Public') {
            $property->property_status = 1;
            $property->save();
        }
        $property_code = $property->property_code;
        $create = [
            'property_code' => $property_code,
            'action' => 'MOVE LISTING',
        ];
        Property_Log::create($create);
    }

    public function deleteProperty(Input $input)
    {
        $id = $input->get('id');

        $property = Property::find($id);
        $property_code = $property->property_code;

        //update the number of available listings
        $user = auth()->user();
        $avail_listings = UserSubscribe::where('id', '=', $user->id)->first();
        $avail_listings->listings = $avail_listings->listings - 1;
        $avail_listings->save();


        $ipAddress = $_SERVER['REMOTE_ADDR'];
        if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER)) {
            $ipAddress = array_pop(explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']));
        }

        $create = [
            'property_code' => $property_code,
            'action' => 'DELETE LISTING',
            'ip_address' => $ipAddress
        ];
//        dd($input);
        Property_Log::create($create);

        Property::where('id', $id)->forceDelete();
        return ['message' => true];
    }
}
