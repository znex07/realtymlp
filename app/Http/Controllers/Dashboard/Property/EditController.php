<?php

namespace App\Http\Controllers\Dashboard\Property;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Property;
use App\Transaction;
use App\Department;
use App\Location;
use App\Category;
use App\Jobs\Resource\Image\RemoveJob;
class EditController extends Controller
{
    public function getIndex($slug,$id)
    {
        $property = Property::with(['files'])->findOrFail($id);
        $transaction = Transaction::select('id','title')->get();
        $department = Department::where('parent_id', '=', 0)
                    ->select('id','parent_id','department_name')
                    ->get();
        $locProvince = Location::where('type', '=', 1)
                    ->select('id','name')
                    ->orderByRaw("case when name = 'Metro Manila' then id else name end asc")
                    ->get();
        $data = [
            'type' => 'edit',
           'intab'=>'',
            'property' => $property,
            'transaction' => $transaction,
            'department' => $department,
            'locProvince' => $locProvince,
            'conditions'    => Category::conditions()->get(),
            'availabilities'  => $this->getAvailabilities(),
            'ownerships'    => Category::ownerships()->get(),
            'view_code' => VIEW_CODE_LISTING_WIZARD,
            'view_from' => BLOWUP_FROM_DASHBOARD,
        ];

        // dd($property->map_options);


        if ($property) {
            if(str_slug($property->property_title) == $slug)
                return view('main.dashboard.property.wizard')->with($data);
        }        

    }

    public function getAvailabilities() {
        $availabilities = Category::availabilities()->get();
        $availabilities->get(0)->is_hidden = 1;
        $availabilities->get(0)->hidden_id = 'av2';
        $availabilities->get(1)->is_hidden = 1;
        $availabilities->get(1)->hidden_id = 'av1';
        // $availabilities->get(2)->is_hidden = 0;
        // $availabilities->get(2)->hidden_id = 'av0';
        // $availabilities->get(3)->is_hidden = 0;
        // $availabilities->get(3)->hidden_id = 'av0';
        return $availabilities;
    }

    public function removeFile(Request $request)
    {
        $data = $request->all();
        $file = $this->dispatch(new RemoveJob($data));
        return response()->json(true);
    }
}
