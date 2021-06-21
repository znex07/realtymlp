<?php

namespace App\Http\Controllers\Dashboard\Account;

use App\Subscribe_Log;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LedgerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        $user = auth()->user();
        $sub_log = Subscribe_Log::where('user_id','=',$user->id)->where('subscription_id','!=',1)->get();
        $data = [
            'sub_log' => $sub_log,

        ];
        return view('main.dashboard.account.ledger')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    
}
