<?php

namespace App\Http\Controllers\Dashboard\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Jobs\Searching\GetSubscription;
use App\Subscription;
use Illuminate\Support\Facades\Input;

class SubscribeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
//        $in = $input->get('id');
//        dd($in);
        $user = auth()->user();
        $data = [
            'listings' => $this->dispatch(new GetSubscription()),
            'subscription_type' => $user->user_subscription
        ];
        dd($data);
        return view('main.dashboard.account.subscribe')->with($data);
    }

    public function downgrade($subsc_type){
        $user = auth()->user();
        if($subsc_type == "Free")
        {
            $user->user_subscription = 1;
            $user->save();            
            return redirect('/dashboard');
        }
    }
    public function subscribe($subsc_type){
        $user = auth()->user();
        if($subsc_type == "Premium")
        {
            $user->user_subscription = 2;
            $user->save();            
            return redirect('/dashboard');
        }else if($subsc_type == "Premium+")
        {
            $user->user_subscription = 3;
            $user->save();            
            return redirect('/dashboard');
        }
    }
}
