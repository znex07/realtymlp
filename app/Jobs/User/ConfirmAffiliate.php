<?php

namespace App\Jobs\User;

use App\Jobs\Job;
use DB;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Affiliate_Log;
use App\User;
class ConfirmAffiliate extends Job implements SelfHandling
{
    private $request;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $id = $this->request->input('affiliate_id');
        $user = User::findOrfail($id);



        $create = [
            'user_id' => auth()->user()->id,
            'code' => $user->user_code,
            'affiliate_name' => $user->fullname,
            'action' => 'AN AFFILIATE ADDED YOU'
        ];

        Affiliate_Log::create($create);

        DB::table('user_user')
            ->where('affiliate_id', $id)
            ->where('user_id', auth()->user()->id)
            ->update(['is_confirmed' => 1]);

        DB::table('user_user')
            ->where('user_id', $id)
            ->where('affiliate_id', auth()->user()->id)
            ->update(['is_confirmed' => 1]);
    }
}
