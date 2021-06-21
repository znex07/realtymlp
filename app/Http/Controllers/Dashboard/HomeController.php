<?php

namespace App\Http\Controllers\Dashboard;

use App\Group;
use App\Http\Controllers\Controller;
use App\Property;
use App\Property_Log;
use App\PropertyUser;
use App\Subscribe_Log;
use App\Transaction;
use App\Category;
use App\Location;
use App\Department;
use App\Http\Requests\Resource\SearchRequest;
// Jobs
use App\Jobs\Resource\Property\GetPropertiesJob;
use App\Jobs\Resource\Property\GetSharedProperties;
use App\Jobs\Searching\GetProvinces;
use App\Jobs\Searching\GetListingType;
use App\Jobs\Searching\GetConditionType;
use App\Jobs\Searching\GetAvailabilityType;
use App\Jobs\Searching\GetListingOwnership;
use App\Jobs\Searching\GetPropertyClassification;
use App\Jobs\Searching\GetRooms;
use App\Jobs\Searching\GetBathrooms;
use App\Jobs\Searching\GetParking;
use App\Jobs\Searching\GetBalcony;
use App\Jobs\Searching\GetFloorArea;
use App\Jobs\Searching\GetLotArea;
use App\Property_User;
use App\User;

use App\Jobs\Searching\GetProperties;

