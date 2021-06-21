<?php

namespace App\Jobs\Resource\Featured;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Units;
use App\Projects;

class FeaturedProjects extends Job implements SelfHandling
{
    private $data;
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function handle()
    {
        
    }
}
