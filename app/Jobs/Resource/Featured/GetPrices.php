<?php

namespace App\Jobs\Resource\Featured;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Units;

class GetPrices extends Job implements SelfHandling
{
    public function __construct()
    {

    }

    public function handle()
    {
        return 0;
    }
}
