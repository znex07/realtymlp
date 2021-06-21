<?php

namespace App\Http\Controllers\Dashboard\Blowup;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Property;
use App\Message;
use App\Subscribe_Log;
use Illuminate\Support\Facades\Input;
use Request;
use App\Property_Log;

class HomeController extends Controller
{

    public function __construct() 
    {
        $this->middleware('blowup');
    }

    public function getIndex($id)
    {
        $user = auth()->user();
        $property = Property::with(['files', 'shares','user'])->get()->find($id);
        $reload = Property::where('user_id', $user->id)->where('visibility', 0);
        $total_listings = Subscribe_Log::where('user_id', '=', $user->id)->orderBy('created_at', 'desc')->limit(1)->pluck('listings');
        $available_listings = $user->getNumListings($user->id, 'available');
        $reload->update(['visibility' => 1]);
//        dd($available_listings - $total_listings);
        if ($user->user_subscription == 1) {
            $total_listings = 10;
            if ($available_listings > $total_listings) {
//                dd($total_listings - $available_listings);
                $disabled_listings = Property::where('user_id', $user->id)->orderBy('created_at', 'asc')->take($available_listings - $total_listings);
                $disabled_listings->timestamps = false;
                $disabled_listings->update(['visibility' => 0]);
            }
        }

        $data = [
          'property' => $property,
          'blowup_mode' => BLOWUP_INDEX,
        ];    
        return view('main.dashboard.blowup.index')->with($data);


    }

    public function message() {
        $data = Input::all();

        $property_id = $data['property_id'];
        $from_id = $data['from_id'];
        $to_id = $data['to_id'];
        $fullname = $data['fullname'];
        $property_code = $data['property_code'];
        $email_address = $data['email_address'];
        $message = $data['message'];
        $create = [
            'message_type' => '1',
            'from_id' => $from_id,
            'to_id' => $to_id,
            'from_name' => $fullname,
            'property_id' => $property_id,
            'email_address' => $email_address,
            'message' => $message
        ];

        if($fullname == '' || $email_address == '') {
            return redirect('/dashboard/blowup/' . $property_id)
            ->with(['message.danger' => 'Fill up required fields']);
        }
        else {
            Message::create($create);
            return redirect('/dashboard/blowup/' . $property_id)
            ->with(['message.success' => 'Message Sent!']);
        }
    }

    public function savelog() {
        $data = Input::all();

        $ipAddress = '';

        $ipAddress = $_SERVER['REMOTE_ADDR'];
        if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER)) {
            $ipAddress = array_pop(explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']));
        }

        $action = $data['action'];
        $property_code = $data['property_code'];


        $insert = [
            'property_code' => $property_code,
            'action' => $action,
            'ip_address' => $ipAddress
        ];

        Property_Log::create($insert);
    }
}
