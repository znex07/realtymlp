@extends('main.dashboard.properties.base')
@section('styles')

@endsection
@section('content.inner')
<div class="row">
    <div class="col-md-12">
        @include('main.dashboard.properties.quick-toggle')
        <div id="posts" class="row">
            <div class="col-md-9">
                <div class="row">        
                    @foreach($listings as $quick)                
                    @include('main.dashboard.listings.quick')
                    @endforeach    
                </div>
            </div>
            <div class="col-md-3">
            </div>
        </div>
    </div>			
</div>

<div class="modal fade" id="modal-container-469460" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×
                </button>
                <h4 class="modal-title" id="myModalLabel">
                  Contact Agent
              </h4>
          </div>
          <div class="modal-body">
            <div class="media">
                <a class="pull-left" href="#" style="padding-left: 5px;"></a>
                <div class="media-body">
                    <p class="text-info"></p>
                    <p  style="font-size: 14px; line-height: 0">
                        <em>Broker</em>
                    </p>
                    <div class="form-group">
                        <div class="property-card">
                            <div class="primary">
                                <h3 id="show_email" class="text-info" style="font-size:14px; cursor:pointer"><span class="fa fa-envelope" style="padding-right:10px;"></span>Show Email Address</h3>
                                <div class="secondary" id="email_address" style="font-size:12px;padding-left:20px;display:none;">
                                    <h3 class="weak-title"></h3>
                                </div>
                            </div>
                        </div>
                    </div>   
                </div>
            </div>        
        </div>
        <div class="panel-footer" style="padding:15px !important;">
            <form class="form-vertical property-card" method="post" action="/dashboard/blowup/message">
                <h3 class="secondary weak-title">ASK ABOUT THE PROPERTY</h3>
                <input type="hidden" id="_token" name="_token" value="">
                <div class="form-group hidden">
                    <div class="input-group">
                        <input type="text" name="from_id" class="form-control"  value=''>
                        <span class="input-group-addon">*</span>
                    </div>
                </div>
                <div class="form-group hidden">
                    <div class="input-group">
                        <input type="text" name="to_id" class="form-control" value=''>
                        <span class="input-group-addon">*</span>
                    </div>
                </div>
                <div class="form-group hidden">
                    <div class="input-group">
                        <input type="text" name="property_code" class="form-control" value=''>
                        <span class="input-group-addon">*</span>
                    </div>
                </div>
                <div class="form-group hidden">
                    <div class="input-group">
                        <input type="text" name="property_id" class="form-control" value=''>
                        <span class="input-group-addon">*</span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" name="fullname" class="form-control" placeholder="Fullname">
                        <span class="input-group-addon">*</span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <input type="email" name="email_address" class="form-control" placeholder="Email Address">
                        <span class="input-group-addon">*</span>
                    </div>    
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <textarea name="message" class="form-control" placeholder="Message" style="width:100%; height:125px; resize:none">Please contact me regarding your property </textarea>
                        <span class="input-group-addon">*</span>
                    </div>
                </div>
                <input class="hidden" type="text" value="" id="property_code">
                <div class="form-group">
                    <button name="send" id="send" type="submit" class="btn btn-info btn-block"><span class="fa fa-envelope" style="padding-right:10px;"></span>Send Message</button>
                </div>
            </form>
        </div>
    </div>          
</div>        
</div>
@endsection

@section('scripts')
<script>
$(function() {
  $('.list_public').click(function (e) {
    $('.list_view').show();
    $('.grid_view').hide();
});
  $('.grid_public').click(function (e) {
    $('.list_view').hide();
    $('.grid_view').show();
});
  $('.nav-properties').addClass('accented-btn');  
});
</script>
@endsection
