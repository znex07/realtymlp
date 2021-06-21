<?php

namespace App\Http\Controllers\Dashboard\Profile;

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
        //
        return view('main.dashboard.profile.index');
    }

}
