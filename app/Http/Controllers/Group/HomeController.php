<?php

namespace App\Http\Controllers\Group;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use DB;
class HomeController extends Controller
{
    public function getIndex()
    {
    	if (!auth()->check()) 
    		return redirect('/');

        $user = User::with(['joinedgroups','ownedgroups.members'])->find(auth()->user()->id);
    	$data = [
    		'user' => $user,
            'newMessage' => sizeof(auth()->user()->newMessage)


    	];
//        dd($user);
        return view('main.groups.index')->with($data);
    }

}
