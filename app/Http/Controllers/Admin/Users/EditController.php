<?php

namespace App\Http\Controllers\Admin\Users;

use App\Requirements;
use App\Subscribe_Log;
use App\UserSubscribe;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Categories;
use App\Subscription;
use Input;
use App\User;


class EditController extends Controller
{
    public function getIndex($id, $slug)
    {
        $subscription = Subscription::all();
        $user = User::find($id);
        $time_now = Carbon::now();
        $sub_edit = Subscribe_Log::where('subscription_id','!=',1)->where('user_id','=',$user->id)->where('expires_at','>=',$time_now)->get();
        $data = [
            'user' => $user,
            'subs' => $subscription,
            'sub_edit' => $sub_edit
        ];
        return view('main.admin.users.edit')->with($data);
    }

    public function update()
    {
        $data = Input::all();
        $id = $data['id'];
        $user = User::where('id',$id)->first();
        $listing_user = Subscribe_Log::where('user_id', '=', $id)->orderBy('created_at', 'desc')->limit(1)->pluck('listings');
        $requirement_user = Subscribe_Log::where('user_id', '=', $id)->orderBy('created_at', 'desc')->limit(1)->pluck('requirements');
        $time_now = Carbon::now();
        $total_listings = Subscribe_Log::where('user_id','=',$id)->orderBy('created_at' , 'desc')->limit(1)->pluck('listings');
        $subs_logs = Subscribe_Log::where('user_id','=',$id)->where('remaining_days','=',0)->where('expires_at','<=',$time_now)->sum('balance');
        $total = $total_listings - $subs_logs;
        $expire_date= Carbon::now()->addDays(181);
        $list = 0;
        $remain = 0;
        $subs_type="";
        if($listing_user == 10)
        {
            $listing_user = 0;
        }

        $update = [
            'user_fname' => $data['user_fname'],
            'user_lname' => $data['user_lname'],
            'user_type' => $data['user_type'],
            'user_subscription' => $data['subs']
        ];
        User::where('id', '=', $id)->update($update);
        if ($data['subs'] == 1) {
            $user->user_subscription = 1;
            $user->save();
            $user_update = [
                'user_subscription' => 1
            ];
            User::where('id','=',$id)->update($user_update);

            $total_listings = 10;
            $subs_type = "Free";
            $sublog_update = [
                'remaining_days' => $remain,
                'expires_at' => $time_now->subDays(1),
            ];
            Subscribe_Log::where('user_id','=',$id)->update($sublog_update);
        }
        $update_list = [
            'listings' => $total,
            'requirements' => $total,
        ];
        Subscribe_Log::where('user_id','=',$id)->orderBy('created_at' , 'desc')->limit(1)->update($update_list);
        if($data['subs'] == 2)
        {
            $user->user_subscription =2;
            $user->save();
            $list = 100;
            $subs_type = "Premium";
        }
        if($data['subs'] == 3)
        {
            $user->user_subscription =3;
            $user->save();
            $list = 500;
            $subs_type = "Premium+";
        }
        $create = [
            'user_id' => $user->id,
            'subscription_name' =>$subs_type,
            'subscription_id' => $user->user_subscription,
            'total_payment' => 0.00,
            'expires_at' => $expire_date,
            'listings' => $list + $listing_user,
            'requirements' => $list + $listing_user,
            'balance' => $list,
            'group_subs' => $list + $listing_user
        ];
        User::where('id', '=', $id)->update($update);
        Subscribe_Log::create($create);
        return redirect()->back();
    }
    public function expire()
    {
        $data = Input::all();
        $id = $data['id'];
        $remain = 0;
        $time_now = Carbon::now();
         $sublog_update = [
             'remaining_days' => $remain,
             'expires_at' => $time_now->subDays(1),
         ];
        Subscribe_Log::where('id','=',$id)->update($sublog_update);
//         return redirect()->back();
    }
}