<?php

namespace App\Http\Controllers\Auth\ForgotPassword;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Input;
use Hash;
use App\Emails;
class ChangePasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex($slug,$id)
    {
        //
        $user = User::find($id);
        $emails = Emails::where('token', '=', $slug)->get();

        $data = [
            'user' => $user,
            'emails' => $emails->get(0)

        ];
        
        // $status = $data_emails['emails'][0]['status'];
        // $type = $data_emails['emails'][0]['type'];
        // $da
        // if($status == '0' && $type == '2') {

        // }
        return view('main.dashboard.account.forgot_password.change_password')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */


    public function Update() {
        
        $data = Input::all();
        $user_id = $data['user_id'];  
        $new_password = $data['new_password'];
        $confirm_new_password = $data['confirm_new_password'];

        if($new_password == $confirm_new_password) {
            $update = [
                'password' => Hash::make($new_password)
            ];
            User::where('id', '=', $user_id)->update($update);
            return redirect('/auth/login')  
                    ->with(['update.success' => 'Password Changed Successfully!']);
        }

    }
}
