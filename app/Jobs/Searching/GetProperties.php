<?php

namespace App\Jobs\Searching;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;

class GetProperties extends Job implements SelfHandling
{
    private $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function handle()
    {
        $data = $this->data;
        $req = array_filter($data['request']->input());
        $properties = $data['properties'];
        if (isset($req['listing_type'])) 
            $properties->where('listing_type', $req['listing_type']);
        if (isset($req['property_clasifications'])) 
            $properties->where('property_clasifications', $req['property_clasifications']);
        if (isset($req['property_types'])) 
            $properties->where('property_types', $req['property_types']);
        if (isset($req['province'])) 
            $properties->where('province', $req['province']);
        if (isset($req['city'])) 
            $properties->where('city', $req['city']);
        if (isset($req['condition_type'])) 
            $properties->where('condition_type', $req['condition_type']);
        if (isset($req['condition_type'])) 
            $properties->where('condition_type', $req['condition_type']);
        if (isset($req['availability_type'])) 
            $properties->where('availability_type', $req['availability_type']);
        if (isset($req['ownership_type'])) 
            $properties->where('ownership_type', $req['ownership_type']);
        return $properties;
    }
}
