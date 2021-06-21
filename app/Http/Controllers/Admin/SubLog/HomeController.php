<?php

namespace App\Http\Controllers\Admin\SubLog;

use App\Subscribe_Log;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DateTime;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        $subs_log = Subscribe_Log::all();
        $data = [
          'sub_log' =>$subs_log
        ];

        return view('main.admin.sub-log.index')->with($data);
    }

}
