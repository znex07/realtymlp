<?php

namespace App\Jobs\Thread;

use App\Jobs\Job;
use App\Jobs\Reply\SendReply;
use App\Thread;
use Bus;
use Illuminate\Contracts\Bus\SelfHandling;

class NewThread extends Job implements SelfHandling
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
        $request = $this->request;
        $thread = Thread::with(['to'])->with(['from'])->where('to_id',$request->input('to_id'))->get();
        $ownership = 'new-thread';
        foreach ($thread as $threads){
            if($threads->to->id == $request->input('to_id')){
               $ownership = 'reply';
            }else{
               $ownership = 'new-thread';
            }
        }
//        dd($ownership);
        $thread = [
            'from_id' => auth()->user()->id,
            'to_id' => $request->input('to_id'),
            'subject' => $request->input('message'),
            'ownership' => $ownership
        ];
        Thread::create($thread);
//        $reply = [
//            'message' => $request->input('message'),
//            'from_id' => auth()->user()->id,
//            'to_id' => $request->input('to_id'),
//            'user_id' => auth()->user()->id,
//        ];
//        Bus::dispatch(new SendReply($thread, $reply));

//        $thread = Thread::create(array_merge($_thread, [
//            'user_id' => auth()->user()->id,
//        ]));
//        $secondThread = Thread::create(array_merge($_thread, [
//            'user_id' => $this->request->input('to_id'),
//            'pair_id' => $thread->id,
//        ]));

//        $thread->pair_id = $secondThread->id;
//        $thread->save();

//        Bus::dispatch(new SendReply($secondThread, $reply));
    }
}
