<?php

namespace App\Http\Controllers\Dashboard\Requirement;
use App\Category;
use App\Department;
use App\Http\Controllers\Controller;
use App\Location;
use App\Property;
use App\Requirements;
use App\Transaction;
use App\UserSubscribe;
use Illuminate\Http\Request;

use App\Http\Requests;

class EditController extends Controller
{
    public function getIndex($req_id)
    {
        $user = auth()->user();
        $transactions = Transaction::select('id','title')->get();
        $property = new Property();
        $p_classifications = Department::where('parent_id', '=', 0)->select('id','parent_id','department_name')->get();
        $locProvince = Location::where('type', '=', 1)
            ->select('id','name')
            ->orderByRaw("case when name = 'Metro Manila' then id else name end asc")
            ->get();
        $requirements = Requirements::where('id','=',$req_id)->first();
        $location = json_decode($requirements->location,true);
        $loc = $requirements->location;
//        $loc = $requirements->location;
//        dd($location['location1']);
        $data = [
            'requirements' => $requirements,
            'listing_type' => $transactions,
            'conditions'    => Category::conditions()->get(),
            'property' => $property,
            'availabilities' => $this->getAvailabilities(),
            'property_classifications' => $p_classifications,
            'locProvince' => $locProvince,
            'newMessage' => sizeof($user->newMessage),
            'location' => explode(',',$location['location1']),
            'loc' => $loc
        ];
        return view('main.dashboard.requirement.edit')->with($data);
    }

    public function getAvailabilities() {
        $availabilities = Category::availabilities()->get();
        $availabilities->get(0)->is_hidden = 1;
        $availabilities->get(0)->hidden_id = 'av2';
        $availabilities->get(1)->is_hidden = 1;
        $availabilities->get(1)->hidden_id = 'av1';

        return $availabilities;
    }
    public function delete($req_id){
        $user = auth()->user();
        $requirements = Requirements::where('id','=',$req_id)->first();
        $requirements->delete();
        $avail_requirements = UserSubscribe::where('id','=',$user->id)->first();
        $avail_requirements->requirements = $avail_requirements->requirements - 1;
        $avail_requirements->save();
        return redirect('/dashboard/requirement/');
    }
}
