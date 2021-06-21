@if ($mode === 'logged_in')

<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">    
<div class="panel panel-default">
<div class="panel-body" style="padding: 0px;">     
    <div class="row">
        <div class="col-md-12">
            <div clas="row">
                <div class="profile-sidebar">
                    <!-- SIDEBAR USERPIC -->
                    <div class="profile-userpic img-responsive" style='position: relative;'>
                        <img src='/assets/icons/change_profile.png' class='img-responsive avatar-placeholder'  />
                        @if(auth()->user()->profile_image === '')
                        <img src="/avatars/basic.jpg"  alt="" class='avatar img-responsive' />
                        @else
                        <img src='/avatars/{{ auth()->user()->profile_image }}' class='avatar img-responsive' />
                        @endif

                        <form action='/users/{{ auth()->user()->id }}/upload' method='POST' enctype="multipart/form-data" id='avatar-uploader-form'>
                            <input type='hidden' name='_token' value='{{ csrf_token() }}' />
                            <input type='file' name='image' id='profile_image' accept="image/*"  style='display: none'/>
                        </form>
                    </div>
                    <!-- END SIDEBAR USERPIC -->
                    <!-- SIDEBAR USER TITLE -->
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name">
                            {{ Auth::user()->full_name }}

                        </div>
                        <a class="btn btn-link" href="/dashboard/account" style="padding-top:0px">
                            <p class="text-info status">
                                {{ Auth::user()->status == '1' ? ' (Public) ' : ' (Private) ' }}
                                <i class="fa fa-pencil hidden" id="user-edit"></i></p>
                            </a>                    

                           <!--  {{--<div class="profile-usertitle-job">--}}
                            {{--Developer--}}
                            {{--</div>--}} -->
                        </div>
                        <div class="profile-usermenu">
                            <ul class="nav">
                                <li >
                                    <a href="/dashboard/overview">
                                        <i class="fa fa-home"></i>
                                        Overview 
                                    </a>                                                    
                                </li>                                                    
                                <li>
                                    <a href="/dashboard">
                                        <i class="fa fa-list-alt" aria-hidden="true"></i>
                                        Listings 
                                    </a>                                                           
                                </li>
                                <li>
                                    <a href="/dashboard/requirement">
                                        <i class="fa fa-info-circle" aria-hidden="true"></i>
                                        Requirements 
                                    </a>              
                                </li>
                    <!-- {{-- <li>
                        <div class="panel-heading">
                             <a class="panel-title collapsed" data-toggle="collapse" data-parent="#panel-465147" href="#post"><i class="fa fa-plus" style="padding-right:5px"></i>Post Property<span class="fa fa-caret-down pull-right"></span></a>
                        </div>
                        <div id="post" class="panel-collapse collapse">
                            <div>
                            <ul class="nav">
                                <li><a href="/dashboard/quick" style="margin-left:20px;">Quick Post</a></li>
                                <li><a href="/dashboard/property/wizard" style="margin-left:20px;">Regular Post</a></li>
                            </ul>
                            </div>
                        </div>
                    </li> --}} -->
                                <li>
                                    <a href="/dashboard/message">
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                        Message @if($newMessage>0)<span class='badge'>{{$newMessage}}</span>@endif
                                    </a>
                                </li>
                                <li>                                                    
                                    <div class="panel-heading">
                                        @if ($newAffiliate > 0)
                                        <a class="panel-title collapsed" data-toggle="collapse" data-parent="#panel-465147" href="#affiliate"><i class="fa fa-users" style="padding-right:5px"></i>Affiliates<span class='badge'>{{ $newAffiliate }}</span><span class="fa fa-caret-down pull-right"></span></a>
                                        @else
                                        <a class="panel-title collapsed" data-toggle="collapse" data-parent="#panel-465147" href="#affiliate"><i class="fa fa-users" style="padding-right:5px"></i>Affiliates<span class="fa fa-caret-down pull-right"></span></a>
                                        @endif
                                    </div>
                                    <div id="affiliate" class="panel-collapse collapse">
                                        <div>
                                            <ul class="nav">
                                                <li><a href="/groups" style="margin-left:20px;">Groups</a></li>
                                                <li>
                                                    @if ($newAffiliate > 0)
                                                    <a href="/dashboard/affiliates/new"  style="margin-left:20px;">
                                                        Affiliates <span class='badge'>{{ $newAffiliate }}</span>
                                                    </a>
                                                    @else
                                                    <a href="/dashboard/affiliates" style="margin-left:20px;">
                                                        Affiliates
                                                    </a>
                                                    @endif
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="/dashboard/reports">
                                        <i class="fa fa-bar-chart"></i>
                                        Reports 
                                    </a>
                                </li>
                                <li class="active">
                                    <a href="/dashboard/mapsummary">
                                        <i class="fa fa-map" aria-hidden="true"></i>
                                        Map Summary 
                                    </a>
                                </li>
                            </ul>
                        </div>
                    <!-- END MENU -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endif
