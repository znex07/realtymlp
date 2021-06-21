<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Location;
use Input;
use App\Message;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex($user_code,$slug)
    {
        $user = User::where('user_code', $user_code)->get();
        $user = $user->get(0);
        $properties = $user->properties()->publicProperties()->get();

        $data = [
            'user' => $user,
            'mode' => auth()->user() ? 'logged_in' : 'in_public',
            'view_code' => '',
            'view_from' => '1',
            'listings' => $properties,
            'newMessage' => sizeof($user->newMessage)
        ];

        return view('main.profile.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function message() {
        $data = Input::all();

        $from_name = $data['fullname'];
        $email = $data['email'];
        $subject = $data['subject'];
        $message = $data['message'];
        $to_id = $data['to_id'];
        $from_id = $data['from_id'];
        $profile_code = $data['profile_code'];
        $profile_name = $data['profile_name'];

        $insert = [
            'message_type' => '1',
            'from_id' => $from_id,
            'to_id' => $to_id,
            'from_name' => $from_name,
            'subjects' => $subject,
            'email_address' => $email,
            'message' => $message
        ];

        if(!auth()->user()) {

            $insert['from_id'] = '';

        }

        if($from_name == '' || $email == '') {
            return redirect('/profile/' . $profile_code . "/" . str_slug($profile_name))
            ->with(['message.danger' => 'Fill up required fields']);
        }
        else {
            return redirect('/profile/' . $profile_code . "/" . str_slug($profile_name))
            ->with(['message.success' => 'Message Sent!']);
        }


        Message::create($insert);

        // return redirect('/auth/login');
    }
}
