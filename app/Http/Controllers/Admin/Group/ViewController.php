<?php

namespace App\Http\Controllers\Admin\Group;

use App\Group;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
//       $user = auth()->user();
        $group = Group::all();
        $data = [
            'group' => $group,
//            'moderator' => $mod
        ];
        return view('main.admin.groups.view')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
}
