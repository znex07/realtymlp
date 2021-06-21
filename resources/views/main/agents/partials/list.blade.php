<style>
    body {
        margin-top: 70px !important;
    }
 .agent p {
  margin: 0 0 0px;
 }
 .agent-fullname {
  font-size: 16px !important;
 }
 .agent-headline {
  font-size: 14px;
  font-weight: 400;
  color: #888888;
 }
 .muted-label {
  font-size: 12px !important;
  font-weight: bold !important;
  padding-left: 12px; 
  text-transform: uppercase;
 }
 .img-agent {
  display: block;
  width: 100%;
  height: auto;
 }
 </style>
 <div class="row">
  <div class="col-md-12">
    <div class="col-md-6 pull-left">

  @if(auth()->check())
        <form method="get" action="/agents">
            <div class="input-group">
                <select class="form-control" name="nav_search" id="nav_search">
                    <option value="default" default selected hidden>Search Agent </option>
                @foreach($members as $membs)
                        <option value="{{$membs->id}}">{{$membs->full_name}}</option>
                    @endforeach
                </select>
                    <span class="input-group-btn">
                        <button type="submit" class="btn"><span class="fui-search"></span></button>
                     </span>
            </div>
        </form>
      @endif
      @if(!auth()->check())
          <form method="get" action="/agents/public">
              <div class="input-group">
                  <select class="form-control" name="nav_search" id="nav_search">
                      <option value="default" default selected hidden>Search Agent </option>
                      @foreach($member_search as $membs)
                          <option value="{{$membs->id}}">{{$membs->full_name}}</option>
                      @endforeach
                  </select>
                    <span class="input-group-btn">
                        <button type="submit" class="btn"><span class="fui-search"></span></button>
                     </span>
              </div>
          </form>
      @endif
    </div>
  </div>
