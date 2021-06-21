<?php

namespace App\Http\Controllers\Admin\Reports;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PropertiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        return view('main.admin.reports.properties');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */

}