use Elasticsearch\Endpoints\Get;
use App\UserSubscribe;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{

    public function getIndex(Request $request)
    {
        $user = auth()->user();
        $listing_view = $request->has('listing_view') && $request->input('listing_view') ? $request->input('listing_view') : 0;
        $inputs['listing_view'] = $listing_view;
        $return = $this->getData($request->input());
        $data = [];
        $final = $data + $return;
        return view('main.dashboard.index')->with($final);
    }
    private function getData($request)
    {
        $data = [];
        $user = auth()->user();
        $total_listings = Subscribe_Log::where('user_id', '=', $user->id)->orderBy('created_at', 'desc')->limit(1)->pluck('listings');
        $available_listings = $user->getNumListings($user->id, 'available');
        $group_properties = $user->joinedgroups()->with(['members','properties'])->get();
        $shits = $group_properties;
        $more_shits = collect([]);
        $transaction = Transaction::select('id','title')->get();
        $department = Department::where('parent_id', '=', 0)->select('id','parent_id','department_name')->get();
        $locProvince = Location::where('type', '=', 1)
            ->select('id','name')
            ->orderByRaw("case when name = 'Metro Manila' then id else name end asc")
            ->get();


//        dd($sample+1);
        foreach($shits as $shit)
        {
            foreach($shit->properties as $shitproperty)
            {
                $more_shits->push($shitproperty);
            }
        }
        $sorting = Input::get('sort');

        if ($sorting == null) {
            $sorting = 'desc';
        } else {
            $sorting = Input::get('sort');
        }
        if ($user->user_subscription == 1)
        {
            $total_listings = 10;
        }
//        dd($user->group_property());
        if (isset($request['listing_view'])) {
            if ($request['listing_view'] == LISTINGS_VIEW_0) {
                $data = [
                    'listings' => $user->properties()->orderBy('updated_at', 'desc')->paginate(12),
                    'listing_view' => LISTINGS_VIEW_0,
                    'affiliates' => $user->confirmedAffiliates,
                    'groups' => $user->joinedgroups,

                    'listing_size' => $total_listings,
                    'total_listings' => $total_listings,
                    'affiliates' => $user->confirmedAffiliates,
                    'groups' => $user->joinedgroups,
                    'recent' => $user->shares,
                    'view_from' => BLOWUP_FROM_DASHBOARD,
                    'user' => $user,
                    'available_listings' => $available_listings,
                    'sorting' => $sorting,
                    'newMessage' => sizeof($user->newMessage),
                    'transact' => $transaction,
                    'department' => $department,
                    'locProvince'   => $locProvince

                ];
            } else if ($request['listing_view'] == LISTINGS_VIEW_1) {
                $data = [
                    'listings' => $user->properties()->publicProperties()->orderBy('updated_at', 'desc')->paginate(12),
                    'listing_view' => LISTINGS_VIEW_1,
                    'listing_size' => $total_listings,
                    'total_listings' => $total_listings,
                    'affiliates' => $user->confirmedAffiliates,
                    'groups' => $user->joinedgroups,
                    'recent' => $user->shares,
                    'view_from' => BLOWUP_FROM_REGULAR,
                    'user' => $user,
                    'available_listings' => $available_listings,
                    'sorting' => $sorting,
                    'newMessage' => sizeof($user->newMessage),
                    'transact' => $transaction,
                    'department' => $department,
                    'locProvince'   => $locProvince

                ];
            } else if ($request['listing_view'] == LISTINGS_VIEW_2) {
                $data = [
                    'listings' => $user->properties()->privateProperties()->orderBy('updated_at', 'desc')->paginate(12),
                    'listing_view' => LISTINGS_VIEW_2,
                    'listing_size' => $total_listings,
                    'total_listings' => $total_listings,
                    'recent' => $user->shares,
                    'affiliates' => $user->confirmedAffiliates,
                    'groups' => $user->joinedgroups,
                    'view_from' => BLOWUP_FROM_REGULAR,
                    'user' => $user,
                    'available_listings' => $available_listings,
                    'sorting' => $sorting,
                    'newMessage' => sizeof($user->newMessage),
                    'transact' => $transaction,
                    'department' => $department,
                    'locProvince'   => $locProvince

                ];
            } else if ($request['listing_view'] == LISTINGS_VIEW_3) {
                $data = [
                    'listings' => $user->shares()->orderBy('updated_at', 'desc')->paginate(12),
                    'listing_view' => LISTINGS_VIEW_3,
                    'listing_size' => $total_listings,
                    'total_listings' => $total_listings,
                    'affiliates' => $user->confirmedAffiliates,
                    'recent' => $user->shares,
                    'groups' => $user->joinedgroups,
                    'view_from' => BLOWUP_FROM_AFFILIATE,
                    'user' => $user,
                    'available_listings' => $available_listings,
                    'sorting' => $sorting,
                    'newMessage' => sizeof($user->newMessage),
                    'transact' => $transaction,
                    'department' => $department,
                    'locProvince'   => $locProvince,

                ];
//                dd($user->shares()->orderBy('created_at', 'desc')->get());
            } else if ($request['listing_view'] == LISTINGS_VIEW_4) {
                $data = [
                    'listings' =>   $more_shits,
                    'listing_view' => LISTINGS_VIEW_4,
                    'listing_size' => $total_listings,
                    'total_listings' => $total_listings,
                    'affiliates' => $user->confirmedAffiliates,
                    'recent' => $user->shares,
                    'groups' => $user->joinedgroups,
                    'view_from' => BLOWUP_FROM_GROUP,
                    'intab' => 'group',
                    'user' => $user,
                    'group_id' => 1,
                    'available_listings' => $available_listings,
                    'sorting' => $sorting,
                    'newMessage' => sizeof($user->newMessage),
                    'transact' => $transaction,
                    'department' => $department,
                    'locProvince'   => $locProvince
                ];
//                dd($data);
            }
            else if ($request['listing_view'] == LISTINGS_VIEW_5) {
                $data = [
                    'listings' => Property::publicProperties()->paginate(12),
                    'listing_view' => LISTINGS_VIEW_5,
                    'listing_size' => $total_listings,
                    'total_listings' => $total_listings,
//                    'affiliates' => $user->confirmedAffiliates,
//                    'groups' => $user->joinedgroups,
                    'recent' => $user->shares,
                    'view_from' => BLOWUP_FROM_DASHBOARD,
                    'user' => $user,
                    'available_listings' => $available_listings,
                    'sorting' => $sorting,
                    'newMessage' => sizeof($user->newMessage),
                    'transact' => $transaction,
                    'department' => $department,
                    'locProvince'   => $locProvince

                ];
            } else if ($request['listing_view'] == LISTINGS_VIEW_6) {
                $data = [
                    'listings' => $user->properties()->orderBy('updated_at', 'desc')->paginate(12),
                    'listing_view' => LISTINGS_VIEW_6,
                    'listing_size' => $total_listings,
                    'total_listings' => $total_listings,
                    'affiliates' => $user->confirmedAffiliates,
                    'groups' => $user->joinedgroups,
                    'view_from' => BLOWUP_FROM_DASHBOARD,
                    'user' => $user,
                    'available_listings' => $available_listings,
                    'sorting' => $sorting,
                    'newMessage' => sizeof($user->newMessage),
                    'transact' => $transaction,
                    'department' => $department,
                    'locProvince'   => $locProvince

                ];
            }

            return $data;
        }
        $reload = Property::where('user_id', $user->id)->where('visibility', 0);

        $reload->update(['visibility' => 1]);
        if ($user->user_subscription == 1) {
            $total_listings = 10;
            if ($available_listings > $total_listings) {
                $disabled_listings = Property::where('user_id', $user->id)->orderBy('updated_at', 'asc')->take($available_listings - $total_listings);
                $disabled_listings->timestamps = false;
                $disabled_listings->update(['visibility' => 0]);
                foreach ($available_listings as $al){
                  PropertyUser::where('property_id',$al->id)->delete();

                }
            }
        }
        return $data = [
            'listings' => $user->properties()->orderBy('updated_at', $sorting)->paginate(12),
            'property' => $user->properties()->get(),
            'listing_view' => LISTINGS_VIEW_0,
            'affiliates' => $user->confirmedAffiliates,
            'groups' => $user->joinedgroups,
            'listing_size' => $total_listings,
            'total_listings' => $total_listings,
            'recent' => $user->shares,
            'affiliates' => $user->confirmedAffiliates,
            'groups' => $user->joinedgroups,
            'view_from' => BLOWUP_FROM_DASHBOARD,
//            'unshare' => $user->properties->diPaNaSharan,
            'user' => $user,
            'available_listings' => $available_listings,
            'sorting' => $sorting,
            'newMessage' => sizeof($user->newMessage),
            'transact' => $transaction,
            'department' => $department,
            'locProvince'   => $locProvince

        ];

    }

    public function shared()
    {
        $user = auth()->user();
        $data = [
            'listings' => $user->shares,
            'mode' => 'dashboard',
            'viewmode' => 'listings',
            'view_code' => VIEW_CODE_LISTING_SHARE,
            'blowup_mode' => BLOWUP_SHARING,
            'intab' => 'public',
            'view_from' => BLOWUP_FROM_DASHBOARD,
            'affiliates' => $user->confirmedAffiliates,
            'groups' => $user->joinedgroups,
            'property_id' => $user->shares,
            '_listing_type' => $this->dispatch(new GetListingType($user->shares())),
            '_conditions' => $this->dispatch(new GetConditionType($user->shares())),
            '_availabilities' => $this->dispatch(new GetAvailabilityType($user->shares())),
            '_ownerships' => $this->dispatch(new GetListingOwnership($user->shares())),
            '_province' => $this->dispatch(new GetProvinces($user->shares())),
            '_classifications' => $this->dispatch(new GetPropertyClassification($user->shares())),
            '_rooms' => $this->dispatch(new GetRooms($user->shares())),
            '_bathrooms' => $this->dispatch(new GetBathrooms($user->shares())),
            '_parking' => $this->dispatch(new GetParking($user->shares())),
            '_balcony' => $this->dispatch(new GetBalcony($user->shares())),
            '_lot_area' => $this->dispatch(new GetLotArea($user->shares())),
            '_floor_area' => $this->dispatch(new GetFloorArea($user->shares())),
            'user' => $user,
        ];

        return view('main.dashboard.listing-shared')->with($data);
    }

    public function quick()
    {
        $user = auth()->user();
        $data = [
            'listings' => $user->properties()->quickProperties()->get(),
            // 'shared' => $this->dispatch(new GetSharedProperties($user->id)),
            // 'mode' => 'dashboard',
            // 'viewmode' => 'listings',
            // 'view_code' => VIEW_CODE_LISTING_DASHBOARD,
            // 'blowup_mode' => BLOWUP_SHARING,
            // 'affiliates' => $user->confirmedAffiliates,
            // 'groups' => $user->joinedgroups,
            // 'intab' => 'public',
            // 'view_from' => BLOWUP_FROM_DASHBOARD,
            // Sorting Property
            // 'sort_transaction' => 
            // '_listing_type'     => $this->dispatch(new GetListingType($user->properties()->quickProperties())),
            // '_conditions'       => $this->dispatch(new GetConditionType($user->properties()->quickProperties())),
            // '_availabilities'   => $this->dispatch(new GetAvailabilityType($user->properties()->quickProperties())),
            // '_ownerships'       => $this->dispatch(new GetListingOwnership($user->properties()->quickProperties())),
            // '_province'         => $this->dispatch(new GetProvinces($user->properties()->quickProperties())),
            // '_classifications'  => $this->dispatch(new GetPropertyClassification($user->properties()->quickProperties())),
            // '_rooms'            => $this->dispatch(new GetRooms($user->properties()->quickProperties())),
            // '_bathrooms'        => $this->dispatch(new GetBathrooms($user->properties()->quickProperties())),
            // '_parking'        => $this->dispatch(new GetParking($user->properties()->quickProperties())),
            // '_balcony'        => $this->dispatch(new GetBalcony($user->properties()->quickProperties())),
            // '_lot_area'        => $this->dispatch(new GetLotArea($user->properties()->quickProperties())),
            // '_floor_area'        => $this->dispatch(new GetFloorArea($user->properties()->quickProperties())),
            // sort data
        ];
        return view('main.dashboard.listing-quick')->with($data);
    }


    public function group()
    {
        $user = auth()->user();
        $listings = collect();
        foreach ($user->joinedgroups as $group) {
            foreach ($group->properties as $property) {
                $listings->push($property);
            }
        }
        $data = [
            'listings' => $listings,
            'quick' => $user->properties()->quickProperties()->get(),
            'shared' => $this->dispatch(new GetSharedProperties($user->id)),
            'mode' => 'dashboard',
            'viewmode' => 'listings',
            'view_code' => VIEW_CODE_LISTING_DASHBOARD,
            'blowup_mode' => BLOWUP_SHARING,
            'affiliates' => $user->confirmedAffiliates,
            'groups' => $user->joinedgroups,
            'intab' => 'public',
            'view_from' => BLOWUP_FROM_DASHBOARD,
            'group_id' => $property,
            // Sorting Property
            // 'sort_transaction' => 
            '_listing_type' => $this->dispatch(new GetListingType($user->properties())),
            '_conditions' => $this->dispatch(new GetConditionType($user->properties())),
            '_availabilities' => $this->dispatch(new GetAvailabilityType($user->properties())),
            '_ownerships' => $this->dispatch(new GetListingOwnership($user->properties())),
            '_province' => $this->dispatch(new GetProvinces($user->properties())),
            '_classifications' => $this->dispatch(new GetPropertyClassification($user->properties())),
            '_rooms' => $this->dispatch(new GetRooms($user->properties())),
            '_bathrooms' => $this->dispatch(new GetBathrooms($user->properties())),
            '_parking' => $this->dispatch(new GetParking($user->properties())),
            '_balcony' => $this->dispatch(new GetBalcony($user->properties())),
            '_lot_area' => $this->dispatch(new GetLotArea($user->properties())),
            '_floor_area' => $this->dispatch(new GetFloorArea($user->properties())),
            // sort data
        ];


        return view('main.dashboard.listing-group')->with($data);
    }

    // searching
    public function getSearch(Request $request)
    {
        $user = auth()->user();
        $transaction = Transaction::select('id','title')->get();
        $department = Department::where('parent_id', '=', 0)->select('id','parent_id','department_name')->get();
        $total_listings = Subscribe_Log::where('user_id', '=', $user->id)->orderBy('created_at', 'desc')->limit(1)->pluck('listings');
        $group_properties = Group::with(['members', 'properties'])->find($user->id);
        $sorting = Input::get('sort');
        $location_request = $request['location'];
        $prop_type = $request[''];
        $data = [];
        $locProvince = Location::where('type', '=', 1)
            ->select('id','name')
            ->orderByRaw("case when name = 'Metro Manila' then id else name end asc")
            ->get();
        $properties = Property::where('city_title', 'LIKE', '%' . $location_request . '%')
            ->orWhere('province_title', 'LIKE', '%' . $location_request . '%')
            ->orWhere('street_address', 'LIKE', '%' . $location_request . '%')
            ->orderBy('created_at', 'desc')->paginate(12);
        $available_listings = sizeof($properties);
        if ($user->user_subscription == 1) {
            $total_listings = 10;
            if ($available_listings > $total_listings) {
                $disabled_listings = Property::where('user_id', $user->id)->orderBy('updated_at', 'asc')->take($available_listings - $total_listings);
                $disabled_listings->timestamps = false;
                $disabled_listings->update(['visibility' => 0]);
                foreach ($available_listings as $al){
                  PropertyUser::where('property_id',$al->id)->delete();

                }
            }
        }
        $datasearch = [
            'listings' => $properties,
            'listing_view' => LISTINGS_VIEW_0,
            'total_listings_showed' => sizeof($locProvince),
            'total_listings' => $total_listings,
            'available_listings' => $available_listings,
            'view_from' => BLOWUP_FROM_DASHBOARD,
            'sorting' => $sorting,
            'newMessage' => sizeof($user->newMessage),
            'transact' => $transaction,
            'department' => $department,
            'locProvince' => $locProvince
        ];
        return view('main.dashboard.index')->with($datasearch);
    }
    public function filter_search(Request $request)
    {
        $user = auth()->user();
        $listing_request = $request['listing_type'];
        $province_request = $request['filter_province'];
        $available_listings = $user->getNumListings($user->id, 'available');
        $searchedfilter = $user->properties()->where('listing_type', '=' , $listing_request )
            ->orWhere('province_title','=',$province_request)
            ->orderBy('created_at', 'desc')->paginate(12);
        $total_listings = $user->getNumListings($user->user_subscription, 'total');
        $transaction = Transaction::select('id','title')->get();
        $department = Department::where('parent_id', '=', 0)->select('id','parent_id','department_name')->get();
        $locProvince = Location::where('type', '=', 1)
            ->select('id','name')
            ->orderByRaw("case when name = 'Metro Manila' then id else name end asc")
            ->get();

        $sorting = Input::get('sort');
        $filter = [
            'listings' => $searchedfilter,
            'available_listings' => $available_listings,
            'total_listings_showed' => sizeof($searchedfilter),
            'total_listings' => $total_listings,
            'transact' => $transaction,
            'department' => $department,
            'listing_view' => LISTINGS_VIEW_0,
            'view_from' => BLOWUP_FROM_DASHBOARD,
            'sorting' => $sorting,
            'newMessage' => sizeof($user->newMessage),
            'locProvince'   => $locProvince

        ];
        return view('main.dashboard.index')->with($filter);

    }
}
