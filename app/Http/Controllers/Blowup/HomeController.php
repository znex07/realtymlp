<?php

namespace App\Http\Controllers\Blowup;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Message;
use App\Property;
use App\Subscribe_Log;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Property_Log;
use Gate;
use App\Jobs\BlowupRestrictionJob;

class HomeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['blowup','blowup-group'], ['only' => 'getIndex']);
    // }

    public function getIndex($id, Request $request)
    {
        // $property = Property::with(['files', 'shares','user']    )->findOrFail($id);
        $property = Property::findOrFail($id);


        $user = auth()->user();

        if (auth()->check()) {
            $confirm = $user->confirmedAffiliates()->find($property->user->id);
            if ($confirm) {
                $viewer = 'Affiliate: ';
            } else {
                $viewer = 'User: ';
            }
        } else {
            $viewer = 'Inquirer: ';
        }

//        dd($available_listings - $total_listings);
        if(auth()->check())
        {     $reload = Property::where('user_id', $user->id)->where('visibility', 0);
            $total_listings = Subscribe_Log::where('user_id', '=', $user->id)->orderBy('created_at', 'desc')->limit(1)->pluck('listings');
            $available_listings = $user->getNumListings($user->id, 'available');
            $reload->update(['visibility' => 1]);
            if ($user->user_subscription == 1) {
            $total_listings = 10;
            if ($available_listings > $total_listings) {
//                dd($total_listings - $available_listings);
                $disabled_listings = Property::where('user_id', $user->id)->orderBy('created_at', 'asc')->take($available_listings - $total_listings);
                $disabled_listings->timestamps = false;
                $disabled_listings->update(['visibility' => 0]);
            }
        }}

        $data = [
            'view_from' => $request->input('view_from'),
            'property' => $property,
            'blowup_mode' => BLOWUP_INDEX,
            'is_owner' => auth()->check() ? auth()->user()->id == $property->user->id : false,
            'is_affiliate' => isset($confirm) ? $confirm : '',
            'viewer' => $viewer,
        ];
        if ($request->input('view_from') == BLOWUP_FROM_GROUP)
            $data['group_id'] = $request->input('group_id');
        if ($request->input('view_from') == BLOWUP_FROM_AFFILIATE_OWN) {
            $data['affiliate_id'] = $request->input('affiliate_id');
        }
        $result = $this->dispatch(new BlowupRestrictionJob($data));
        $data['pivot'] = $result ? $result : null;
        $data['sharable'] = !is_null($data['pivot']) ? json_decode($data['pivot']->sharables) : null;
        $data['viewed_from_affiliate'] = isset($data['affiliate_id']) && $data['is_owner'];
        $data['viewed_from_group'] = isset($data['group_id']) && $data['is_owner'];
        $data['viewed_from_affiliate'] = isset($data['affiliate_id']) && $data['is_owner'];

//        dd($property);
        return view('main.dashboard.blowup.index')->with($data);

    }

    public function message()
    {
        $data = Input::all();

        $property_id = $data['property_id'];
        $from_id = $data['from_id'];
        $to_id = $data['to_id'];
        $fullname = $data['fullname'];
        $property_code = $data['property_code'];
        $email_address = $data['email_address'];
        $message = $data['message'];

        $inquirer_name = $data['inquirer'];
        $inquirer_type = $data['viewer'];


        $ipAddress = '';

        $ipAddress = $_SERVER['REMOTE_ADDR'];
        if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER)) {
            $ipAddress = array_pop(explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']));
        }

        $create = [
            'message_type' => '1',
            'from_id' => $from_id,
            'to_id' => $to_id,
            'from_name' => $fullname,
            'property_id' => $property_id,
            'email_address' => $email_address,
            'message' => $message
        ];

        if (!auth()->user()) {
            $create['from_id'] = '';
        }


        if ($fullname == '' || $email_address == '') {
            return redirect()
                ->back()
                ->with(['message.danger' => 'Fill up required fields']);
        } else {

            $insert = [
                'property_code' => $property_code,
                'action' => 'INQUIRY ON LISTING',
                'ip_address' => $ipAddress,
                'inquirer_type' => $inquirer_type,
                'user_code' => auth()->check() ? auth()->user()->user_code : '',
                'inquirer_name' => $inquirer_name
            ];
            Property_Log::create($insert);
            Message::create($create);

            return redirect()
                ->back()
                ->with(['message.success' => 'Message Sent!']);
        }
    }

    public function savelog()
    {
        $data = Input::all();

        $ipAddress = '';

        $ipAddress = $_SERVER['REMOTE_ADDR'];
        if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER)) {
            $ipAddress = array_pop(explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']));
        }

        $action = $data['action'];
        $property_code = $data['property_code'];
        $inquirer_name = $data['inquirer_name'];
        $inquirer_type = $data['inquirer_type'];

        $insert = [
            'property_code' => $property_code,
            'action' => $action,
            'ip_address' => $ipAddress,
            'inquirer_type' => $inquirer_type,
            'user_code' => auth()->check() ? auth()->user()->user_code : '',
            'inquirer_name' => $inquirer_name
        ];

        Property_Log::create($insert);


    }


}
