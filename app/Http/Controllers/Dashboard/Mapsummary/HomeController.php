<?php

namespace App\Http\Controllers\Dashboard\Mapsummary;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        $user = auth()->user();
        $data = [
            'user' => $user,
            'mode' => 'logged_in',
            'newMessage' => 'logged_in',
            'newAffiliate' => 0
        ];
        return view('main.dashboard.mapsummary.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
}
