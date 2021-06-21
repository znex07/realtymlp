<?php

namespace App\Http\Controllers\Dashboard\Account\Payment;

use App\Jobs\Searching\GetSubscription;
use App\Property_User;
use App\Subscribe_Log;
use App\Subscription_Log;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Subscription;
use App\Prices;
use Omnipay\Omnipay;




class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function getIndex($subsc_type)
    {
        $user = auth()->user();
        $subscription_name = Subscription::select('name')->where('id', '=', $user->user_subscription)->first();
        $prices = Prices::all();
        $subc_price = Subscription::where('name','=',$subsc_type)->pluck('price');
        $subc_life = Subscription::where('name','=',$subsc_type)->pluck('lifespan');
        $subs_created = Subscribe_Log::all();
        $expire_date= Carbon::now()->addDays(180);
        $subscription = Subscription::where('name','=',$subsc_type)->get();

        $data  = [
             'subs_desc' => $subc_price * $subc_life,
            'prices' => $prices,
            'subs_name' => $subscription_name,
            'subs_type' => $subsc_type,
            'expire_at' =>$expire_date,
            'subscription' => $subscription
        ];
//dd($subscription);

        return view('main.dashboard.account.subscribe')->with($data);
    }


    public function store($subsc_type)
    {
        $user = auth()->user();
        $subscription_name = Subscription::select('name')->where('id', '=', $user->user_subscription)->first();
        $prices = Prices::all();
        $subc_price = Subscription::where('name','=',$subsc_type)->pluck('price');
        $subc_life = Subscription::where('name','=',$subsc_type)->pluck('lifespan');
        $expire_date= Carbon::now()->addDays(181);

        $data  = [
            'subs_desc' => $subc_price * $subc_life,
          'prices' => $prices,
          'subs_type' => $subsc_type,
            'expire_at' =>$expire_date
        ];

        return view('main.dashboard.account.payment.index')->with($data);

    }

    public function postPayment()
    {

        $input = Input::all();
        $price = 0;
        if($input['item_name']=='Premium')
        {
            $price = 1500.00;
        }
        if($input['item_name']=='Premium+')
        {
            $price = 3000.00;
        }

        $params = array(


            'cancelUrl' => 'http://realtymlp.com/dashboard/account/upgrade',
            'returnUrl' => 'http://realtymlp.com/dashboard/account/payment/payment_success', // in your case             //  you have registered in the routes 'payment_success'
            'amount' => $price,
            'currency' => 'PHP',
            'subs_type' => $input['item_name'],
        );

        session()->put('params', $params); // h5ere you save the params to the session so you can use them later.
        session()->save();

        $gateway = Omnipay::create('PayPal_Express');

       $gateway->setUsername('RealtyMLP.finance_api1.gmail.com'); // here you should place the email of the business sandbox account
       $gateway->setPassword('KLHMUGV8CZSHLCTQ'); // here will be the password for the account
       $gateway->setSignature('AqcL8eWGxqbrl86GvejbEy3uisYGAGvosd1llI1KWSop3mLAVNX4x9Hq'); // and the signature for the account
       $gateway->setTestMode(false); // set it to true when you develop and when you go to production to false
//         $gateway->setUsername('tertorbela_api1.gmail.com'); // here you should place the email of the business sandbox account
//         $gateway->setPassword('XYEKC42S5WDVFXC2'); // here will be the password for the account
//         $gateway->setSignature('AFcWxV21C7fd0v3bYYYRCpSSRl31AFfUGQjhJIwSVRSP4a4ITTVc1cLe'); // and the signature for the account
//         $gateway->setTestMode(true); // set it to true when you develop and when you go to production to false
        $response = $gateway->purchase($params)->send(); // here you send details to PayPal

        if ($response->isRedirect()) {
             $response->redirect();
        }
        else {
            echo $response->getMessage();
        }
    }
    public function getSuccessPayment (Request $request)
    {
        $user = auth()->user();
        $remain = Subscribe_Log::select('created_at')->get();
        $gateway = Omnipay::create('PayPal_Express');

       $gateway->setUsername('RealtyMLP.finance_api1.gmail.com'); // here you should place the email of the business sandbox account
       $gateway->setPassword('KLHMUGV8CZSHLCTQ'); // here will be the password for the account
       $gateway->setSignature('AqcL8eWGxqbrl86GvejbEy3uisYGAGvosd1llI1KWSop3mLAVNX4x9Hq'); // and the signature for the account
       $gateway->setTestMode(false);
//         $gateway->setUsername('tertorbela_api1.gmail.com'); // here you should place the email of the business sandbox account
//         $gateway->setPassword('XYEKC42S5WDVFXC2'); // here will be the password for the account
//         $gateway->setSignature('AFcWxV21C7fd0v3bYYYRCpSSRl31AFfUGQjhJIwSVRSP4a4ITTVc1cLe'); // and the signature for the account
//         $gateway->setTestMode(true); // set it to true when you develop and when you go to production to false
        $params = session()->get('params');
        $response = $gateway->completePurchase($params)->send();
        $paypalResponse = $response->getData(); // this is the raw response object
        $subs_type = $request->getSession()->get('params');
        $total_payment = $request->getSession()->get('params');
        $expire_date= Carbon::now()->addDays(181);
        $remains = Subscribe_Log::all();
        $listing_user = Subscribe_Log::where('user_id','=',$user->id)->orderBy('created_at' , 'desc')->limit(1)->pluck('listings');


        if(isset($paypalResponse['PAYMENTINFO_0_ACK']) && $paypalResponse['PAYMENTINFO_0_ACK'] === 'Success') {

            if($subs_type['subs_type'] == "Premium")
            {
                $user->user_subscription =2;
                $user->save();
                $list = 100;


            }
            if($subs_type['subs_type'] == "Premium+")
            {
                $user->user_subscription =3;
                $user->save();
                $list = 500;
            }


            $create = [
                'user_id' => $user->id,
                'subscription_name' =>$subs_type['subs_type'],
                'subscription_id' => $user->user_subscription,
                'total_payment' => $total_payment['amount'],
                  'expires_at' => $expire_date,
                'listings' => $list + $listing_user,
                'requirements' => $list + $listing_user,
                'balance' => $list,
                'group_subs' => $list + $listing_user
            ];
            Subscribe_Log::create($create);

            return redirect('/dashboard/account/payment/thank');
//            dd($listing_user);            
        }
        else {
            return redirect('/dashboard/dashboard/account/upgrade');
        }
    }
}
