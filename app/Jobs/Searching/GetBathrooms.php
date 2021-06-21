<?php

namespace App\Jobs\Searching;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;

class GetBathrooms extends Job implements SelfHandling
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
        $properties = $properties->where('bathrooms','<>','');
        $data = [
            'min' => $properties->min('bathrooms') ? $properties->min('bathrooms') : 0,
            'max' => $properties->max('bathrooms') ? $properties->max('bathrooms') : 0,
        ];
        return $data;
    }
}
