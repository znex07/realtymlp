<?php

namespace App\Jobs\Auth;

use App\Jobs\Job;
use App\User;
use App\UserSubscribe;
use Hash;
use Illuminate\Contracts\Bus\SelfHandling;
use Mail; 
use Input;
use App\Emails;
use SendGrid;
// use App\SendGrid;
class Register extends Job implements SelfHandling
{

    private $data;

    /**
 * Create a new job instance.
     *
     * @return void
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(User $user, UserSubscribe $user_subscribe)
    {
        $data = $this->data;
        // $name = explode(' ', $data['full_name']);
        $fullname = $data['first_name'] . " " . $data['last_name'];
        $user_code = 'RM' . time();
        $subscription_type = $data['subscription_type'];
        $subscription_name = '';
        $subscription_affiliate = 0;
        $subscription_requirements = 0;
        $subscription_listings = 0;
        $subscription_shared_by_me = 0;


        $user->create([
            'user_code' => $user_code,
            'user_fname' => $data['first_name'],
            'user_lname' => $data['last_name'],
            'user_phone' => $data['contact_no'],
            'user_subscription' => $subscription_type,
            'user_type' => '1',
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'activation_code' => '0',
            'status' => '1'
        ]);
        $user_subscribe->create([
                'user_code' => $user_code,
                'listings' => $subscription_listings,
                'requirements' => $subscription_requirements,
                'subscription_affiliate' => $subscription_requirements,
             ]);
        $token = uniqid();

         $insert = [
            'type' => '1',
            'link' => 'http://realtymlp.com/auth/activate/' . str_slug($token) . '/' .  $user_code,
            'token' => $token,
            'user_code' => $user_code,
            'status' => '0'
        ];

        Emails::create($insert);

        $sendgrid_username = 'realtymlp';
        $sendgrid_password = 'r34ltymlp';
        $to                = Input::get('email');


        $sendgrid = new SendGrid($sendgrid_username, $sendgrid_password, array("turn_off_ssl_verification" => true));
        $email_data = [
            'fullname' => $fullname,
            'code' => $user_code,
            'token' => $token,
            'option' => $subscription_type
        ];
        
        $email   = new SendGrid\Email();
        $email
            ->addTo($to)
            ->setFrom('noreply@realtymlp.com')
            ->setFromName('RealtyMLP')
            ->setSubject('Welcome to RealtyMLP')
            ->setText('Hello World!')
            ->setHtml(view('main.mails.confirmation')->with($email_data));
        $response = $sendgrid->send($email);

        // Mail::send('main.mails.confirmation', array('fullname'=>$fullname, 'code' => $user_code, 'token' => $token), function($message)
        // {
        //    $message->to(Input::get('email'))->subject('Welcome to the RealtyMLP!');
        // });


        return $user;

    }
}
