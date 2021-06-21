<?php

namespace App\Jobs\Reply;

use App\Jobs\Job;
use App\Reply;
use Illuminate\Contracts\Bus\SelfHandling;

class SendReply extends Job implements SelfHandling
{
    private $reply;
    private $thread;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($thread, $reply)
    {
        $this->reply = $reply;
        $this->thread = $thread;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $reply = $this->reply;
        $reply['thread_id'] = $this->thread->id;
        $reply['user_id'] = auth()->user()->id;
        Reply::create($reply);
    }
}
