<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
class AdminLoginController extends Controller
{
    public function postIndex(){
        $login = $this->dispatch(new AdminLogin($data));
        
    }
}
