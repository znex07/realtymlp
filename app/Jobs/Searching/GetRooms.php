<?php

namespace App\Jobs\Searching;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;

class GetRooms extends Job implements SelfHandling
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
        $properties = $properties->where('bedrooms','<>','');
        $data = [
            'min' => $properties->min('bedrooms') ? $properties->min('bedrooms') : 0,
            'max' => $properties->max('bedrooms') ? $properties->max('bedrooms') : 0,
        ];
        return $data;
    }
}
