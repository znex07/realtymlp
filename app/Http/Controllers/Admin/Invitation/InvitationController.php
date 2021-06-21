<?php

namespace App\Http\Controllers\Admin\Invitation;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use SendGrid;

class InvitationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        //
        return view('main.admin.invitation.index');
    }

    public function sendEmail() {
        $data = Input::all();
        $email = $data['email'];

        

        $sendgrid_username = 'realtymlp';
        $sendgrid_password = 'r34ltymlp';
        $to                = $email;


        $sendgrid = new SendGrid($sendgrid_username, $sendgrid_password, array("turn_off_ssl_verification" => true));
        

        $email   = new SendGrid\Email();
        $email
            ->addTo($to)
            ->setFrom('noreply@realtymlp.com')
            ->setSubject('RealtyMLP: Forgot Password')
            ->setText('Hello World!')
            ->setHtml(view('main.mails.invitations'));
            $response = $sendgrid->send($email);        
    }
}
