<?php

namespace App\Http\Controllers\Dashboard\Account;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FeatprojController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
   
        return view('main.dashboard.account.featproj');
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    
}
