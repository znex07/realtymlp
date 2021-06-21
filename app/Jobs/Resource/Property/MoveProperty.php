<?php

namespace App\Jobs\Resource\Property;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Property;
class MoveProperty extends Job implements SelfHandling
{
    private $data;
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Property $property)
    {
        $data = $this->data;
        $property = $property->find($data['id'])->update(['property_status'=>$data['property_status']]);
        return $property;
    }
}
