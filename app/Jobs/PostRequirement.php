<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\Requirements;
use Illuminate\Contracts\Bus\SelfHandling;

class PostRequirement extends Job implements SelfHandling
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Requirements $requirements)
    {
        $data = $this->data;
        $post_requirements = $requirements->create($data);
        
        return $post_requirements;
    }
}
