<?php

namespace App\Http\Controllers\Dashboard\Requirement;

use App\Requirements;
use App\Subscribe_Log;
use App\Transaction;
use App\UserSubscribe;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        $user = auth()->user();
        $requirements = Requirements::where('user_id',$user->id)->orderBy('updated_at','desc')->paginate(12);
        $avail_requirements = $user->getNumRequirements($user->id,'available');
        $total_requirements = Subscribe_Log::where('user_id','=',$user->id)->orderBy('created_at' , 'desc')->limit(1)->pluck('requirements');
        Requirements::where('user_id',$user->id)->update(['visibility' => 1]);
        if($user->user_subscription == 1){
            $total_requirements = 10;
            Requirements::where('user_id',$user->id)->orderBy('created_at','asc')->limit($avail_requirements - $total_requirements)->update(['visibility' => 0]);
        }
        $affiliates = $user->confirmedAffiliates;
        $location = new Requirements();
        // dd(sizeof($affiliates));
        $data = [
            'affiliates' => $affiliates,
            'requirements' => $requirements,
            'avail_requirements' => $avail_requirements,
            'total_requirements' => $total_requirements,
            'location' => $location,
            'view_from' => 6,
            'newMessage' => sizeof($user->newMessage)
//            'listing_type' => Transaction::where('id',$requirements->pluck('id'))->pluck('title'),
        ];
        return view('main.dashboard.requirement.index')->with($data);
    }
    public function search(Request $request){
        $user = auth()->user();
        $location = $request['location'];
        $requirements = Requirements::where('user_id',$user->id)->orderBy('updated_at','desc')->paginate(12);
        // dd($requirements);
        $avail_requirements = $user->getNumRequirements($user->id,'available');
        $total_requirements = Subscribe_Log::where('user_id','=',$user->id)->orderBy('created_at' , 'desc')->limit(1)->pluck('requirements');
        Requirements::where('user_id',$user->id)->update(['visibility' => 1]);
        if($user->user_subscription == 1){
            $total_requirements = 10;
            Requirements::where('user_id',$user->id)->orderBy('created_at','asc')->limit($avail_requirements - $total_requirements)->update(['visibility' => 0]);
        }
        $affiliates = $user->confirmedAffiliates;
        $location = new Requirements();
        // dd($location->getRequirementLocations(1));
        $data = [
            'affiliates' => $affiliates,
            'requirements' => $requirements,
            'avail_requirements' => $avail_requirements,
            'total_requirements' => $total_requirements,
            'location' => $location,
            'view_from' => 6,
            'newMessage' => sizeof($user->newMessage)
            // 'listing_type' => Transaction::where('id',$requirements->pluck('id'))->pluck('title'),
        ];
        return view('main.dashboard.requirement.index')->with($data);
    }
}
