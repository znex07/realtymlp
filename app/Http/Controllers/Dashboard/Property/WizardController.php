<?php

namespace App\Http\Controllers\Dashboard\Property;

use App\Building_Tables;
use App\Department;
use App\Http\Controllers\Controller;
//use App\Http\Requests\Request;
use Illuminate\Http\Request;
use App\Jobs\Resource\Share\RemoveShareJob;
use App\Location;
use App\Property_User;
use App\Transaction;
use App\Property;
use Illuminate\Support\Facades\Input;
use App\Category;
use App\Jobs\Resource\GetCity;
class WizardController extends Controller
{
    public function getIndex()
    {
        $user = auth()->user();
//        $loc = Location::all();
//            dd($loc->pluck('name'));
        $transaction = Transaction::select('id','title')->get();
        $department = Department::where('parent_id', '=', 0)->select('id','parent_id','department_name')->get();
        $locProvince = Location::where('type', '=', 1)
                    ->select('id','name')
                    ->orderByRaw("case when name = 'Metro Manila' then id else name end asc")
                    ->get();
        $property = new Property;
        $data = [
            'intab' => '',
            'type'          => 'create',
            'property'      => $property,
            'transaction'   => $transaction,
            'department'    => $department,
            'locProvince'   => $locProvince,
            'conditions'    => Category::conditions()->get(),
            'availabilities'  => $this->getAvailabilities(),
            'ownerships'    => Category::ownerships()->get(),
            'view_code' => VIEW_CODE_LISTING_WIZARD,
            'view_from' => BLOWUP_FROM_DASHBOARD,
            'user' => $user,
        ];
//        dd($property);
//         dd($data);
        return view('main.dashboard.property.wizard')->with($data);
    }
    public function BldgData(Input $input)
    {
        $loc = Building_Tables::where('bldg_name','like',$input->get('bldg_name').'%')->where('city_id',$input->get('city'))->get();
        return $loc->pluck('bldg_name');
    }
    public function getData(Input $input)
    {
        $loc = Building_Tables::where('bldg_name','like',$input->get('bldg_name').'%')->get();
        return $loc;
    }
    public function getAvailabilities() {
        $availabilities = Category::availabilities()->get();
        $availabilities->get(0)->is_hidden = 1;
        $availabilities->get(0)->hidden_id = 'av2';
        $availabilities->get(1)->is_hidden = 1;
        $availabilities->get(1)->hidden_id = 'av1';
        $availabilities->get(4)->is_hidden = 1;
        $availabilities->get(4)->hidden_id = 'av2';
        $availabilities->get(3)->is_hidden = 1;
        $availabilities->get(3)->hidden_id = 'av1';
        return $availabilities;
    }

    public function showData(Input $input){
        $reqtype = $input->get('reqtype');

        if($reqtype === "property_classification"){
            $value = $input->get('value');
            $subdept = Department::where('parent_id', '=',$value)->select('id','parent_id','department_name')->get();
            return $subdept;
        }

        if($reqtype === "province"){
            $value = $input->get('value');
            $city = $this->dispatch(new GetCity($value));
            return $city;
        }
        dd($input);
    }

}
