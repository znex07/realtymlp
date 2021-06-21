<?php

namespace App\Http\Controllers\Dashboard\Profile;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SharedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        return view('main.dashboard.profile.shared');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    
}
