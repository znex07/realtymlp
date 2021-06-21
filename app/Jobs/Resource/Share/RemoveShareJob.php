<?php

namespace App\Jobs\Resource\Share;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;

use App\Property;
use App\Property_User;

class RemoveShareJob extends Job implements SelfHandling
{
    private $data;
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function handle(Property $property)
    {
        $data = $this->data;
        $pro = $property->with(['shares'])->findOrFail($data['property_code']);
        $prop = $pro->shares()->detach($data['user_id']);
        return $prop;
    }
}
