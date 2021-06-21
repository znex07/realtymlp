<?php

namespace App\Http\Controllers\Dashboard\Account\Payment;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\UserSubscribe;

class SuccessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        // $user = auth()->user();
        // $user_subscription = UserSubscribe::where('id','=',$user->id)->first();
        // if($user->getSubscriptionDetails($user->user_subscription) == 10)
        // {
        //     $user->user_subscription = 2;
        //     $user->save();            
        // }

        // return redirect('dashboard');
    }
    public function downgrade(){
        return 'downgraded';
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

}
