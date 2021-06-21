<?php

namespace App\Http\Controllers\Admin\Users;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex() {
        //
        return view('main.admin.users.email');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */

}
