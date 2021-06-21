<?php

namespace App\Jobs\Searching;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;

class GetLotArea extends Job implements SelfHandling
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
        $properties = $properties->where('lot_area','<>','');
        $data = [
            'min' => $properties->min('lot_area') ? $properties->min('lot_area') : 0,
            'max' => $properties->max('lot_area') ? $properties->max('lot_area') : 0,
            // 'step' => ( $properties->max('lot_area') - $properties->min('lot_area') ) / 5,
        ];
        return $data;
    }
}
