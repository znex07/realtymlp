<?php

namespace App\Http\Controllers\Dashboard\Affiliate;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AffiliateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {

        return view('main.dashboard.affiliate.index')->with;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    
}
