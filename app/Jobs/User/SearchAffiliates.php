<?php

namespace App\Jobs\User;

use App\Jobs\Job;
use App\User;
use DB;
use Illuminate\Contracts\Bus\SelfHandling;

class SearchAffiliates extends Job implements SelfHandling
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
        $data = [];
        $request = $this->request;

        $data = auth()->user()->confirmedAffiliates()->where(function ($query) use ($request) {
            $query->where('user_lname', 'like', '%' . $request->input('query') . '%')
            ->orWhere(DB::raw('CONCAT_WS(" ",user_fname, user_lname)', 'like', '%' . $request->input('query') . '%'))
            ->orWhere('user_fname', 'like', '%' . $request->input('query') . '%')
            ->orWhere('email', 'like', '%' . $request->input('query') . '%');
        });
        return $data->get();
    }
}
