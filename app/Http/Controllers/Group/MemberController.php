<?php

namespace App\Http\Controllers\Group;

use App\Group;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        $user = auth()->user();
        $group_member = Group::all();
        $data = [
            'newMessage' => sizeof(auth()->user()->newMessage),
            'group' => $group_member
        ];
//        dd($group_member);
        return view('main.groups.member')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
}
