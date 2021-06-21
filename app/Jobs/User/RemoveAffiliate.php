<?php

namespace App\Jobs\User;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use App\User;
use DB;
class RemoveAffiliate extends Job implements SelfHandling
{
    private $request;
    public function __construct($request)
    {
      $this->request = $request;
    }

    public function handle()
    {
        $user = auth()->user();
        $affiliate = User::findOrFail($this->request->input('affiliate_id'));
        $user->affiliates()->detach($affiliate->id);
        $affiliate->Affiliates()->detach($user->id);
    }
}
