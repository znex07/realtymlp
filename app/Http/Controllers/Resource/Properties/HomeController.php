<?php

namespace App\Http\Controllers\Resource\Properties;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Jobs\Resource\GetTransaction;
use App\Jobs\Resource\GetProvince;
use App\Jobs\Resource\Property\SearchPropertyList;
use App\Property;
class HomeController extends Controller
{
    public function getIndex()
    {

         $transactions = $this->dispatch(new GetTransaction());
         $province = $this->dispatch(new GetProvince());

         $data = [
         ];
//        dd($data);
        return view('main.dashboard.properties.index');
    }

    public function getSearch(Request $request)
    {

    }

}
