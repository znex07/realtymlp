<?php

namespace App\Http\Controllers\Dashboard\Account;

use App\Subscribe_Log;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex($id)
    {
        $user = auth()->user();
        $transaction = Subscribe_Log::where('id','=',$id)->get();
//        $subscriber = User::where('id',,)
        $data = [
            'transaction' => $transaction,
            'user' => $user,
            'id' => $id
        ];
//        dd($user);
        return view('main.dashboard.account.blowup')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
}
