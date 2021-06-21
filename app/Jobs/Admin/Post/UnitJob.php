<?php

namespace App\Jobs\Admin\Post;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Units;
class UnitJob extends Job implements SelfHandling
{
    private $data;
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function handle(Units $unit)
    {
        $data = $this->data;
        $unit = $unit->create($data);
        // $units = $data['units'];
        // $unit = Units
    }
}
