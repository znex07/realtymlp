<?php

namespace App\Http\Controllers\Admin\Prices;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Prices;
use App\Subscription;
use Input;
class EditController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex($slug,$id)
    {
        //
        $subscription = Subscription::find($id);
        $data = [
            'subscription' => $subscription
        ];
        // dd($data);

        return view('main.admin.prices.edit')->with($data);
    }

    public function update() {
        $data = Input::all();

        $id = $data['id'];

         $update = [
            'name' => $data['name'],
            'listings' => $data['listings'],
            'requirements' => $data['requirements'],
            'affiliates' => $data['affiliates'],
            'shared_to_me' => $data['shared_to_me'],
            'no_img' => $data['no_img'],
            'no_att' => $data['no_att'],
            'size_img_mb' => $data['size_img_mb'],
            'size_att_mb' => $data['size_att_mb'],
            'single_msg' => $data['single_msg'],
            'group_msg' => $data['group_msg'],
            'library' => $data['library'],
            'group' => $data['group'],
            'auto_matching' => $data['auto_matching'],
            'price' => $data['price'],
            'lifespan' => $data['lifespan']
        ];

        Subscription::where('id','=',$id)->update($update);
        return redirect()->back();
    }
}
