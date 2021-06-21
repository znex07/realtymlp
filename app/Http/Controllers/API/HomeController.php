<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Jobs\Searching\GetFilteredPropertyType;
use App\Jobs\Searching\GetFilteredCities;

class HomeController extends Controller
{
    public function getPropertyTypesFiltered(Request $request) {
        $data = $request->input();
        $result = $this->dispatch(new GetFilteredPropertyType($data));
        return $result;
    }

    public function getFilteredCities(Request $request) {
        $data = $request->input();
        $result = $this->dispatch(new GetFilteredCities($data));
        return $result;
    }
}
