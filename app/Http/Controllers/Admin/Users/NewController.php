<?php

namespace App\Http\Controllers\Admin\Users;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Categories;
use Input;
use App\User;
use SendGrid;
use Hash;

class NewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        //
        $subscription = Categories::where('code','=','2')->get();

        $data = [
            'subscription' => $subscription
        ];


        return view('main.admin.users.new')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function register() {
        $data = Input::all();
        $password = uniqid();
        $token = uniqid();
        $user_email = $data['email'];
        $data['password'] = Hash::make($password);
        $data['user_code'] = uniqid();
        $fullname = $data['user_fname'] . " " . $data['user_lname'];

        if(User::where('email', '=', $user_email)->count() == 0) {

            User::create($data);


            $sendgrid_username = 'realtymlp';
            $sendgrid_password = 'r34ltymlp';
            $to = $data['email'];


            $sendgrid = new SendGrid($sendgrid_username, $sendgrid_password, array("turn_off_ssl_verification" => true));
            $email_data = [
                'fullname' => $fullname,
                'token' => $token,
                'email' => $user_email,
                'password' => $password
            ];

            $email   = new SendGrid\Email();

            $email
                ->addTo($to)
                ->setFrom('noreply@realtymlp.com')
                ->setFromName('RealtyMLP')
                ->setSubject('Welcome to RealtyMLP')
                ->setText('Hello World!')
                ->setHtml(view('main.mails.activate')->with($email_data));
                $response = $sendgrid->send($email);

        }

    }
}
