<?php

namespace App\Http\Controllers\Agents;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
class AgentsController extends Controller
{
    public function getIndex(Request $request)
    {
        $data=$request->all();
        $members = User::members()->publicAgents();
        $user_agent = User::where('status','=','1')->get();
        $new = $members->get();
        $agents = collect([]);
        if($request->has('nav_search'))
        {
            $nav_id = $request['nav_search'];
            $new = $members->where('id','=',$nav_id)->get();
//            dd($new);
        }
      // dd($members);
      $data = [
          'member_search' =>$user_agent,
        'members' => $new,
        'mode' => 'in_public',
          'agents' => $agents
      ];

      return view('main.agents.agents')->with($data);
    }

}
