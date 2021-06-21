<?php

namespace App\Jobs\Resource\Property;

use App\Jobs\Job;
use App\Property;
use Illuminate\Contracts\Bus\SelfHandling;

class QuickPost extends Job implements SelfHandling
{

    private $data;

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
    public function handle(Property $property)
    {
        $data = $this->data;
        $this->data['user_id'] = auth()->user()->id;
        $this->data['property_code'] = 'PR-'.date('mdY').time();
        $this->data['property_status'] = $data['property_status'];
        $this->data['ownership_type'] = 1;

        $quickPost = $property->create($this->data);
        return $quickPost;
    }
}
