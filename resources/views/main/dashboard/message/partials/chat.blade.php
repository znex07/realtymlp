<div class="row">
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-body text-center">
                <input type="text" class="input-sm form-control" placeholder="Search" style="display: none;" aria-describedby="sizing-addon1">
                      <a href="#" class="btn-link btn-new-chat"><i class="fa fa-edit"></i> New Message</a>
            </div>
                <hr style="margin:0px">

            <div class="panel-body scrollbox">  
                <input type='hidden' id="token" name='_token' value='{{ csrf_token() }}'/>
                <input type="hidden" name="to_id" id="user_id" value="{{ $id }}">
                @foreach($threads as $thread)
                    @if($thread->ownership == 'new-thread')
                    <div class="media thread-list {{ $thread->is_unread == 0 && $thread->from_id != $id ? 'active' : ''}}" id="{{ $thread->to_id }}">
                        <a href="#" class="pull-left">
                            <img width="50px" height="50px" id="{{ $thread->to->id == auth()->user()->id ? $thread->to->profile_image : $thread->from->profile_image }}" src="/avatars/{{ $thread->from->id == auth()->user()->id ? $thread->to->profile_image : $thread->from->profile_image }}" class="img-circle media-object profile_image"/>
                        </a>
                        <div class="media-body">
                            <small class="pull-right">{{ $thread->created_at->format('g:i A') }}</small>
                            <p class="sender">
                                <strong>{{ $thread->from->id == auth()->user()->id ? $thread->to->full_name : $thread->from->full_name }} </strong>
                            </p>
                            <p class="chat">{{ $user->getMsg($thread->to_id) }}</p>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-md-8" >
        <div class="panel panel-default chat-container">
            <div class="panel-heading text-center">
                <span class="title-message">{{ sizeof($threads) == 0 ? 'No Conversation.' : 'No Conversation Selected.'}}</span>
            </div>
            <div class="panel-body" style="height:260px">
                <div class="row chat-replies" id="scrollbox3" style="display: none">

                    @include('main.dashboard.message.partials.reply')
                    {{--
                    @if ($thread->isEmpty())
                    @foreach($thread->replies as $reply)
                      @include('main.dashboard.message.partials.reply')
                    @endforeach
                    @endif
                    --}}
                </div>
                <div class="form-group">
                            <input type="text" class="form-control input-sm chat-new disable" id="chat-new"
                                   placeholder="Type the name of the affiliate" style="display: none;">
                        </div>
            </div>
            <div class="panel-body">
                <div class='row'>
                    <div class='col-sm-12'>
                        
                        <form action='/threads' method='POST'>
                            <input type='hidden' name='_token' value='{{ csrf_token() }}'/>
                            <input type='hidden' id='to_id' name='to_id'/>
                            <input type='hidden' id='subject' name='subject' value="_"/>
                            <input type='hidden' id='ownership' name='ownership' value="_"/>
                            <div class='form-group'>
                                <textarea class='form-control input-sm chat-input' name="message" style="resize: none;"
                                          placeholder='Type a message...' name='message'></textarea>
                            </div>
                            <div class='text-right'>
                                <button class='btn btn-primary btn-xs btn-send'>Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
