<?php

namespace App\Jobs\Resource;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Location;
class GetProvince extends Job implements SelfHandling
{    
    public function handle(Location $location)
    {
        $province = $location->where('type', '=', 1)
                    ->select('id','name')
                    ->orderByRaw("case when name = 'Metro Manila' then id else name end asc")
                    ->get();
        return $province;
    }
}
