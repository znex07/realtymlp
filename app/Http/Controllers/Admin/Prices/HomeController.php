<?php

namespace App\Http\Controllers\Admin\Prices;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use App\Subscription;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        //

        $subscriptions = Subscription::all();
        $data = [
            'subscriptions' => $subscriptions
        ];




        return view('main.admin.prices.index')->with($data);
    }


    public function delete() {

        $data = Input::all();
        $id = $data['id'];
        $subscription =  Subscription::find($id);
        $subscription->delete();
//        return redirect()->back();
    }


}
