<?php

namespace App\Jobs\Searching;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;

class GetProvinces extends Job implements SelfHandling
{
    private $properties;
    public function __construct($properties)
    {
        $this->properties = $properties;
    }

    public function handle()
    {
        $properties = $this->properties;
        // $properties = $properties->where('property_status', '<>', 3);
        $data = $properties
                    ->join('locations', 'properties.province', '=', 'locations.id')
                    ->select('locations.*')
                    ->groupBy('name')
                    ->get();
        return $data;
    }
}
