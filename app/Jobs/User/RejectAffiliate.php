<?php

namespace App\Jobs\user;

use App\Jobs\Job;
use DB;
use Illuminate\Contracts\Bus\SelfHandling;

class RejectAffiliate extends Job implements SelfHandling
{
    private $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function handle()
    {
        $id = $this->request->input('affiliate_id');
        DB::table('user_user')
            ->where('affiliate_id', $id)
            ->where('user_id', auth()->user()->id)
            ->delete();

        DB::table('user_user')
            ->where('user_id', $id)
            ->where('affiliate_id', auth()->user()->id)
            ->delete();
    }
}