</div>
      @if ($members->count())
        <div class="member-container agent">
          @foreach($members as $member)
            <div class="{{ auth()->check() ? 'col-md-6' : 'col-md-4'}}">
              <div class="panel panel-default">
                <div class="panel-body" style="padding:20px;">                  
                  <div class="col-md-4 col-xs-4 text-center">
                    <a href="/profile/{{ $member->user_code }}/{{ str_slug($member->full_name) }}">
                      @if($member->profile_image === '')
                        <img src="/avatars/basic.jpg" class='img-agent avatar-rounded img-responsive'/>
                      @else
                        <img src='/avatars/{{ $member->profile_image }}' class='img-agent avatar-rounded img-responsive' />
                      @endif
                    </a>
                    <div class="row">
                      <p style="margin-top:5px;font-weight:600 !important;font-size:14px">{{ $member->headline }}</p>
                    </div>
                  </div>
                  <div class="col-md-8 col-xs-8">
                    <h3 class="contact-name"><a href="/profile/{{ $member->user_code }}/{{ str_slug($member->full_name) }}">{{ $member->full_name }}</a>
                    </h3>
                      
                      <p class="agent-loc">
                        @if($member->current_address != '')
                        <i class="fa fa-map-marker" aria-hidden="true"></i> {{$member->current_address}}
                        @endif
                      </p>
                      {{-- <p style="font-size:13px;margin-bottom:0px">Managing Partner in a Digital Agency, Real Estate Broker and Appraiser</p> --}}
                      <div class="address">
                        <p class="text-bold">Contact</p>                
                        <p>{{ $member->user_phone }}</p>
                        <p>{{ $member->email }}</p>
                      </div>
                      <div class="btn-group" role="group">
                        <a href="/dashboard/message" type="button" class="btn btn-xs btn-secondary"><i class="fa fa-edit"></i> Message </a>
                        <button type="button" class="btn btn-xs btn-secondary"><i class="fa fa-envelope"></i> Email</button>
                      </div>
                  </div>
                  </div>                  
                  {{-- @if (!$member->pivot)
                    <div class="btn-group btn-group-justified" role="group" aria-label="...">
                      <div class="btn-group" role="group">
                        <button type="{{ auth()->check() ? 'button' : 'submit' }}" data-trigger='add-affiliate' data-id='{{ $member->id }}' class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus"></i> Add Affiliate</button>
                      </div>
                    </div>
                  @else
                    @if ($member->pivot->is_confirmed)
                      <div class="btn-group btn-group-justified" role="group" aria-label="...">
                        <div class="btn-group" role="group">
                          <button type="button" data-trigger='remove-affiliate' data-id='{{ $member->id }}' class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove"></i> Remove Affiliate</button>
                        </div>
                      </div>
                    @elseif (!$member->pivot->is_confirmed && $member->pivot->is_confirmable)
                      <div class="btn-group btn-group-justified" role="group" aria-label="...">
                        <div class="btn-group" role="group">
                          <button type="button" data-trigger='accept-request' data-id='{{ $member->id }}' class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-ok"></i> Accept Request</button>
                        </div>
                        <div class="btn-group" role="group">
                          <button type="button" data-trigger='reject-request' data-id='{{ $member->id }}' class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove"></i> Reject Request</button>
                        </div>
                      </div>
                    @elseif (!$member->pivot->is_confirmed && !$member->pivot->is_confirmable)
                      <div class="btn-group btn-group-justified" role="group" aria-label="...">
                        <div class="btn-group" role="group">
                          <button type="button" data-trigger='cancel-request' data-id='{{ $member->id }}' class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-ban-circle"></i> Cancel Request</button>
                        </div>
                      </div>
                    @endif
                  @endif --}}                
                </div>
              </div>

              {{-- <div class="col-md-4 col-sm-6">
                <div class="panel panel-default text-center">
                  <div class="panel-body" style="padding:20px;">                  

                    <a href="/profile/{{ $member->user_code }}/{{ str_slug($member->full_name) }}">
                      @if($member->profile_image === '')
                      <img src="/avatars/basic.jpg"  style="width:80px;height:80px;" class='avatar-rounded img-responsive'/>
                      @else
                      <img src='/avatars/{{ $member->profile_image }}' style="width:80px;height:80px;" class='avatar-rounded img-responsive' />
                      @endif
                    </a>                   

                    <h3 class="contact-name"><a href="/profile/{{ $member->user_code }}/{{ str_slug($member->full_name) }}">{{ $member->full_name }}</a><h3>
                      <div class="row">
                        <p style="margin-top:5px;font-weight:600 !important;font-size:14px">{{ $member->headline }}</p>
                      </div>
                      <p>
                        <i class="fa fa-map-marker" aria-hidden="true"></i> {{$member->current_address}}
                      </p>
                      
                      <div class="address">
                        <p class="text-bold">Contact</p>                
                        <p>{{ $member->user_phone }}</p>
                        <p>{{ $member->email }}</p>
                      </div>
                      <div class="btn-group" role="group">
                        <button type="button" class="btn btn-xs btn-secondary"><i class="fa fa-edit"></i> Message </button>
                        <button type="button" class="btn btn-xs btn-secondary"><i class="fa fa-envelope"></i> Email</button>                        
                      </div>
                    </div>
                  </div>   
                </div> --}}
            @endforeach

          </div>
          @endif
@section('scripts')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src='/assets/js/agents.js'></script>
    <script type='text/javascript'>
        $('.nav-agents').addClass('accented-btn');
        // var csrf_token = $('[name=_token]').val();
        var length = $('.member-container').length;
        if (length) {
            agent.init();
        }
        $(function () {
                var user_agent = $('#user_agent').val();
            console.log(user_agent);
            var availableTags = JSON.parse(user_agent);
            $( "#navbarInput-01" ).autocomplete({
                source: availableTags,
                minLength: 4,
                autoFocus: true
            });
        });
    </script>
@endsection

