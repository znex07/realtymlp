<?php
/**
 * Created by :
 * User: mark
 * Date: 7/4/2016
 * Time: 1:11 PM
 */

namespace App\Jobs\Searching;


use App\Jobs\Job;
use App\Subscription;
use Illuminate\Contracts\Bus\SelfHandling;

class GetSubscription extends Job implements SelfHandling
{
    public function __construct()
    {
    }
    public function handle(Subscription $subscription)
    {
        return $subscription->all();
    }
}