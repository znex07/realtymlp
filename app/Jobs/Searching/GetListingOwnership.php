<?php

namespace App\Jobs\Searching;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;

class GetListingOwnership extends Job implements SelfHandling
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
                    ->join('categories', 'properties.ownership_type', '=', 'categories.category_id')
                    ->select('categories.*')
                    ->where('categories.code',6)
                    ->groupBy('category_id')
                    ->get();
        return $data;
    }
}
