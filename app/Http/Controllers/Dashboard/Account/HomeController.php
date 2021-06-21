<?php

namespace App\Http\Controllers\Dashboard\Account;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Categories;
use Hash;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\User\AccountRequest;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        //
        $id = auth()->user()->id;
        $user = User::find($id);
        $usertype = $this->getUserType();
        $data = [
            'user' => $user,
            'usertype' => $usertype
        ];
        // dd($data);
        return view('main.dashboard.account.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */ 

    public function getUserType() {

        return Categories::where('code','=','1')->get();
    }

    public function update(AccountRequest $request) {
        // dd($request->all());

        
        $data = Input::all();
        $lname = $data['user_lname'];
        $fname = $data['user_fname'];
        $mobile = $data['user_mobile'];
        $phone = $data['user_phone'];
        $address = $data['current_address'];
        $status = $data['optionsRadios'];

        $id = $data['id'];
        $button_status = $data['user_status'];

        $update = [
        'user_lname' => $lname,
        'user_fname' => $fname,
        'user_mobile' => $mobile,
        'user_phone' => $phone,
        'current_address' => $address,
        'headline' => $data['headline'],
        'describe' => $data['describe'],
        'status' => $status
        ];                

        
        User::where('id','=',$id)->update($update);

        if($button_status == '1') {
            return redirect('/dashboard')
            ->with(['update.success' => 'Profile updated Successfully!']);    
        }
        return redirect('/profile/' . Auth()->user()->user_code . '/' .  str_slug(Auth()->user()->full_name));
          
    }

    public function deactivate() {

        $id = auth()->user()->id;
        dd($id);

    }
}
