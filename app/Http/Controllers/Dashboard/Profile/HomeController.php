<?php

namespace App\Http\Controllers\Dashboard\Profile;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        return view('main.dashboard.profile.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    
}
