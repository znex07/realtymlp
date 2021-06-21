<?php

namespace App\Jobs\Searching;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;

class GetFilteredPropertyType extends Job implements SelfHandling
{
    private $data;
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function handle()
    {
        $data = $this->data;
        if ($data['inner']) {
            $properties = auth()->user()->properties()
                    ->where('property_status', '<>', 3);
            $types = $properties
                    ->join('departments', 'properties.property_types','=','departments.id')
                    ->where('departments.parent_id', $data['classification'])
                    ->select('departments.*')
                    ->groupBy('department_name')
                    ->get();
            return $types;
        }
    }
}
