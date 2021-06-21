<?php

namespace App\Jobs\Searching;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;

class GetFilteredCities extends Job implements SelfHandling
{
    private $data;
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function handle()
    {
        $data = $this->data;
        if ($data['inner']) {
            $properties = auth()->user()->properties()
                    ->where('property_status', '<>', 3);
            $types = $properties
                    ->join('locations', 'properties.city','=','locations.id')
                    ->where('locations.parent_id', $data['province'])
                    ->select('locations.*')
                    ->groupBy('name')
                    ->get();
            return $types;
        }
    }
}
