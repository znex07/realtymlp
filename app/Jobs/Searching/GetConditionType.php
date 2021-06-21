<?php

namespace App\Jobs\Searching;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;

class GetConditionType extends Job implements SelfHandling
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
        // dd($properties->get());
        $data = $properties
                    ->join('categories', 'properties.condition_type', '=', 'categories.category_id')
                    ->select('categories.*')
                    ->where('categories.code',4)
                    ->groupBy('category_id')
                    ->get();
        return $data;
    }
}
