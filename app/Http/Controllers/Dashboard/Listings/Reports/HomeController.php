<?php

namespace App\Http\Controllers\Dashboard\Listings\Reports;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Property_Log;
use App\Property;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex($id)
    {
        $user = auth()->user();
        $logs = Property_Log::with(['property'])->where('property_code', '=', $id)->get();
        $data = [
            'logs' => $logs,
            'newMessage' => sizeof($user->newMessage)
        ];


        // dd($data['']);
        return view('main.dashboard.listings.reports.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    
}
