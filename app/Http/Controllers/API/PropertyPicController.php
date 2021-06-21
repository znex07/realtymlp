<?php

namespace App\Http\Controllers\API;

use App\FilePic;
use App\Property;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PropertyPicController extends Controller
{
    public function index($property_code, $orig_name)
    {

        $pic = FilePic::where('property_code',$property_code)->where('orig_name',$orig_name)->get();
//        dd($pic);
        return response()->json($pic);
    }
}
