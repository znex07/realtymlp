<?php

namespace App\Http\Controllers\Admin\Users\Ledger;

use App\User;
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
    public function getIndex($id)
    {
        //
        $users = User::where('id','=',$id)->get();
        return view('main.admin.users.ledger.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */

}
