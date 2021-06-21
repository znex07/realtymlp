<?php

namespace App\Http\Controllers\Dashboard\Listings;

use App\Jobs\Resource\Share\RemoveShareJob;
use App\Property_User;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Property_Log;
use App\Property;
class UnshareController extends Controller
{
    //
    public function getIndex()
    {
        //
        return view('main.dashboard.index');
    }

    public function removeShare(Request $request, Property $property)
    {
        $id = $request->get('id');
        $property_code = $request->get('property_code');
        $answer = $request->get('answer');
        $user = User::all();

        $ipAddress = $_SERVER['REMOTE_ADDR'];
        if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER)) {
            $ipAddress = array_pop(explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']));
        }

        $create = [
            'property_code' => $property_code,
            'action' => 'UNSHARE LISTING',
            'ip_address' => $ipAddress,
        ];
        if($request->get('type') == 'affiliate')
        {
            $property = $property->find($id);
            $property->shares()->detach($answer);
            Property_Log::create($create);
        }
        elseif($request->get('type') == 'group')
        {
            $property = $property->find($id);
            $property->groups()->detach($answer);
        }
    }
}
