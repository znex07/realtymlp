<style>
.table > tbody > tr > td {
   vertical-align: middle;
}
.aff-image {
    height: 50px !important;
}
.nav-right {
   padding-right:0px;

}

.nav-right li {
  float:right;
}

</style>
<div class="panel panel-default">
    <div class="panel-body">     
     <ul class="breadcrumb">
      <li><a href="/dashboard/overview">Overview</a></li>
      <li class="active">Affiliates</li>                          
  </ul>
  <hr>
  <div class='tabbable-panel'>
    <div class='tabbable-line'>
        <ul class='nav nav-tabs aff-tabs nav-right'>
            <li class='{{ $current === 'index' ? 'active' : '' }}'>
                <a href='/dashboard/affiliates'>
                    <span class='fa fa-users' style='padding-right: 10px;'></span> Affiliates 
                </a>
            </li>
            <li class='{{ $current === 'new' ? 'active' : '' }}'>
                <a href='/dashboard/affiliates/new'>
                    <span class='fa fa-user-plus' style='padding-left: 10px;'></span> Pending <span class="badge badge-danger">{{ $count['new'] }}</span>
                </a>
            </li>
            <div class=''>
                <button class='btn btn-sm btn-primary' id='search-aff-modal-btn'><span class='fa fa-plus'></span> Add Affiliate</button>
            </div>
        </ul>
        <div class='tab-content aff-list'>
            <div class='tab-pane active'>
                @if(!auth()->user()->confirmedAffiliates()->count() && ($current !== 'new'))
                @include('main.dashboard.affiliates.partials.getting_started')
                @endif

                <div class='row'>
                    <input type="hidden" id="_token" name="_token" value="{{csrf_token()}}">
                    <div class='col-md-12'>
                        <table class="table table-striped table-hover hidden-xs" id="tableAff">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Date</th>
                                    <th>Email</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($affiliates as $aff)
                                <tr>
                                    <td><div>
                                        <a href="/profile/{{ $aff->user_code }}/{{ str_slug($aff->full_name)}}">
                                            <img src='/avatars/{{ $aff->profile_image }}' class='img-circle img-responsive aff-image'/>
                                        </a>
                                    </div></td>
                                    <td class='aff-name'><a href="/profile/{{ $aff->user_code }}/{{ str_slug($aff->full_name)}}">{{ $aff->user_fname }}</a></td>
                                    <td class='aff-name'><a href="/profile/{{ $aff->user_code }}/{{ str_slug($aff->full_name)}}">{{ $aff->user_lname }}</a></td>
                                    <td>
                                        {{ $aff->updated_at }}
                                    </td>
                                    <td>{{ $aff->email }}</td>
                                    <td>@if(!$aff->pivot->is_confirmed)
                                        <div class='aff-confirmation-box text-right'>
                                            <form action='/users/affiliates/confirm' method='POST'>
                                                <input type='hidden' name='affiliate_id' value='{{ $aff->id }}' />
                                                <input type='hidden' name='_token' value='{{ csrf_token() }}' />
                                                <button class='btn btn-xs btn-primary' name="btn_type" value="accept">Accept</button>
                                                <button class='btn btn-xs btn-danger' name="btn_type" value="reject">Reject</button>
                                                
                                            </form>
                                        </div>
                                        @else
                                        <div class="btn-group">                    
                                          <a href="#" class="btn-sm btn btn-default dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog" aria-hidden="true"></i> </a>
                                          <ul class="dropdown-menu">
                                            <li><a href="/profile/{{ $aff->user_code }}/{{ str_slug($aff->full_name)}}">View Profile</a></li>
                                            <li><a href="/dashboard/affiliates/shared/{{ str_slug($aff->full_name) }}/{{ $aff->id }}">View Shared Listings</a></li>
                                            <li><a href="#">Remove as Affiliate</a></li>  
                                        </ul>
                                    </div>
                                       {{--  <div class="row">
                                            <div class="col-md-12">
                                                <a class="btn btn-primary btn-xs" href="/dashboard/affiliates/shared/{{ str_slug($aff->full_name) }}/{{ $aff->id }}"><span class="fa fa-eye" style="padding-right:10px;"></span>View Shared Listings</a>
                                             <button class="btn btn-success btn-xs"><span class="fa fa-envelope" style="padding-right:10px;"></span>Message Affiliate</button>
                                            <button class="btn btn-danger remove_aff btn-xs" data-id="{{ $aff->id }}"><span class="fa fa-remove" style="padding-right:10px;"></span>Remove Affiliate</button>
                                        </div>
                                    </div> --}}
                                    @endif</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                        
                        @foreach($affiliates as $aff)
                        <div class="panel panel-default visible-xs">
                          <div class="panel-body">
                             <div class="media">
                                <a class="pull-left" href="/profile/{{ $aff->user_code }}/{{ str_slug($aff->full_name)}}">
                                    <img src='/avatars/{{ $aff->profile_image }}' class='media-object img-circle img-responsive aff-image'/>
                                </a>                            
                                <div class="media-body">
                                    <p class="media-heading">
                                        {{ $aff->user_fname }} {{ $aff->user_lname }}
                                    </p>
                                    @if(!$aff->pivot->is_confirmed)
                                    <div class='aff-confirmation-box text-right'>
                                        <form action='/users/affiliates/confirm' method='POST'>
                                            <input type='hidden' name='affiliate_id' value='{{ $aff->id }}' />
                                            <input type='hidden' name='_token' value='{{ csrf_token() }}' />
                                            <button class='btn btn-primary' name="btn_type" value="accept">Accept</button>
                                            <button class='btn btn-danger' name="btn_type" value="reject">Reject</button>
                                        </form>
                                    </div>
                                    @else
                                    <div class="row">
                                        <div class="col-md-12">
                                            <a class="btn btn-primary btn-xs" href="/dashboard/affiliates/shared/{{ str_slug($aff->full_name) }}/{{ $aff->id }}"><span class="fa fa-eye" style="padding-right:10px;"></span>View Shared Listings</a>
                                            {{-- <button class="btn btn-success btn-xs"><span class="fa fa-envelope" style="padding-right:10px;"></span>Message Affiliate</button>
                                            <button class="btn btn-danger remove_aff btn-xs" data-id="{{ $aff->id }}"><span class="fa fa-remove" style="padding-right:10px;"></span>Remove Affiliate</button>--}}
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach



                        {{-- <table id="example" class=" table display" cellspacing="0" width="100%">
                          <thead>
                            <tr>
                                <th></th>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th> Date added</th>
                                <th>Email</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($affiliates as $aff)
                            <tr>
                                <td><div>
                                <a href="/profile/{{ $aff->user_code }}/{{ str_slug($aff->full_name)}}">
                                    <img src='/avatars/{{ $aff->profile_image }}' class='img-circle img-responsive aff-image'/>
                                </a>
                                </div></td>
                                <td class='aff-name'><a href="/profile/{{ $aff->user_code }}/{{ str_slug($aff->full_name)}}">{{ $aff->user_fname }}</a></td>
                                <td class='aff-name'><a href="/profile/{{ $aff->user_code }}/{{ str_slug($aff->full_name)}}">{{ $aff->user_lname }}</a></td>
                                <td> </td>
                                <td>{{ $aff->email  }}</td>
                                <td>@if(!$aff->pivot->is_confirmed)
                                    <div class='aff-confirmation-box text-right'>
                                        <form action='/users/affiliates/confirm' method='POST'>
                                            <input type='hidden' name='affiliate_id' value='{{ $aff->id }}' />
                                            <input type='hidden' name='_token' value='{{ csrf_token() }}' />
                                            <button class='btn btn-danger' name="btn_type" value="reject">Reject</button>
                                            <button class='btn btn-success' name="btn_type" value="accept">Accept Invitation</button>
                                        </form>
                                    </div>
                                    @else
                                    <div class="row">
                                        <div class="col-md-12">
                                            <a class="btn btn-info btn-xs" href="/dashboard/affiliates/shared/{{ str_slug($aff->full_name) }}/{{ $aff->id }}"><span class="fa fa-eye" style="padding-right:10px;"></span>View Shared Listings</a>
                                            {{-- <button class="btn btn-success btn-xs"><span class="fa fa-envelope" style="padding-right:10px;"></span>Message Affiliate</button>
                                            <button class="btn btn-danger remove_aff btn-xs" data-id="{{ $aff->id }}"><span class="fa fa-remove" style="padding-right:10px;"></span>Remove Affiliate</button>
                                        </div>
                                    </div>
                                    @endif</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table> --}}
                        {{-- <div class='aff-card-container'>
                            <div class='aff-card row'>
                                <div class='col-xs-2'>
                                    <img src='/avatars/{{ $aff->profile_image }}' class='img-circle img-responsive aff-image'/>
                                 </div>
                                 <div class='col-xs-10'>
                                    <h5 class='aff-name'>{{ $aff->full_name }}
                                        @if ($aff->pivot->is_confirmed)
                                        | <span style='font-size: 12px; color: #000; font-weight: 300;'>{{ $aff->email  }}</span>
                                        @endif
                                    </h5>

                                    @if(!$aff->pivot->is_confirmed)
                                        <div class='aff-confirmation-box text-right'>
                                            <form action='/users/affiliates/confirm' method='POST'>
                                                <input type='hidden' name='affiliate_id' value='{{ $aff->id }}' />
                                                <input type='hidden' name='_token' value='{{ csrf_token() }}' />
                                                <button class='btn btn-danger' name="btn_type" value="reject">Reject</button>
                                                <button class='btn btn-success' name="btn_type" value="accept">Accept Invitation</button>
                                            </form>
                                        </div>
                                    @else
                                        <div class="row" style="padding-top:10px;">
                                            <div class="col-md-12">
                                                <a class="btn btn-xs btn-info" href="/dashboard/affiliates/shared/{{ str_slug($aff->full_name) }}/{{ $aff->id }}"><span class="fa fa-eye" style="padding-right:10px;"></span>View Shared Listings</a>
                                                <button class="btn btn-success btn-xs"><span class="fa fa-envelope" style="padding-right:10px;"></span>Message Affiliate</button>
                                                <button class="btn btn-danger btn-xs remove_aff" data-id="{{ $aff->id }}"><span class="fa fa-remove" style="padding-right:10px;"></span>Remove Affiliate</button>
                                            </div>
                                        </div>
                                    @endif
                                 </div>
                            </div>
                        </div>
                    </div>  --}}

                </div>
            </div>
        </div>
    </div>

</div>
</div>
</div>

</div>

