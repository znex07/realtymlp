<?php

namespace App\Http\Controllers\Profile;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class AdminProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex($id)
    {
        $user = User::where('id',$id)->get();
        $user = $user->get(0);
        $properties = $user->properties()->get();
        $public_user_listing = $user->properties()->PublicProperties()->count();
        $private_user_listing = $user->properties()->PrivateProperties()->count();

        $data = [
            'user' => $user,
            'mode' => auth()->user() ? 'logged_in' : 'in_public',
            'view_code' => '',
            'view_from' => '1',
            'public' => $public_user_listing,
            'private' => $private_user_listing,
            'listings' => $properties,
            'newMessage' => sizeof($user->newMessage)
        ];
//   dd($private_user_listing);
        return view('main.profile.admin-index')->with($data);
    }


}
