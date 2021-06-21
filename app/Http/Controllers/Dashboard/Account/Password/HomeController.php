<?php

namespace App\Http\Controllers\Dashboard\Account\Password;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Hash;
use App\User;
use Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        //
        return view('main.dashboard.account.password.index');
    }

    public function change_password() {

        $data = Input::all();
        $id = auth()->user()->id;
        $current_password = $data['current_password'];
        $new_password = $data['new_password'];
        $confirm_new_password = $data['confirm_new_password'];
        $current_pass = auth()->user()->password;
        $hash_current_password = Hash::make($current_password);


        if($new_password == $confirm_new_password) {
            if(Hash::check($current_password,$current_pass)) {
                if(Hash::check($new_password,$current_pass)) {
                    return redirect('/dashboard/account/password')
                    ->with(['update.success' => 'Your new password cannot be the same as your current password!']);
                }
                else {
                     $update = [
                    'password' => Hash::make($new_password)
                    ];
                     User::where('id','=',$id)->update($update);
                    // return redirect('/dashboard/account/password')
                    // ->with(['update.success' => 'Password Changed Successfully!']);

                    Auth::logout();
                    return redirect('/auth/login')  
                    ->with(['update.success' => 'Password Changed Successfully!']);
                }
               
            }   
            else {
                return redirect('/dashboard/account/password')
                     ->with(['update.success' => 'Please input your current password.']);
            } 
        }

        if($current_password == '') {
                    return redirect('/dashboard/account/password')
                    ->with(['update.success' => 'Please input your current password.']);
         

    }   
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
        }
    
}
