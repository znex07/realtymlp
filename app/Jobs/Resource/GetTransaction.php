<?php

namespace App\Jobs\Resource;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Transaction;
class GetTransaction extends Job implements SelfHandling
{
    
    public function __construct()
    {
        
    }

    public function handle(Transaction $transaction)
    {
        return $transaction->all();
    }
}
