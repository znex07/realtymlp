<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Input;
use App\Emails;
class ActivateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex($slug,$code)
    {
        //
        $user = User::where('user_code', '=',$code)->get();
        $emails = Emails::where('token','=',$slug)->where('type','=','1')->get();
        $data = [
            'user' => $user->get(0),
            'emails' => $emails->get(0)
        ];


        $user_stat = $data['user']['activation_code'];
        $created_at = $data['user']['created_at'];     
        
        if(time() - strtotime($created_at) < 60*60*24) {

            if($user_stat == '0') {
                $user_id = $data['user']['id'];
                $update = [
                    'activation_code' => '1'
                ];

                User::where('id', '=', $user_id)->update($update);
                return redirect('/auth/login')  
                            ->with(['update.success' => 'Account Activated Successfully!']);    
            }
            else {
                return view('main.landing.activate')->with($data);
            }
        }
        else {

            return view('main.landing.activate')->with($data);
        }

        
    }

   
}
