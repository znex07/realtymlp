<?php

namespace App\Http\Controllers\Agents;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        return view('main.agents.profile');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    
}
