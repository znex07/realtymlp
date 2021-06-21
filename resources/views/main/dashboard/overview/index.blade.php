@extends('main.dashboard.overview.base')
@section('styles')
<style>
.nav-landing {
  display: none;
}
#sortable > div {
  border-top: 1px solid transparent;
}
.progress {
  height: 5px;
  border-radius: 5px;  
  margin-top: 10px;
  margin-bottom: 0px;
} 
.progress-bar-info {
  background-color: #23c6c8;
}
.progress-bar-success {
  background-color: #2c81ba;
}
.text-success {
  color: #2c81ba;
}
.text-warning {
  color: #f8ac59;
}
.progress-bar-warning {
  background-color: #f8ac59;
}
.message {
  font-size: 12px !important;
}
blockquote {
  font-size: 13px;
  margin-bottom: 0px;
}
</style>
@endsection
@section('content.inner')
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="col-md-12"> 
          <ul class="breadcrumb">      
            <li><a href="">Home</a></li>    
            <li class="active">Overview</li>
          </ul>
          <hr>
          <div class="row">
            <div class="col-md-3">
              <div class="panel panel-default">
                <div class="panel-body">
                  <div class="pull-right text-muted">
                    <i class="fa fa-home" aria-hidden="true" style="font-size:30px; opacity:.4;"></i>
                  </div>
                  <h3 class="text-primary" style="margin:0px !important;">
                    <strong>{{ $available_listings }}</strong>
                  </h3>
                  <small class="text-muted" style="text-transform: uppercase;">
                    Total Listings
                  </small>
                  <div class="progress">
                    <div class="progress-bar progress-bar-primary" style="width: 10%">
                      
                    </div>
                  </div>
                  <small class="text-muted pull-right">{{ $available_listings }} / {{ $total_listings }}</small>
                </div>              
              </div>
             </div>
             <div class="col-md-3">
              <div class="panel panel-default">
                <div class="panel-body">
                  <div class="pull-right text-muted">
                    <i class="fa fa-newspaper-o" aria-hidden="true" style="font-size:30px; opacity:.4;"></i>
                  </div>
                  <h3 class="text-info" style="margin:0px !important;">
                    <strong>{{ $avail_requirements }}</strong>
                  </h3>
                  <small class="text-muted" style="text-transform: uppercase;">
                    Total Requirements
                  </small>
                  <div class="progress">
                    <div class="progress-bar progress-bar-info" style="width: 10%">
                      
                    </div>
                  </div>
                  <small class="text-muted pull-right">{{ $avail_requirements }} / {{ $total_requirements }}</small>
                </div>              
              </div>
             </div>
             <div class="col-md-3">
              <div class="panel panel-default">
                <div class="panel-body">
                  <div class="pull-right text-muted">
                    <i class="fa fa-share-alt" aria-hidden="true" style="font-size:30px; opacity:.4;"></i>
                  </div>
                  <h3 class="text-success" style="margin:0px !important;">
                    <strong>{{ $shared_to_me }}</strong>
                  </h3>
                  <small class="text-muted" style="text-transform: uppercase;">
                    Total Received
                  </small>
                  <div class="progress">
                    <div class="progress-bar progress-bar-success asd" style="width: 10%">
                      
                    </div>
                  </div>
                  <small class="text-muted pull-right">{{ $shared_to_me }} / {{  $total_listings }}</small>
                </div>              
              </div>
             </div>
             <div class="col-md-3">
              <div class="panel panel-default">
                <div class="panel-body">
                  <div class="pull-right text-muted">
                    <i class="fa fa-users" aria-hidden="true" style="font-size:30px; opacity:.4;"></i>
                  </div>
                  <h3 class="text-warning" style="margin:0px !important;">
                    <strong>{{ $total_aff}}</strong>
                  </h3>
                  <small class="text-muted" style="text-transform: uppercase;">
                    Total Affiliate
                  </small>
                  <div class="progress">
                    <div class="progress-bar progress-bar-warning" style="width: 10%">
                      
                    </div>
                  </div>
                  <small class="text-muted pull-right">{{ $total_aff }} / {{ $total_listings }}</small>
                </div>              
              </div>
             </div>
            {{-- <div class="col-md-4">
              <div class="panel panel-default">
                <div class="panel-heading">
                  Listings
                  <span class="label label-default pull-right">{{ $subscription_type_name }}</span>
                </div>
                <div class="panel-body">
                  <h1 class="text-center">{{ $available_listings }} / {{ $total_listings }}</h1>
                  <small>Total Listings</small>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="panel panel-default">
                <div class="panel-heading">
                  Shared
                  <span class="label label-default pull-right">{{ $subscription_type_name }}</span>
                </div>
                <div class="panel-body">
                  <h1 class="text-center">{{ $shared_to_me }} / {{ $total_affiliates }}</h1>
                  <small>Total Listings Received for share</small>
                </div>
              </div>            
            </div>
            <div class="col-md-4">
              <div class="panel panel-default">
                <div class="panel-heading">
                  Affiliates
                  <span class="label label-default pull-right">{{ $subscription_type_name }}</span>
                </div>
                <div class="panel-body">
                  <h1 class="text-center">{{ $available_affiliate }} / {{ $total_affiliates }}</h1>
                  <small>Total Affiliates</small>
                </div>
              </div>            
            </div> --}}
          </div>
          <div id="sortable" class="row">   
            <div class="col-md-6">
              <div class="row">
                <div class="col-sm-12 col-xs-12">
                 @include('main.dashboard.overview.partials.listing')
                </div>
              </div>
              <div class="row">
                {{--<div class="col-sm-12 col-xs-12">--}}
                  {{--@include('main.dashboard.overview.partials.requirements')--}}
                {{--</div>--}}
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-sm-12 col-xs-12">
                  @include('main.dashboard.overview.partials.messages')
                </div>
              </div>
              <div class="row">
                {{--<div class="col-sm-12 col-xs-12">--}}
                  {{--@include('main.dashboard.overview.partials.affiliate')--}}
                {{--</div>--}}
              </div>
            </div>
          </div>
        </div>  
      </div>    
    </div>   
  </div>
</div>
@endsection	
@section('scripts')
<script>
$(function () {
  $("#sortable").sortable();
  $("#sortable").disableSelection();
});


</script>
<script>
  $(document).ready(function(){  
  $(".progress").css("width", "50");
});
</script>
@endsection