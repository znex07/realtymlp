<div class="panel panel-default">
  <div class="panel-heading">
    Subscription Status
    <span class="label label-warning pull-right"></span>
  </div>
  <div class="panel-body">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#sub" data-toggle="tab" aria-expanded="true">Subscription</a></li>
      <li class=""><a href="#exp" data-toggle="tab" aria-expanded="false">Expiration</a></li>      
    </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane fade active in" style="overflow-y:scroll;height: 312px" id="sub">
        @foreach($stats_log1 as $stats1)

          <div class="media">
            {{-- <a href="#" class="pull-left"><img width="50px" height="50px" src="" class="img-circle media-object" /></a> --}}
            <div class="media-body">
              <small class="pull-right"></small>
              <p class="message">
                You subscribe to {{$stats1->subscription_name}} subscription last {{$stats1->created_at->toDateString()}}. You have <strong>{{$stats1->expires_at->diffInDays()}} days</strong> remaining for this subscription
              </p>
              <small></small>
            </div>
          </div>

          <hr>

        @endforeach
      </div>

      <div class="tab-pane fade" style="overflow-y:scroll;height: 312px;margin-top:15px" id="exp">
        @foreach($stats_log as $stats)       
          <div class="media">
            {{-- <a href="#" class="pull-left"><img width="50px" height="50px" src="" class="img-circle media-object" /></a> --}}
            <div class="media-body">
              <blockquote>
              <small class="pull-right"></small>
              <strong><span class="label label-danger"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></span> Subscription Expired:</strong>
              <p class="message">

                Your Subscription {{$stats->subscription_name}} last {{$stats->created_at->toDateString()}} has already expired.
              </p>
              <small></small>
              </blockquote>
            </div>
          </div>
          <hr>
        @endforeach
      </div>
    </div>
    
  </div>
</div>