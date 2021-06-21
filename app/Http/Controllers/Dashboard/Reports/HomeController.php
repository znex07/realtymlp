<?php

namespace App\Http\Controllers\Dashboard\Reports;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        $user = auth()->user();
        $data = [
            'newMessage' => sizeof($user->newMessage)
        ];
        return view('main.dashboard.reports.index')->with($data);
    }
}
