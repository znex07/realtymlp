<?php

namespace App\Http\Controllers\Dashboard\Overview;


use App\Group;
use App\Jobs\User\GetAffiliates;
use App\Property;
use App\Subscribe_Log;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\UserSubscribe;


class HomeController extends Controller
{

    public function getIndex()
    {

        $user = auth()->user();
        /* ======================================
                Listings
           =======================================*/
        $aff_list = $user->shares()->get();
        $my_listing = $user->properties()->orderBy('created_at', 'desc')->take(5)->get();
        $total_aff = $user->confirmedAffiliates()->count();
        /*=======================================
                 Affiliates
        ========================================*/
        $group = $user->joinedgroups()->with(['members','properties'])->orderBy('created_at','desc')->get();
        /* ======================================
          Global
           =======================================*/
        $available_listings = $user->getNumListings($user->id,'available');
        $total_listings = Subscribe_Log::where('user_id','=',$user->id)->orderBy('created_at' , 'desc')->limit(1)->pluck('listings');
        $available_affiliate = $user->getNumAffiliate($user->id,'available');
        $total_affiliate = Subscribe_Log::where('user_id','=',$user->id)->orderBy('created_at' , 'desc')->limit(1)->pluck('affiliates');
        $available_shared_to_me = $user->getAvailableSharedToMe($user->id);
        $subscription_type_name = $user->getSubscriptionTypeName($user->user_subscription);
        $avail_requirements = $user->getNumRequirements($user->id,'available');
        $total_requirements = Subscribe_Log::where('user_id','=',$user->id)->orderBy('created_at' , 'desc')->limit(1)->pluck('requirements');
        $time_now = Carbon::now();
        $subs_logs = Subscribe_Log::where('user_id','=',$user->id)->where('remaining_days','=',0)->where('expires_at','<=',$time_now)->sum('balance');
        $total = $total_listings - $subs_logs;
        $stats_log = Subscribe_Log::where('user_id','=',$user->id)->where('subscription_id','!=',1)->where('expires_at','<=',$time_now)->get();
        $stats_log1 = Subscribe_Log::where('user_id','=',$user->id)->where('subscription_id','!=',1)->where('expires_at','>=',$time_now)->get();
        $free = 0;
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




        $data = [
            'available_listings' => $available_listings,
            'total_listings' => $total_listings,
            'subscription_type_name' => $subscription_type_name,
            'available_affiliate' => $available_affiliate,
            'total_affiliates' => $total_affiliate,
            'shared_to_me' => $available_shared_to_me,
            'avail_requirements' => $avail_requirements,
            'total_requirements' => $total_requirements,
            'time_now' => $time_now,
            'subs_logs' => $subs_logs,
            'stats_log' => $stats_log,
            'stats_log1' =>$stats_log1,
            'aff_list' =>$aff_list,
            'group' => $group,
            'newMessage' => sizeof($user->newMessage),
            'my_listing' => $my_listing,
            'total_aff' => $total_aff
        ];

//     dd($my_listing);
        return view('main.dashboard.overview.index')->with($data);
    }

    
}
