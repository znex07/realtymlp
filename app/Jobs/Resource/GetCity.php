<?php

namespace App\Jobs\Resource;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Location;
class GetCity extends Job implements SelfHandling
{
    private $id;
    public function __construct($id)
    {
        $this->id = $id;
    }

    public function handle(Location $location)
    {
        return $location->where('parent_id',$this->id)->orderBy('name','ASC')->get();

    }
}
