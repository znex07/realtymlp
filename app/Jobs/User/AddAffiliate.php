<?php

namespace App\Jobs\User;

use App\Jobs\Job;
use App\User;
use Illuminate\Contracts\Bus\SelfHandling;
use SendGrid;
use App\Affiliate_Log;
class AddAffiliate extends Job implements SelfHandling
{
    private $request;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $user = auth()->user();
        $aff = User::findOrFail($this->request->input('affiliate_id'));
        // dd($aff);
        $sendgrid = new SendGrid('realtymlp', 'r34ltymlp', ["turn_off_ssl_verification" => true]);
        $with = [
          'sender' => $user->fullname,
          'to' => $aff->fullname
        ];

        $create = [
          'user_id' => auth()->user()->id,  
          'code' => $aff->user_code,
          'affiliate_name' => $aff->fullname,
          'action' => 'YOU ADDED AN AFFILIATE'
        ];

        Affiliate_Log::create($create);

        $email = new SendGrid\Email();
        $email
            ->setFrom('noreply@realtymlp.com')
            ->setFromName('RealtyMLP')
            ->setSubject('RealtyMLP: Affiliate Request!')
            ->setHtml(view('main.mails.affiliate_request')->with($with));

        $email->addTo($aff->email);
        $response = $sendgrid->send($email);
        if ($response) {
            $user->affiliates()->attach($aff->id, [
                'is_confirmed' => false,
                'is_confirmable' => false,
            ]);

            $aff->affiliates()->attach($user->id, [
                'is_confirmed' => false,
                'is_confirmable' => true,
            ]);
        }
        return $user;
    }
}
