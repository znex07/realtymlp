<input type="hidden" id="pic" value="{{ $user->profile_image  }}">
<div class="row text-center">
  <small >
    <div id='loadingDiv' style="display: none">
      <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
      <span class="sr-only">Loading...</span>
    </div>
  </small>
</div>
<div class="col-sm-12" id="sender-msg">
  <div class="media" id="bubble-message">
    {{--@foreach($latest_thread as $thread)--}}
    {{--<a href="#" class="pull-left">--}}
      {{--<img class="img-circle media-object" width="50px" height="50px" src="/avatars/{{ $thread->from->id == auth()->user()->id ? $thread->to->profile_image : $thread->from->profile_image }}" alt="msg Object">--}}
    {{--</a>--}}
    {{--<div class="media-body">--}}
      {{--<div class="well well-sm" style="display:inline-block; border-radius:3px 20px 20px 20px;">--}}
        {{--<b class="from-label">Mark Perdon</b>--}}
        {{--<p class="message-label"></p>--}}
        {{--<p class="message-label">{!! nl2br($thread->subject) !!}</p>--}}
      {{--</div>--}}
    {{--</div>--}}
        {{--@endforeach--}}
  </div>
</div>
{{--@if ( $user->id == $reply->id )--}}
{{--<div class="col-sm-12 {{ $user->id == $reply->id ? '' : 'hidden' }}">--}}
  {{--<div class="row text-center">--}}
    {{--<small >{{ $reply->created_at }}</small>--}}
  {{--</div>--}}
  {{--<div class="media pull-right">--}}
    {{--<a href="#" class="pull-right">--}}
      {{--<img class="img-circle media-object" width="50px" height="50px" src="/avatars/" alt="msg Object">--}}
    {{--</a>--}}
    {{--<div class="media-body">  --}}
      {{--<div class="well well-sm chat-user" style="display:inline-block; background-color:#48c9b0; color:#fff; border: 1px solid #48c9b0; border-radius: 20px 20px 3px 20px;">--}}
        {{--{!! nl2br($reply->message) !!}--}}
      {{--</div>--}}
    {{--</div>--}}
  {{--</div>--}}
{{--</div>--}}
{{--@endif--}}