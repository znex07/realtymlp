<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Jobs\Auth\Register;
use Auth;
use Input;
use Request;
use App\User;
class RegisterController extends Controller
{
    public function getIndex()
    {
        $code = Request::get('code');
        $user = User::where('user_code', '=', $code)->first();   
        if($code == null) {
            $data = [
                'code' => $code
            ];
        }
        else {
            $data = [
                'code' => $code,
                'user' => $user
            ];    
        }
        
        return view('main.landing.register')->with($data);
    }

    public function postIndex(RegisterRequest $request)
    {

        $registered = $this->dispatch(new Register($request->input()));
        if ($registered) {
            Auth::login($registered);
            return redirect('auth/login')
            ->with(['register.success' => 'Please verify your account through your email.']);
        
        }

        return redirect('auth/register')
            ->with(['error' => 'An error has occured. Please try again.']);
    }
}
