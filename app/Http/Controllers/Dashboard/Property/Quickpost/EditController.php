<?php

namespace App\Http\Controllers\Dashboard\Property\Quickpost;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Property;
use Input;

use App\Category;
use App\Transaction;
use App\Department;
use App\Location;
class EditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex($slug,$id)
    {
        $condition = Category::conditions()->get();
        $department = Department::where('parent_id','=','0')->get();
        $availabilities = Category::availabilities()->get();
        $ownerships = Category::ownerships()->get();
        $transaction = Transaction::all();
        $province = Location::where('parent_id','=','0')->get();
//        $requirements =
        $property = Property::find($id);
        $data = [
            'property' => $property,
             'condition' => $condition,
            'availabilities' => $availabilities,
            'transaction' => $transaction,
            'department' => $department,
            'province' => $province,
            'ownerships' => $ownerships
        ];
        return view('main.dashboard.property.quickpost.edit')->with($data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */

    public function update() {
        $inp = Input::all();

//        dd($inp);
        Property::find($inp['id'])->update($inp);
        $with = [
            'quick.success' => 'Updated Quick post!',
            'post.type' => 'quick'
        ];

        return redirect('/dashboard')->with($with); 

    }
    
}
