<?php

namespace App\Http\Controllers\Admin\Group;

use App\Group;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class EditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex($id)
    {
        $group = Group::where('id',$id)->first();
        $member = DB::table('group_user')->where('group_id',$id)->get();
        $users = User::all();
        $m = array();
        for ($i = 1; $i < sizeof($member); $i++){
//            $m[$i] = User::where('id',$member[$i])->pluck('user_lname');
            $m[] = User::where('id',$member[$i]->user_id)->pluck('user_fname') . ' ' . User::where('id',$member[$i]->user_id)->pluck('user_lname');
        }
        $data = [
            'users' => $users,
            'group' => $group,
            'group_title' => $group->group_title,
            'group_description' => $group->group_description,
            'member' => $m
        ];
        return view('main.admin.groups.edit')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
}
