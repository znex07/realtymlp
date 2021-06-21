<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Http\Requests\Resource\PropertyRequest;
use App\Jobs\Resource\Property\FullPost;
use App\Jobs\Resource\Property\QuickPost;
use App\Jobs\Resource\Property\ThumbnailJob;
use App\Property;
use App\LocationProperty;
use App\Property_Log;
use App\UserSubscribe;
use Carbon\Carbon;

class PropertyController extends Controller
{
    public function store(PropertyRequest $request)
    {
        $user = auth()->user();
        $avail_listings = UserSubscribe::where('id','=',$user->id)->first();
        $data = $request->all();
//        dd($data);
        $with = [];
//        $data['rental_price'] = str_replace(',', '', $data['rental_price']);
//        $data['selling_price'] = str_replace(',', '', $data['selling_price']);

        if ($data['method_type'] === 'quick') {
            if($data['optionsRadios1'] == '2')
            {
                $data['property_status'] = '4';
            }
            if($data['optionsRadios1'] == '1')
                 {
                     $data['property_status'] = '3';
                 }
            $data['city_title'] = $data['lp_city'];
            $data['province_title'] = $data['lp_province'];
            $this->dispatch(new QuickPost($data));
            $with = [
                'quick.success' => 'Stored new Quick post!',
                'post.type' => 'quick'
            ];
        } else if ($data['method_type'] === 'full') {
            $data['city_title'] = $data['lp_city'];
            $data['province_title'] = $data['lp_province'];
            // dd($data);
            $this->dispatch(new FullPost($data));
            $with = [
                'full.success' => 'Stored New Property!',
                'post.type' => 'listings'
            ];  
        }
        $avail_listings->listings = $avail_listings->listings + 1;
        
        $avail_listings->save();

        return redirect('/dashboard')->with($with);
    }

    public function update($id, PropertyRequest $request)
    {
        $data = $request->all();

        $listing_type = $data['listing_type'];
        // $listing_types = isset($data['listing_types']) ? $data['listing_types'] : null;
        // $lts = '';$i=0;$append = '-';
        // if(!is_null($listing_types)) {
        //     foreach ($listing_types as $lk=>$lt) {
        //         if(++$i == count($listing_types)) $append = '';
        //         $lts .= $lt.$append;
        //     }
        // }
        // $data['listing_type'] = $lts;m
//        $data['rental_price'] = str_replace(',', '', $data['rental_price']);
//        $data['selling_price'] = str_replace(',', '', $data['selling_price']);
        $data['created_at'] = Carbon::now();
        // dd($data);
        if ($listing_type == '1') {
            $data['selling_price'] = '';
        } elseif ($listing_type == '2') {
            $data['rental_price'] = '';
            # code...
        } else {
            $data['selling_price'] = '';
            $data['rental_price'] = '';
        }


        $property = Property::with(['files'])->findOrFail($id);
        $d = [
            'property' => $property,
            'thumbnail_index' => $data['_thumbnail_index']
        ];
        $dispatched = $this->dispatch(new ThumbnailJob($d));

        $ipAddress = $_SERVER['REMOTE_ADDR'];
        if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER)) {
            $ipAddress = array_pop(explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']));
        }

        $insert = [
            'property_code' => $data['property_code'],
            'action' => 'EDIT LISTING',
            'ip_address' => $ipAddress
        ];

        Property_Log::create($insert);

        $data['city_title'] = $data['lp_city'];
        $data['province_title'] = $data['lp_province'];
        $property->update($data);

        $post_type = '';
        if ($data['method_type'] === 'quick')
            $post_type = 'quick';
        else
            $post_type = 'listings';

        return redirect('/dashboard')->with(['post.type' => $post_type]);
    }

}
