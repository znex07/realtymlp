<?php

namespace App\Http\Controllers\Resource\Properties;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Property;
class QuickController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        $quicks = Property::where('property_status','3')->get();
        $data = [
            'listings' => $quicks
        ];
        return view('main.dashboard.properties.quick')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */

}
