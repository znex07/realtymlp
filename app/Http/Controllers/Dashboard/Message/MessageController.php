<?php

namespace App\Http\Controllers\Dashboard\Message;

use App\Http\Controllers\Controller;
use App\Http\Requests\Request;
use App\Reply;
use App\Thread;
use App\Message;
use App\Property;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        $user = auth()->user();
        $id = $user->id;
        $property_message = Thread::where('from_id',$id)->orWhere('to_id',$id)->orderBy('created_at','asc')->get();
//        foreach ($property_message as $pm){
//            $latest_msg = Thread::where('to_id',2)->limit(1)->orderBy('created_at','desc')->get();
//        }
//        $latest_thread = Thread::with(['to'])->with(['from'])->where('from_id',$id)->orWhere('to_id',3)->orderBy('created_at','asc')->get();
//        dd($property_message);
//        $latest_msg = Thread::getMsgSubject(1);
//        dd($latest_msg);
        $inquiry = Message::where('to_id',$id)->orderBy('created_at','asc')->get();
//        dd($inquiry);
//        $property_message = Thread::where('user_id',$id)->orderBy('created_at','asc')->get();
//        if($thread)
//        dd($property_message);
//        $reply = Reply::where('from_id',$user->id)->orderBy('created_at','asc')->get();
//        dd(Thread::find(1)->to);
//        $thread = DB::table('threads')->select('subject','to_id')->distinct()->get();
        $data = [
            'threads' => $property_message,
            'reply' => $property_message,
            'user' => $user,
            'id' => $id,
            'inquiry' => $inquiry,
            'newMessage' => sizeof($user->newMessage),
        ];
//        $threadko = Thread::find(1)->to->profile_image;
//        dd($threadko);
        return view('main.dashboard.message.index')->with($data);
    }
    public function postThread(){
        return view('main.dashboard.message.index');
    }
    public function getNew()
    {
        return view('main.dashboard.message.send');
    }

    public function getThread($id)
    {
//        $thread = Thread::with('replies')->unique()->findOrFail($id);
//        $thread = Thread::unique()->findOrFail($id);
//        return view('main.dashboard.message.inbox')
//            ->with([
//                'thread' => $thread
//            ]);
        $user = auth()->user();
//      $thread = Thread::with('to')->findOrFail($id);
        $thread = Thread::with(['to'])->with(['from'])->where('to_id',$id)->orWhere('from_id',$id)->orderBy('created_at','desc')->get();
        return $thread;
    }
    public function read(){
        $input = Input::all();
        $id = $input['id'];
//        dd(id);
        Thread::where('to_id',$id)->update([ 'is_unread' => 1 ]);
//        $msg->is_unread = 1;
//        $msg->save();
    }

}
