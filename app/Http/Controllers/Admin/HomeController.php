<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Auth;

class HomeController extends Controller
{
    //
    public function getIndex()
    {
        if (!auth()->user()) {
            return redirect('/auth/login');
        } else {
            $user = auth()->user();
            if ($user->user_type == '1') {
                return redirect('/');
            } elseif ($user->user_type == '2') {
                $user_count = User::count();
                return view('main.admin.index')->with('count', $user_count);
            }
        }
//        if(auth()->user())
//        {
//            $user_count = User::count();
//            return view('main.admin.index')->with('count',$user_count);
//            return redirect('/admin/login');
//        }else{
//            $user = auth()->user();
//            if($user->user_type == '1') {
//                return redirect('/');
//            }elseif ($user->user_type == '2') {
//                $user_count = User::count();
//                return view('main.admin.index')->with('count',$user_count);
//            }
//        }
    }

}
