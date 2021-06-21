<?php

namespace App\Jobs\Searching;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;

class GetParking extends Job implements SelfHandling
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
        $properties = $properties->where('parking','<>','');
        $data = [
            'min' => $properties->min('parking') ? $properties->min('parking') : 0,
            'max' => $properties->max('parking') ? $properties->max('parking') : 0,
        ];
        return $data;
    }
}
