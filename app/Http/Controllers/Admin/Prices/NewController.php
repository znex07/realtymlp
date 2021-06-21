<?php

namespace App\Http\Controllers\Admin\Prices;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use App\Subscription;


class NewController extends Controller

{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        //
      return view('main.admin.prices.new');
    }


    public function create() {
        $data = Input::all();




        Subscription::create($data);
        return redirect()->back();
    }


}
