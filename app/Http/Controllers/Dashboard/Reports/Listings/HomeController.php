<?php

namespace App\Http\Controllers\Dashboard\Reports\Listings;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Property;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        //
        $properties = auth()->user()->properties()->get();
        $user = auth()->user();
        
        $data = [
            'properties' => $properties,
             'newMessage' => sizeof($user->newMessage)
        ];

        return view('main.dashboard.reports.listings.index')->with($data);
    }

   
}
