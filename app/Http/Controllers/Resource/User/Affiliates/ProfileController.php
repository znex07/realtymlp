<?php
namespace App\Http\Controllers\Resource\User\Affiliates;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\AddAffiliateRequest;
use App\Http\Requests\User\ConfirmAffiliateRequest;
use App\Jobs\User\AddAffiliate;
use App\Jobs\User\ConfirmAffiliate;
use App\Jobs\User\RejectAffiliate;
use Illuminate\Http\Request;
use Mail;
use App\User;
use SendGrid;

class ProfileController extends Controller
{
    public function postAddAffiliate(AddAffiliateRequest $request)
    {
        $dispatched = $this->dispatch(new AddAffiliate($request));
        return [
            'data' => $dispatched,
        ];
    }

    public function postConfirm(ConfirmAffiliateRequest $request)
    {
        $data = $request->all();
        $sendgrid = new SendGrid('realtymlp', 'r34ltymlp', ["turn_off_ssl_verification" => true]);
        $email = new SendGrid\Email();
        $type = $data['btn_type'];
        if ($type == 'accept') {

            $dispatched = $this->dispatch(new ConfirmAffiliate($request));
        }
        elseif ($type == 'reject') {

            $user = User::findOrFail($data['affiliate_id']);
            $email_add = auth()->user()->email;
            // $email
            //     ->addTo($user->email)
            //     ->setFrom('noreply@realtymlp.com')
            //     ->setSubject('RealtyMLP: Affiliate Request!')
            //     ->setText('')
            //     ->setHtml(view('main.mails.share_property')->with(['email' => $email_add]));

            // $response = $sendgrid->send($email);
            // if ($response)
            $dispatched = $this->dispatch(new RejectAffiliate($request));
        }
        return redirect()->back();
    }

    public function sendMail(Request $request)
    {
        $data = [
            'user' => auth()->user(),
        ];
        $sendgrid = new SendGrid('realtymlp', 'r34ltymlp', ["turn_off_ssl_verification" => true]);
        $email = new SendGrid\Email();
        $email->addTo($request->input('email'))
            ->setFrom('noreply@realtymlp.com')
            ->setFromName('RealtyMLP')
            ->setSubject('RealtyMLP Invitation')
            ->setHtml(view('main.mails.member_request')->with($data));
        $send = $sendgrid->send($email);
    }

}
