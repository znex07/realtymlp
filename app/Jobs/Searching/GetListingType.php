<?php

namespace App\Jobs\Searching;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;

class GetListingType extends Job implements SelfHandling
{
    private $properties;
    public function __construct($properties)
    {
        $this->properties = $properties;
    }

    public function handle()
    {
        $properties = $this->properties;
        $data = $properties
                    ->join('transactions', 'properties.listing_type', '=', 'transactions.id')
                    ->select('transactions.*')
                    ->groupBy('title')
                    ->get();
        return $data;
    }
}
