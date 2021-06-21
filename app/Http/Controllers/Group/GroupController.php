<?php

namespace App\Http\Controllers\Group;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Group;
use App\GroupUser;
class GroupController extends Controller
{
    public function getIndex($id, $slug)
    {
        $group = Group::with(['members', 'properties'])->find($id);
        $user = auth()->user();
        $data = [
            'group' => $group,
            'view_code' => VIEW_CODE_LISTING_GROUP,
            'viewmode' => 'group',
            'view_from' => BLOWUP_FROM_GROUP,
            'intab' => 'group',
            'newMessage' => sizeof($user->newMessage),
        ];
//        dd($group);
        return view('main.groups.group')->with($data);
    }

}
