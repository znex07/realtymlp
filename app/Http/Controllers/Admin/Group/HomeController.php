<?php

namespace App\Http\Controllers\Admin\Group;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

use App\Http\Requests\Group\GroupRequest;

use App\Jobs\Group\CreateGroup;
class HomeController extends Controller
{
    public function getIndex()
    {
      return view('main.admin.groups.index');

    }

    public function create()
    {
      $data = [
        'users' => User::all(),
      ];
     return view('main.admin.groups.create')->with($data);
    }

    public function postCreate(GroupRequest $request)
    {
      $group = $this->dispatch(new CreateGroup($request));
      return redirect()->back();
    }

}
