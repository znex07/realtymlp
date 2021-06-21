<?php

namespace App\Http\Controllers\Resources;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Jobs\Resource\GetCity;
class ResourcesController extends Controller
{
    public function showData(Input $input) 
    {
        $req = $input->get('reqfor');
        if ($req === 'city') {
            $cities = $this->dispatch(new GetCity($input->get('id')));
            return $cities;
        }
    }
}