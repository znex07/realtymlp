<?php

namespace App\Jobs\Thread;

use App\Jobs\Job;
use App\Jobs\Reply\SendReply;
use App\Thread;
use Bus;
use Illuminate\Contracts\Bus\SelfHandling;

class Reply extends Job implements SelfHandling
{
    private $request;
    private $thread;
    private $pair;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($request, $id)
    {
        $this->request = $request;
        $this->thread = Thread::findOrFail($id);
        $this->pair = Thread::firstOrCreate([
            'pair_id' => $this->thread->id,
        ]);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $request = $this->request;
        Bus::dispatch(new SendReply($this->thread, $request->only('message')));
        Bus::dispatch(new SendReply($this->pair, $request->only('message')));
    }
}
