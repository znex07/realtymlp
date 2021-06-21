<?php

namespace App\Jobs\Admin\Post;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;

use App\Developers;
class AddDeveloperJob extends Job implements SelfHandling
{
    private $data;
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function handle()
    {
        $data = $this->data;

        $developer = Developers::create($data);
        return $developer;
    }
}
