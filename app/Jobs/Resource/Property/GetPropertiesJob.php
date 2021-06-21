<?php

namespace App\Jobs\Resource\Property;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Property;
class GetPropertiesJob extends Job implements SelfHandling
{
    private $data;
    public function __construct(array $data)
    {
        $this->data = $data;
    }
    public function handle(Property $property)
    {
        $data = $this->data;
        $properties = $property->with(['files','shares'])
                            ->where('user_id', $data['id'])
                            ->where('property_status',$data['property_status'])
                            ->orderBy('id','desc')
                            ->get();

        return $properties;
    }
}
