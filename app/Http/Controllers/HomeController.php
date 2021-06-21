<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Jobs\Resource\GetTransaction;

class HomeController extends Controller
{
    public function getIndex()
    {
      $transactions = $this->dispatch(new GetTransaction());

      $data = [
        'transactions' => $transactions,
      ];
//        dd($data);
      return view('main.landing.index')->with($data);
    }


}
