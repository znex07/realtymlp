<?php

namespace App\Jobs\Searching;

use App\Jobs\Job;
use App\Prices;
use Illuminate\Contracts\Bus\SelfHandling;

class GetPrice extends Job implements SelfHandling
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Prices $subscription)
    {
        return $subscription->all();
    }
}
