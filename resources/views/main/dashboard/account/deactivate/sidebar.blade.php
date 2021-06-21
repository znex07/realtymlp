<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
    <div class="panel panel-default">
        <div class="panel-body" style="padding: 0px;">  
            <div class="row">
                <div class="col-md-12">
                    <div class="profile-sidebar">
                        <!-- SIDEBAR USERPIC -->
                        <div class="profile-userpic" style='position: relative;'>
                            <img src='/assets/icons/change_profile.png' class='img-responsive avatar-placeholder' />
                            @if(auth()->user()->profile_image === '')
                            <img src="/avatars/basic.jpg"  alt="" class='avatar'/>
                            @else
                            <img src='/avatars/{{ auth()->user()->profile_image }}' class='avatar' />
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
                                <p class="text-muted status">
                                    {{ Auth::user()->status == '1' ? ' (Public) ' : ' (Private) ' }}
                                    <i class="fa fa-pencil hidden" id="user-edit"></i></p>
                                </a>
                                {{--<div class="profile-usertitle-job">--}}
                                {{--Developer--}}
                                {{--</div>--}}
                            </div>
                            <!-- END SIDEBAR USER TITLE -->
                            <!-- SIDEBAR BUTTONS -->
                            {{--<div class="profile-userbuttons">--}}
                            {{--<button type="button" class="btn btn-success btn-sm">Follow</button>--}}
                            {{--<button type="button" class="btn btn-danger btn-sm">Message</button>--}}
                            {{--</div>--}}
                            <!-- END SIDEBAR BUTTONS -->
                            <!-- SIDEBAR MENU -->
                            <div class="profile-usermenu">
                                <ul class="nav">
                                    <li>
                                        <a href="/dashboard/account">
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                            My Profile 
                                        </a>                                    
                                    </li>
                                    <li>
                                        <a href="/dashboard/account/password">
                                            <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                                            Change Password
                                        </a>
                                    </li>
                            {{-- <li>
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

                            </li> --}}

                            <li>
                                <a href="/dashboard/account/ledger">
                                    <i class="fa fa-table" aria-hidden="true"></i>
                                    Transaction History 
                                </a>                                                           
                            </li>
                            <li>
                                <a href="/dashboard/account/upgrade">
                                    <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                                    Upgrade Account 
                                </a>                                                           
                            </li>
                            <li class="active">
                                <a href="/dashboard/account/deactivate/password">
                                    <i class="fa fa-ban" aria-hidden="true"></i>
                                    Deactivate Account 
                                </a>                                                           
                            </li>
                            <li>
                                <a href="/dashboard" class="text-center">
                                   <strong class="text-center"><i class="fa fa-chevron-left" aria-hidden="true"></i> Back to Dashboard</strong>
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
