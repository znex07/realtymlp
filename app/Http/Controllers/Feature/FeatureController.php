<?php

namespace App\Http\Controllers\Feature;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        return view('main.feature.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    
}
