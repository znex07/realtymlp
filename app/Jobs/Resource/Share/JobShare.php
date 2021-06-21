<?php

namespace App\Jobs\Resource\Share;

use App\Property;
use App\Property_User;
use App\User;
use Mail;
use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use SendGrid;
use App\Property_Log;

class JobShare extends Job implements SelfHandling
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
    public function handle(Property $property)
    {

        $data = $this->data;
        $user = auth()->user();
        $property = $user->properties()->findOrFail($data['property_id']);
//        dd($data);
        if ($data['share_type'] === 'affiliate') {
            $sendgrid = new SendGrid('realtymlp', 'r34ltymlp', ["turn_off_ssl_verification" => true]);
            $email = new SendGrid\Email();
            $email->setFrom('noreply@realtymlp.com')
                ->setFromName('RealtyMLP')
                ->setSubject('RealtyMLP: Property Shared!')
                ->addTo($user->confirmedAffiliates()->find($data['id'])->email)
                ->setHtml(
                    view('main.mails.share_property')
                        ->with([
                            'url' => 'http://realtymlp.com/blowup/' .$data['property_id'] .'?view_from=3',
                            'property' => $property,
                        ])
                );
            if ($sendgrid->send($email)) {
                $property->shares()->attach([
                    $data['id'] => ['sharables' => $data['sharables'],'user_fullname'=>$user->full_name]
                ]);
            }

            $ipAddress = $_SERVER['REMOTE_ADDR'];
            if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER)) {
                $ipAddress = array_pop(explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']));
            }

            $affiliate = $user->confirmedAffiliates()->find($data['id']);


            $create = [
                'property_code' => $property->property_code,
                'action' => 'SHARE LISTING',
                'user_code' => $affiliate->user_code,
                'inquirer_name' => $affiliate->fullname,
                'ip_address' => $ipAddress
            ];


            Property_Log::create($create);
//            Property_User::create($create);

        } elseif ($data['share_type'] === 'group') {
            $property->groups()->attach([
                $data['id'] => ['sharables' => $data['sharables']]
            ]);
        }
    }
}
