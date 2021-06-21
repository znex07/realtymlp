<?php

namespace App\Jobs\Admin\Post;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Projects;
class ProjectJob extends Job implements SelfHandling
{
    private $data;
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function handle(Projects $project)
    {
        $data = $this->data;
        $project = $project->create($data);
    }
}
