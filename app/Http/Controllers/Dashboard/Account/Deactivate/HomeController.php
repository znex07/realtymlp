<?php

namespace App\Http\Controllers\Dashboard\Account\Deactivate;

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
        return view('main.dashboard.account.deactivate.index');
    }
    
}
