<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use App\Transaction;
use App\Department;
use App\Location;
class QuickController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {

        $condition = Category::conditions()->get();
        $department = Department::where('parent_id','=','0')->get();
        $availabilities = Category::availabilities()->get();
        $ownerships = Category::ownerships()->get();
        $transaction = Transaction::all();
        $province = Location::where('parent_id','=','0')->get();

        
        $data = [
            'condition' => $condition,
            'availabilities' => $availabilities,
            'transaction' => $transaction,
            'department' => $department,
            'province' => $province,
            'affiliates' => auth()->user()->confirmedAffiliates,
            'ownerships' => $ownerships
        ];

        //
    	return view('main.dashboard.quickpost')->with($data);
    }

    
}
