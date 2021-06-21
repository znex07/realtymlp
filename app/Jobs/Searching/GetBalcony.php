<?php

namespace App\Jobs\Searching;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;

class GetBalcony extends Job implements SelfHandling
{
    private $properties;
    public function __construct($properties)
    {
        $this->properties = $properties;
    }

    public function handle()
    {
        $properties = $this->properties;
        $properties = $properties->where('property_status', '<>', 3);
        $properties = $properties->where('balcony','<>','');
        $data = [
            'min' => $properties->min('balcony') ? $properties->min('balcony') : 0,
            'max' => $properties->max('balcony') ? $properties->max('balcony') : 0,
        ];
        return $data;
    }
}
