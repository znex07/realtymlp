<?php

namespace App\Http\Controllers\Resource\Properties;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Property;

class RegularController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex(Request $request)
    {
        $data = $request->all();

        $regulars = Property::with(['images'])
            ->where('property_status', '1')
            ->orWhere('property_status', '3')
            ->where('visibility',1)
            ->orderBy('created_at','desc')
            ->paginate(5);
        if ($request->has('transaction_type', 'location')) {
            $location_request = $request['location'];
            $transaction_request = $request['transaction_type'];

            $public_result = ['property_status' => '2', 'listing_type' => $transaction_request];

            $regulars = Property::with(['images'])
                ->where('listing_type','=',$transaction_request)
                ->where('city_title','LIKE','%' . $location_request .'%')
                ->orWhere('province_title','LIKE','%'.$location_request .'%')
                ->orderBy('created_at','desc')
                ->paginate(5);
        }
//              dd($regulars);

        $data = [
            'regulars' => $regulars,
            'viewmode' => 'regular',
            'view_code' => VIEW_CODE_LISTING_REGULAR,
            'view_from' => BLOWUP_FROM_REGULAR,
            'intab' => '',
        ];
        return view('main.dashboard.properties.regular')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */

}
