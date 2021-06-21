<?php

namespace App\Jobs\Resource\Property;

use App\Http\Controllers\Resource\ImageController;
use App\Jobs\Job;
use App\Property;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Property_Log;

class FullPost extends Job implements SelfHandling
{

    private $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function handle(Property $property)
    {
        $data = $this->data;
        // dd($data);
        // $listing_types = isset($data['listing_types']) ? $data['listing_types'] : null;
        // $property_classifications = isset($data['property_classifications']) ? $data['property_classifications'] : null;
        // $property_types = isset($data['property_types']) ? $data['property_types'] : null;
        // $lts = '';
        // $i=0;
        // $append = '-';
        // if(!is_null($listing_types))
        //     $lts = implode('-',$listing_types);
        //
        // if (!is_null($property_classifications))
        //   $data['property_classifications'] = implode('-', $property_classifications);
        //
        // if (!is_null($property_types))
        //   $data['property_types'] = implode('-', $property_types);
        // $data['listing_type'] = $lts;
        // $property_address = $data['street_address'] . ' '.$data['village'];
        // $data['property_address'] = $property_address;
       
        $ipAddress = $_SERVER['REMOTE_ADDR'];
        if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER)) {
            $ipAddress = array_pop(explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']));
        }

        $action = 'NEW LISTING';
        if($data['type'] == 'edit') {
            $action = 'EDIT LISTING';
        } 

        $insert = [
            'property_code' => $data['property_code'],
            'action' => $action,
            'ip_address' => $ipAddress
        ];

        Property_Log::create($insert);

        $fullpost = $property->create($data);

        return $fullpost;
    }
}
