@extends('main.dashboard.message.base')
@section('styles')
<style>
p {
    margin: 0 0 0px;
}
td {
    vertical-align: middle !important;
}
small, .small {
    font-size: 75%;
    line-height: 1.067;
}
.btn-default {
    background-color: #fff;
    color: #676A6B;
    border: 1px solid #ccc;
}
.btn-default:hover, .btn-default:focus, .btn-default:active {
    border: 1px solid #999;
    background-color: #fff;
    color: #676A6B;
}
textarea.form-control {
    font-size: 13px;
}
/*message*/
.chat {
  margin: 10px 0 15px;
  font-size: 13px;
  line-height: 0;
}
.chat-recepient {
  font-size: 13px;
}
/*typeahead*/
div.sugg-list {
  padding: 5px;
  margin: 0;
  font-size: 14px;
  height: auto;
  width:100% !important;
}
div.sugg-list > img.sugg-img {
  width:20px;
  height:20px;
}
div.sugg-list > span.sugg-email {
  font-size:12px;
  color:#909090;
  margin-left:30px;
}
div.sugg-list > span.sugg-name {
  margin-left:10px;
}
.media.thread-list{
  margin: 10px -15px 0 -15px;
  padding: 5px 15px;
  cursor: pointer;
}
.media.thread-list.active {
  background-color: #e6e6e6;
}
.scrollbox {
  overflow: auto;
  height: 385px;
  width: 100% !important;
  padding-right: 0px;
}
#scrollbox3 {
    overflow: auto;
    width: 100% !important;
    height: 250px;
    padding: 0 5px;   
}

.track3 {
    width: 10px;
    background: rgba(0, 0, 0, 0);
    margin-right: 2px;
    border-radius: 10px;
    -webkit-transition: background 250ms linear;
    transition: background 250ms linear;
}

.track3:hover,
.track3.dragging {
    background: #d9d9d9; /* Browsers without rgba support */
    background: rgba(0, 0, 0, 0.15);
}

.handle3 {
    width: 7px;
    right: 0;
    background: #999;
    background: rgba(0, 0, 0, 0.4);
    border-radius: 7px;
    -webkit-transition: width 250ms;
    transition: width 250ms;
}

.track3:hover .handle3,
.track3.dragging .handle3 {
    width: 10px;
}
</style>
@endsection
@section('content.inner')
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-body">        
        <ul class="breadcrumb">
          <li><a href="/dashboard/overview">Overview</a></li>
          <li class="active">Messages</li>
        </ul>
        <hr>         
        <ul class="nav nav-tabs">
          <li class="active">
            <a href="#inbox" data-toggle="tab"><i class="fa fa-inbox"></i> Inbox <!-- <span class="badge">4</span> --></a>
          </li>
          <li>
            <a href="#inquiries" data-toggle="tab"><i class="fa fa-tags"></i> Inquiries</a>
          </li>                      
        </ul>
        <div id="myTabContent" class="tab-content">
          <div class="tab-pane fade active in" id="inbox" style="margin-top:20px;">
            @include('main.dashboard.message.partials.chat')
          </div>
          <div class="tab-pane fade" id="inquiries" style="margin-top:20px;">
            @include('main.dashboard.message.partials.inquiry')
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
@section('scripts')
<script type='text/javascript' src='/assets/js/datum/affiliates.js'></script>
<script src="/assets/js/helper/jq-extend.js"></script>
<script type="text/javascript" src="/assets/js/chat.js"></script>
<script type="text/javascript" src="/assets/js/enscroll-0.6.2.min.js"></script>
<script type="text/javascript">
  chat.init();
  $('.chat-input').disable();
  $('.btn-send').disable();  
</script>
<script>
$('#scrollbox3,.scrollbox').enscroll({
    showOnHover: true,
    verticalTrackClass: 'track3',
    verticalHandleClass: 'handle3'
});
</script>
<script>
$(function() {
  var wtf    = $('#scrollbox3');
  var height = wtf[0].scrollHeight;
  wtf.scrollTop(height);
});
</script>
@endsection




