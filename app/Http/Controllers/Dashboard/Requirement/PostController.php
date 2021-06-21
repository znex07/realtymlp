<?php

namespace App\Http\Controllers\Dashboard\Requirement;

use App\Category;
use App\Department;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Jobs\PostRequirement;
use App\Location;
use App\Property;
use App\Property_Log;
use App\Requirements;
use App\Transaction;
use App\UserSubscribe;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function getIndex()
    {
        $user = auth()->user();
        $transactions = Transaction::select('id','title')->get();
        $property = new Property;
        $p_classifications = Department::where('parent_id', '=', 0)->select('id','parent_id','department_name')->get();
        $locProvince = Location::where('type', '=', 1)
            ->select('id','name')
            ->orderByRaw("case when name = 'Metro Manila' then id else name end asc")
            ->get();
        $data = [
            'listing_type' => $transactions,
            'conditions'    => Category::conditions()->get(),
            'property' => $property,
            'availabilities' => $this->getAvailabilities(),
            'property_classifications' => $p_classifications,
            'locProvince' => $locProvince,
            'newMessage' => sizeof($user->newMessage)
        ];
        return view('main.dashboard.requirement.post')->with($data);
    }

    public function getAvailabilities() {
        $availabilities = Category::availabilities()->get();
        $availabilities->get(0)->is_hidden = 1;
        $availabilities->get(0)->hidden_id = 'av2';
        $availabilities->get(1)->is_hidden = 1;
        $availabilities->get(1)->hidden_id = 'av1';

        return $availabilities;
    }
    public function store(Request $request){
        $data = $request->all();
        $user = auth()->user();
        $data['user_id'] = $user->id;
        $this->dispatch(new PostRequirement($data));
        $avail_requirements = UserSubscribe::where('id','=',$user->id)->first();
        $avail_requirements->requirements = $avail_requirements->requirements + 1;
        $avail_requirements->save();
        return redirect('/dashboard/requirement/');
    }
    public function update(Request $request){
        $data = $request->all();
        $ipAddress = $_SERVER['REMOTE_ADDR'];
        if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER)) {
            $ipAddress = array_pop(explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']));
        }
        $insert = [
            'action' => 'EDIT REQUIREMENT',
            'ip_address' => $ipAddress
        ];

        Property_Log::create($insert);
        $updated_data = [
            'listing_type' => $data['listing_type'],
            'condition_type' => $data['condition_type'],
//            'availability_type' => $data['availability_type'],
            'property_classification' => $data['property_classification'],
            'property_type' => $data['property_type'],
            'location' => $data['location'],
            // 'brgy' => $data['brgy'],
            // 'street_address' => $data['street_address'],
            'budget_min' => $data['budget_min'],
            'budget_max' => $data['budget_max'],
            'rooms' => $data['rooms'],
            'bathrooms' => $data['bathrooms'],
            'parking' => $data['parking'],
            'balcony' => $data['balcony'],
            'created_at' => \Carbon\Carbon::now(),
//            'notes' => $data['notes']

        ];
        $data['bed_rooms'] = $data['rooms'];
        $user = auth()->user();
        $id = $data['_id'];
        Requirements::where('id',$id)->update($updated_data);
        return redirect('/dashboard/requirement/');
    }
}
