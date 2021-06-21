<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Mail;
use App\User;
use App\Emails;
use SendGrid;

class ForgotPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        //
        return view('main.landing.forgot_password');
    }

    public function sendEmail() {
        $data = Input::all();
        $email = $data['email_address'];
        $user = User::where('email', '=',$email)->get();
        $data = [
            'user' => $user->get(0)
        ];

        $token = uniqid();


        $sendgrid_username = 'realtymlp';
        $sendgrid_password = 'r34ltymlp';
        $to                = Input::get('email_address');


        $sendgrid = new SendGrid($sendgrid_username, $sendgrid_password, array("turn_off_ssl_verification" => true));
        
        $email_data = [
                    'email'=>$email, 
                    'user'=>$data['user'], 
                    'token'=>$token
        ];

        $email   = new SendGrid\Email();
        $email
            ->addTo($to)
            ->setFrom('noreply@realtymlp.com')
            ->setSubject('RealtyMLP: Forgot Password')
            ->setText('Hello World!')
            ->setHtml(view('main.mails.forgot_password')->with($email_data));
            $response = $sendgrid->send($email);
           
//
//         Mail::send('main.mails.forgot_password', array('email'=>$email, 'user'=>$data['user'], 'token'=>$token), function($message)
//         {
//            $message->to(Input::get('email_address'))->subject('RealtyMLP: Forgot Password');
//         });

        $update_email = [
            'status' => '0'
        ];

        Emails::where('user_code' , '=' , $data['user']['user_code'])->where('type', '=', '2')->update($update_email);

        $insert = [
            'type' => '2',
            'link' => 'http://realtymlp.com/auth/forgot_password/change_password/' . str_slug($token) . '/' . $data['user']['id'],
            'token' => $token,
            'user_code' => $data['user']['user_code'],
            'status' => '1'
        ];

        Emails::create($insert);
        
        return redirect()->to('/auth/login')
             ->with(['email.success' => 'Please check your email for the instructions of changing your password']);

        

    }
    

}
