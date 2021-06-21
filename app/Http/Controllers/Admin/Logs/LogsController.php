<?php

namespace App\Http\Controllers\Admin\Logs;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        return view('main.admin/logs.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */

}
