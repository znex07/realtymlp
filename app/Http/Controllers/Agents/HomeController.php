<?php

namespace App\Http\Controllers\Agents;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class HomeController extends Controller
{
    public function getIndex(Request $request)
    {
        $data = $request->all();
        $members = User::members()->publicAgents();
        $user_agent = User::where('status','=','1')->get();
        if (auth()->user()) {
            $members = $members->where('id', '!=', auth()->user()->id);
        }
        $affiliates = auth()->user()->affiliates();
        $new = $members->get()->merge($affiliates->get()->all());
        $user = auth()->user();
        $agents = collect([]);
        if($request->has('nav_search'))
        {
            $nav_id = $request['nav_search'];
            $new = $affiliates->where('affiliate_id','=',$nav_id)->get();
//            dd($new);
        }

        $data = [
            'members' => $new,
            'mode' => 'in_logged',
            'blowup_mode ' => BLOWUP_INDEX,
            'newMessage' => sizeof($user->newMessage),
            'agents' => $agents
        ];
//        dd($user_agent);
        return view('main.agents.index')->with($data);
    }
}
