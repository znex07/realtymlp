<?php

namespace App\Http\Controllers\Feature;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use App\Message;
class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        return view('main.feature.contact');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function contact() {

        $data = Input::all();

        $email = $data['email'];
        $subject = $data['subject'];
        $message = $data['message'];


        $insert = [
            'email_address' => $email,
            'subject' => $subject,
            'message' => $message
        ];

        Message::create($insert);
         return redirect('feature/contact')
            ->with(['send' => 'Messsage Sent.']);
    }
} 
