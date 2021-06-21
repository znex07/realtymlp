@extends('main.dashboard.message.base')
@section('content.inner')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default message-card ">
                <div class="panel-body">
                    <div class="col-sm-12">
                        <p class="inbox-title text-center">{{ $thread->replies->get(0)->user->full_name }}</p>
                        <hr>
                    </div>
                    <div class="row">
                        @foreach($thread->replies as $reply)
                            @include('main.dashboard.message.partials.thread')
                        @endforeach
                    </div>
                    <div class='row'>
                        <div class='col-sm-12'>
                            <form action='/threads/{{ $thread->id }}/reply' method='POST'>
                                <input type='hidden' name='_token' value='{{ csrf_token() }}' />
                                <div class='form-group'>
                                    <textarea class='form-control chat' placeholder='Type a message...' name='message'></textarea>
                                </div>
                                <div class='text-right'>
                                    <button class='btn btn-sm btn-primary'>Send</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('#click_here').click(function (e) {
            var panel_to = $('#panel_to');
            var reply = $('#reply');

            panel_to.show();
            reply.hide();
            console.log('hello world'); 
        });
    </script>
@endsection

@section('styles')
    <link rel='stylesheet' href='/assets/css/messages.css' />
@endsection
