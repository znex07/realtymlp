<?php

namespace App\Http\Controllers\Admin\Login;

use App\Admin;
use App\Jobs\Auth\Login;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Jobs\Auth\AdminLogin;
class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        return view('main.admin.login.index');
    }

    public function postLogin(Request $request) {
        $data = Input::all();
        $authed = $this->dispatch(new Login($data));
        if($authed){
            $user_count = User::count();
            return view('main.admin.index')->with('count',$user_count);
        }
//        return redirect('/admin/login');
//        $login = $this->dispatch(new AdminLogin($data));
    }

    public function getLogout()
    {
//        Auth::logout();
        return redirect('/');
    }
}
