<?php

namespace App\Http\Controllers\Dashboard\Message;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        return view('main.dashboard.message.send');
    }

}
