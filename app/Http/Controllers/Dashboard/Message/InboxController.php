<?php

namespace App\Http\Controllers\Dashboard\Message;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class InboxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        return view('main.dashboard.message.inbox');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    
}
