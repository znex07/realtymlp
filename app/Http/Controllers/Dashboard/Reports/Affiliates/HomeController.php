<?php

namespace App\Http\Controllers\Dashboard\Reports\Affiliates;

use Illuminate\Http\Request;
use App\Affiliate_Log;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        //

        $user = auth()->user();
        $logs = Affiliate_Log::where('user_id','=',$user->id)->get();

        $data = [
            'logs' => $logs,
            'newMessage' => sizeof($user->newMessage)
        ];


        return view('main.dashboard.reports.affiliates.index')->with($data);
    }

 
}
