<?php

namespace App\Jobs\Searching;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;

class GetFloorArea extends Job implements SelfHandling
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
        $properties = $properties->where('floor_area','<>','');
        // $step = ( $properties->max('floor_area') - $properties->min('floor_area') ) / 5;
        $data = [
            'min' => $properties->min('floor_area') ? $properties->min('floor_area') : 0,
            'max' => $properties->max('floor_area') ? $properties->max('floor_area') : 0,
            // 'step' => ( $properties->max('floor_area') - $properties->min('floor_area') ) / 5,
        ];
        return $data;
    }
}
