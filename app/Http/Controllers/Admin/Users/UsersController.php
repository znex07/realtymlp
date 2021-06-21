<?php

namespace App\Http\Controllers\Admin\Users;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        //
        $users = User::all();
        return view('main.admin.users.index',compact('users'));
    }

    public function create() {
        $data = Input::all();
        $user_code = 'RM' . time();


        $input = [
            'user_code' => $user_code,
            'user_type' => '1',
            'user_subscription' => '1',
            'user_fname' => $data['user_fname'],
            'user_lname' => $data['user_lname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ];

//        User::create($input);
//        return redirect('/admin/users');
//        return view('main.admin.users.email',compact('data'));
        Mail::send('main.admin.users.email', ['password'=>$data['password']], function ($message) use($data){
            $message->from('realtymlp@gmail.com', 'RealtyMLP');
            $message->to( Input::get('email') )->subject('Welcome To RealtyMLP');
        });


//        Mail::send('main.admin.users.email', array('firstname'=>Input::get('firstname')), function($message){
//            $message->to(Input::get('email'), Input::get('firstname').' '.Input::get('lastname'))->subject('Welcome to the Laravel 4 Auth App!');
//        });

    }

    public function delete() {

      $data = Input::all();
      $id = $data['id'];
      $users = User::find($id);
      $users->delete();
      // return redirect()->back();
    }
    public function update(){
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */

}
