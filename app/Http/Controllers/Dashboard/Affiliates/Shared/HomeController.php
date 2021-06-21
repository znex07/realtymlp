<?php

namespace App\Http\Controllers\dashboard\affiliates\Shared;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use DB;
class HomeController extends Controller
{
    public function getIndex($slug,$id)
    {
    	$user = auth()->user()->affiliates()->find($id);
    	$data = [
    		'user' => $user,
    		'properties' => $user->shares,
    		'mode' => 'aff-shares',
            'view_code' => VIEW_CODE_LISTING_PROFILE,
            'view_from' => BLOWUP_FROM_AFFILIATE_OWN,
            'intab' => '',
			'newMessage' => sizeof($user->newMessage)
            // 'is_owner' => true,
    	];
        return view('main.dashboard.affiliates.shared')->with($data);
    }
}
