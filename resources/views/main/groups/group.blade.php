@extends('main.dashboard.base')
@section('styles')

<link rel="stylesheet" href="/assets/css/group.css"/>
<style>
.nav-landing {
        display: none;
    }
.groups li { 
    border-bottom: 2px solid #eee;
}
.group-title {
    font-size: 12px;
    
}
.member {
  display: inline-block;
  margin-top: 25px;
  position: relative;
}

.member img {
  display: block;
  max-width:100%;
}

.member .overlay {
  position: absolute;
  top:0;
  left:0;
  width:100%;
  height:100%;
  background-color: rgba(0,0,0,0.25);
  color:white;
}
.member-thumb {
    margin-bottom: 20px;
}
.member-info {
    padding: 5px 0px;
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
.desc {
    font-size: 14px;
    font-weight: 500;
    color: #777;
}
.btn-sm {
    height: 35px !important;
}
.member-title {
    font-size: 14px;
}
.btn-invite {
    padding: 10px 0px;
}
.list_view {
    display: inherit;
}
.grid_view {
    display: none;
}
.posted-by {
    padding-right:15px;
    font-size:13px;
    font-weight:500;
    font-style: italic;
}
.nav-landing {
    display: none;
}
.public-button {
    display: none;
}
.well-sm {
    padding: 3px 10px !important;
}
p {
    margin: 0px;
}
</style>
@endsection
@section('content')
<div class='container' style='margin-top: 70px ;'>
    <div class="row row-offcanvas row-offcanvas-left">
    	@include('main.dashboard.affiliates.sidebar')
        	@yield('content.inner')
        	<div class="col-sm-9 col-xs-12 content">
        		<div class="panel panel-default">
        			<div class="panel-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <h2>{{ $group->group_title }}</h2>
                            </div>
                            <div class="col-sm-6">
                                <div class="btn-group pull-right">                                    
                                  <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><i class="fa fa-gear"></i></a>
                                  <ul class="dropdown-menu">
                                    <li><a href="/groups/member">Members</a></li>
                                    <li><a href="#">Leave Group</a></li>                                    
                                </ul>
                            </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <hr>
                                @include('main.groups.sort-group')
                                <p class="text-muted group-title">LISTINGS</p>
                            </div>
                            <div style="padding-top: 20px;">
                                <div class="col-sm-12">
                                    {{-- */ $group_id = $group->id /* --}}
                                    @foreach($group->properties as $property)
                                    <hr>                            
                                    <div class="row">
                                        @include('main.dashboard.listings.partial.property')
                                    </div>              
                                    @endforeach                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-sm-3 col-xs-12">
                <div class="panel panel-default">
                <div class="panel-body">
                    <p class="member-title">ADD MEMBER</p>
                    <div class="form-group">

                        <div class="input-group">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-sm"><span class="fa fa-plus"></span></button>
                            </span>
                            <input class="form-control input-sm" placeholder="Enter Name or Email">
                            
                        </div>
                    </div>
                    <hr>
                    <div>
                        <a href="#" class="pull-right btn btn-link member-info"><p>{{ $group->members->count() }} Members</a>
                        <p class="member-title">MEMBERS</p>                
                    </div>
                    
                    <div class="member-thumb">
                        @if ($group->members->count())
                            @foreach($group->members->slice(0,7) as $member)
                                <a href='/profile/{{ $member->user_code }}/{{ str_slug($member->full_name) }}'>
                                    <img src="/avatars/{{ $member->profile_image }}" alt="" width="30px"/>
                                </a>
                            @endforeach
                            @if ($group->members->count() > 7)
                                <span>+ {{ ($group->members->count() - 7 ) }}</span>
                            @endif
                        @endif
                        <!-- <span>+88</span> -->
                        
                    </div>
                    <!-- <a href="#" class="btn-invite btn btn-link">Invite by Email</a> -->
                    <hr>            
                    <p class="member-title">ABOUT THIS GROUP</p>
                    
                    <p class="desc">
                        {{ $group->group_description }}
                    </p>
                </div>
                </div>        
            </div> --}}
        @endsection
    </div>
    @section('scripts')
    <script>
    $('.nav-dashboard').addClass('accented-btn');
    </script>
    @endsection