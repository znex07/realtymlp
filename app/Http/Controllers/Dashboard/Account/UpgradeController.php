<?php

namespace App\Http\Controllers\Dashboard\Account;

use App\Jobs\Searching\GetPrice;
use App\Jobs\Searching\GetSubscription;
use App\User;
use Illuminate\Http\Request;
use App\Subscription;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UpgradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        $subscription = $this->dispatch(new GetSubscription());
        $user = auth()->user();
        $subscription_name = Subscription::where('id', '=', $user->user_subscription)->first();
        
        $subscription_name = $subscription_name->name;
        $data = [
            'subscription' => $subscription,
            'user' => $user,
            'subscription_name' => $subscription_name,
        ];

        return view('main.dashboard.account.upgrade')->with($data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */

}
