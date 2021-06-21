<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Jobs\Auth\Login;
use App\Subscribe_Log;
use App\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
// use Input;
class LoginController extends Controller
{
    public function getIndex()
    {
        $user = auth()->user();

        if (!auth()->check()){
            return view('main.landing.login');
        }elseif ($user->user_type == '1'){
            return redirect('/dashboard/overview');
        }elseif ($user->user_type == '2'){
            return redirect('/admin');
        }

    }

    public function postIndex(LoginRequest $login)
    {
        $authed = $this->dispatch(new Login($login->input()));
        $user = auth()->user();

        if($authed)
        {
            $stat = auth()->user()->activation_code;
            if($stat == '0') {
                return redirect('/auth/login')
                    ->with(['error' => 'Please check your email to verify your account']);
            }elseif ($user->user_type == '1'){
                return redirect('/dashboard/overview');
            }elseif ($user->user_type == '2'){
                return redirect('/admin');
            }
        }

        return redirect('/auth/login')
            ->with(['error' => 'Incorrect username or password']);
        $total_listings = Subscribe_Log::where('user_id','=',$user->id)->orderBy('created_at' , 'desc')->limit(1)->pluck('listings');
        $time_now = Carbon::now();
        $subs_logs = Subscribe_Log::where('user_id','=',$user->id)->where('remaining_days','=',0)->where('expires_at','<=',$time_now)->sum('balance');
        $total = $total_listings - $subs_logs;
        $subs_log = Subscribe_Log::all();
        if($total <= 0)
        {
            $total = 10;
            $updates = [
                'user_subscription' => 1
            ];
            User::where('id','=',$user->id)->update($updates);
            $total_listings = 10;
            $total_requirements = 10;

        }
        $updatess = [
            'remaining_days' => 1
        ];
        Subscribe_Log::where('user_id','=',$user->id)->where('expires_at','<=',$time_now)->update($updatess);
        $update = [
            'listings' => $total,
            'requirements' => $total,
        ];
        Subscribe_Log::where('user_id','=',$user->id)->orderBy('created_at' , 'desc')->limit(1)->update($update);
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect('/auth/login');
    }
}
