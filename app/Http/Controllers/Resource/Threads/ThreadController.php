<?php

namespace App\Http\Controllers\Resource\Threads;

use App\Http\Controllers\Controller;
use App\Http\Requests\Thread\NewThreadRequest;
use App\Http\Requests\Thread\ReplyRequest;
use App\Jobs\Thread\NewThread;
use App\Jobs\Thread\Reply;

use Request;

class ThreadController extends Controller
{
    public function postNew(NewThreadRequest $request)
    {
        $data = $this->dispatch(new NewThread($request));
        
        return redirect()->back();
    }

    public function postReply(ReplyRequest $request, $id)
    {
        $data = $this->dispatch(new Reply($request, $id));
        return redirect()->back();
    }
}
