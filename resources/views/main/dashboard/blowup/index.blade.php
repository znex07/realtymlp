@extends('main.partials.base')
<style>
    p {
        font-size: 13px !important;
    }

    .thumb-title p {
        font-size: 13px;
        font-weight: 500;
        margin-bottom: 1px;
    }

    .thumb-title h5 {
        margin-bottom: 5px;
    }

    .thumb-title .text-muted {
        color: #888;
    }

    .b-detail {
        font-weight: 700;
    }

    td {
        font-size: 14px;
    }

    .table-detail {
        margin-bottom: 0px !important;
        width: 100px;
    }

    .p-type .label {
        font-size: 12px;
        font-weight: 500;
        line-height: 2;
    }

    .glyphicon {
        padding-top: 5px;
    }

    .note p {
        font-size: 14px;
        font-weight: 500;
        margin-bottom: 5px;
    }

    small {
        font-weight: 400;
        color: #888;
    }

    .contact-name a {
        color: #34495e !important;
        font-size: 17px;
    }

    .avatar {
        width: 50px;
        height: 50px;
        background-size: cover;
        border-radius: 25px;
        -webkit-border-radius: 25px;
        -moz-border-radius: 25px;
        cursor: pointer;;
        margin-left: 15px;
    }

    .list-type {
        font-size: 14px !important;
        font-weight: 600 !important;
    }

    .price-list .panel-body {
        padding: 0px 15px !important;
    }

    .price-list {
        width: 100%;

        padding: 0px 20px;
        display: inline-block;
        width: auto;
        border: 1px solid #dddddd;
        border-radius: 4px;
        -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
    }

    .price-list h6 {
        margin-top: 5px;
        margin-bottom: 0px;
    }

    .thumb-title hr {
        margin-top: 5px;
    }

    @media screen and (min-width: 768px) {
        .affix {
            position: none;
        }

    }

    .contact p {
        margin-bottom: 0px !important;
    }

    pre {
        font-family: inherit !important;
        background-color: inherit !important;
        border: inherit !important;
    }
    .property-id p {
        margin-bottom: 3px;
    }
    .table>tbody>tr:first-child>td {
        border-top: none;
    }
    .pp {
        margin-left: 5px;
    }
    h6 {
        font-size: 16px !important;
    }
</style>
@section('content')



    <div class="container" style="margin-top:70px">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-9">
                    @if($property->property_status == 1)
                        @include('main.dashboard.blowup.property')
                    @endif
                    @if($property->property_status == 2)
                        @include(('main.dashboard.blowup.property'))
                    @endif
                    @if($property->property_status == 3 || $property->property_status == 4)
                        @include('main.dashboard.blowup.propertyquick')
                    @endif
                </div>
                @if(auth()->check())
                    @if(auth()->user()->full_name != $property->user->full_name)
                        <div class="col-md-3 col-sm-12 col-xs-12"
                             style="{{ auth()->user() ? auth()->user()->user_code == $property->user->user_code ? '' : '' : '' }}">

                            <div class="panel panel-default">
                                <div class="panel-heading">Contact Agent/Broker</div>
                                <div class="panel-body">
                                    <div class="media" style="margin-bottom:20px;">
                                        <a class="pull-left"
                                           href="/profile/{{ $property->user->user_code }}/{{ str_slug($property->user->full_name) }}"
                                           style="padding-left: 5px;">
                                            @if($property->user->profile_image === '')
                                                <img style="background-image:url(/avatars/basic.jpg);" alt="" class='avatar'/>
                                            @else
                                                <img style="background-image:url(/avatars/{{ $property->user->profile_image }});"
                                                     alt="" class='avatar'/>
                                            @endif
                                        </a>
                                        <div class="media-body">

                                            {{--                                    <small>{{ $property->cat_ownership_type->description }}</small>--}}
                                            {{--<small></small>--}}

                                            <h6>
                                                <a href='/profile/{{ $property->user->user_code }}/{{ str_slug($property->user->full_name) }}'>{{ $property->user->full_name}}</a>
                                                <!-- {{ $property->user->full_name }} -->
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="form-group contact">
                                        @if($property->user->user_mobile != '' && $property->user->user_phone != '')
                                            <p id="show_contact" class="text-info" style="font-size:14px; cursor:pointer"><span
                                                        class="fa fa-phone" style="padding-right:10px;"></span>Show Contact
                                                Number</p>
                                            <div id="phone_number" style="font-size:12px;padding-left:20px;display:none;">
                                                @if($property->user->user_mobile != '')
                                                    <p class="weak-title">Mobile No: {{ $property->user->user_mobile }}</p>
                                                @endif
                                                @if($property->user->user_phone != '')
                                                    <p class="weak-title">Phone No: {{ $property->user->user_phone }}</p>
                                                @endif
                                            </div>
                                        @endif
                                        <p id="show_email" class="text-info" style="font-size:14px; cursor:pointer">
                                            <span class="fa fa-envelope" style="padding-right:10px;"></span>Show Email Address
                                        </p>
                                        <div id="email_address" style="font-size:12px;display:none;padding-left:20px">
                                            <p class="weak-title">{{ $property->user->email }}</p>
                                        </div>
                                    </div>
                                    <form class="form-vertical property-card" method="post" action="/blowup/message">
                                        <input type="hidden" name="inquirer" id="inquirer"
                                               value="{{ auth()->check() ? auth()->user()->fullname : '' }}"/>
                                        <input type="hidden" name="viewer" id="viewer" value="{{ $viewer }}">
                                        <h5 class="secondary weak-title">ASK ABOUT THE PROPERTY</h5>
                                        <input type="hidden" id="_token" name="_token" value="{{csrf_token()}}">
                                        @if(session()->get('message.success'))
                                            <div class='alert alert-success'>
                                                {{ session()->get('message.success') }}
                                            </div>
                                        @endif
                                        @if(session()->get('message.danger'))
                                            <div class='alert alert-danger'>
                                                {{ session()->get('message.danger') }}
                                            </div>
                                        @endif
                                        <div class="form-group hidden">
                                            <div class="input-group">
                                                <input type="text" name="from_id" class="form-control"
                                                       value="{{ auth()->check()  ? 'auth()->user()->id' : '' }}">
                                                <span class="input-group-addon">*</span>
                                            </div>
                                        </div>
                                        <div class="form-group hidden">
                                            <div class="input-group">
                                                <input type="text" name="to_id" class="form-control"
                                                       value='{{ $property->user_id }}'>
                                                <span class="input-group-addon">*</span>
                                            </div>
                                        </div>
                                        <div class="form-group hidden">
                                            <div class="input-group">
                                                <input type="text" name="property_code" class="form-control"
                                                       value='{{ $property->property_code }}'>
                                                <span class="input-group-addon">*</span>
                                            </div>
                                        </div>
                                        <div class="form-group hidden">
                                            <div class="input-group">
                                                <input type="text" name="property_id" class="form-control"
                                                       value='{{ $property->id }}'>
                                                <span class="input-group-addon">*</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label style="font-size: 13px;">Fullname (required)</label>
                                            <div>
                                                <input type="text" id="fullname" name="fullname" class="input-sm form-control"
                                                       {{ auth()->check() ? 'readonly':'' }} placeholder="Fullname"
                                                       value="{{ auth()->user() ? auth()->user()->fullname : '' }}">
                                                {{-- <span class="input-group-addon">*</span> --}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label style="font-size: 13px;">Email Address (required)</label>
                                            <div>
                                                <input type="email" name="email_address" class="input-sm form-control"
                                                       {{ auth()->check() ? 'readonly':'' }}  placeholder="Email Address"
                                                       value="{{ auth()->user() ? auth()->user()->email : '' }}">
                                                {{-- <span class="input-group-addon">*</span> --}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label style="font-size: 13px;">Message</label>
                                            <div>
                                <textarea name="message" class="form-control" placeholder="Message"
                                          style="font-size:13px; width:100%; height:125px; resize:none">Please contact me regarding your property ({{$property->property_title }})</textarea>
                                                {{-- <span class="input-group-addon">*</span> --}}
                                            </div>
                                        </div>
                                        <input class="hidden" type="text" value="{{ $property->property_code }}"
                                               id="property_code">
                                        <div class="form-group">
                                            <button name="send" id="send" type="submit" class="btn btn-info btn-block">
                                                <span class="fa fa-envelope" style="padding-right:10px;"></span>Send Message
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="cmd_edit" id="btn_edit ">
                            @if($property->property_status == '3' || $property->property_status == 4)
                                <a href="/dashboard/property/quickpost/edit/{{ str_slug('asd  ') }}/{{ $property->id }}" data-command="edit" class="btn btn-primary">
                                    <i class="fa fa-edit"></i> Edit this Listing
                                </a>
                            @else
                                <a href="/dashboard/edit/{{ str_slug($property->property_title) }}/{{ $property->id }}" data-command="edit" class="btn btn-primary">
                                    <i class="fa fa-edit"></i> Edit this Listing
                                </a>
                            @endif
                        </div>
                    @endif
                @endif
                @if(!auth()->check())
                    <div class="col-md-3 col-sm-12 col-xs-12"
                         style="{{ auth()->user() ? auth()->user()->user_code == $property->user->user_code ? '' : '' : '' }}">
                        <div class="panel panel-default">
                            <div class="panel-heading">Contact Agent/Broker</div>
                            <div class="panel-body">
                                <div class="media" style="margin-bottom:20px;">
                                    <a class="pull-left"
                                       href="/profile/{{ $property->user->user_code }}/{{ str_slug($property->user->full_name) }}"
                                       style="padding-left: 5px;">
                                        @if($property->user->profile_image === '')
                                            <img style="background-image:url(/avatars/basic.jpg);" alt="" class='avatar'/>
                                        @else
                                            <img style="background-image:url(/avatars/{{ $property->user->profile_image }});"
                                                 alt="" class='avatar'/>
                                        @endif
                                    </a>
                                    <div class="media-body">

                                        {{--                                    <small>{{ $property->cat_ownership_type->description }}</small>--}}
                                        {{--<small></small>--}}

                                        <h6>
                                            <a href='/profile/{{ $property->user->user_code }}/{{ str_slug($property->user->full_name) }}'>{{ $property->user->full_name}}</a>
                                            <!-- {{ $property->user->full_name }} -->
                                        </h6>
                                    </div>
                                </div>
                                <div class="form-group contact">
                                    @if($property->user->user_mobile != '' && $property->user->user_phone != '')
                                        <p id="show_contact" class="text-info" style="font-size:14px; cursor:pointer"><span
                                                    class="fa fa-phone" style="padding-right:10px;"></span>Show Contact
                                            Number</p>
                                        <div id="phone_number" style="font-size:12px;padding-left:20px;display:none;">
                                            @if($property->user->user_mobile != '')
                                                <p class="weak-title">Mobile No: {{ $property->user->user_mobile }}</p>
                                            @endif
                                            @if($property->user->user_phone != '')
                                                <p class="weak-title">Phone No: {{ $property->user->user_phone }}</p>
                                            @endif
                                        </div>
                                    @endif
                                    <p id="show_email" class="text-info" style="font-size:14px; cursor:pointer">
                                        <span class="fa fa-envelope" style="padding-right:10px;"></span>Show Email Address
                                    </p>
                                    <div id="email_address" style="font-size:12px;display:none;padding-left:20px">
                                        <p class="weak-title">{{ $property->user->email }}</p>
                                    </div>
                                </div>
                                <form class="form-vertical property-card" method="post" action="/blowup/message">
                                    <input type="hidden" name="inquirer" id="inquirer"
                                           value="{{ auth()->check() ? auth()->user()->fullname : '' }}"/>
                                    <input type="hidden" name="viewer" id="viewer" value="{{ $viewer }}">
                                    <h5 class="secondary weak-title">ASK ABOUT THE PROPERTY</h5>
                                    <input type="hidden" id="_token" name="_token" value="{{csrf_token()}}">
                                    @if(session()->get('message.success'))
                                        <div class='alert alert-success'>
                                            {{ session()->get('message.success') }}
                                        </div>
                                    @endif
                                    @if(session()->get('message.danger'))
                                        <div class='alert alert-danger'>
                                            {{ session()->get('message.danger') }}
                                        </div>
                                    @endif
                                    <div class="form-group hidden">
                                        <div class="input-group">
                                            <input type="text" name="from_id" class="form-control"
                                                   value="{{ auth()->check()  ? 'auth()->user()->id' : '' }}">
                                            <span class="input-group-addon">*</span>
                                        </div>
                                    </div>
                                    <div class="form-group hidden">
                                        <div class="input-group">
                                            <input type="text" name="to_id" class="form-control"
                                                   value='{{ $property->user_id }}'>
                                            <span class="input-group-addon">*</span>
                                        </div>
                                    </div>
                                    <div class="form-group hidden">
                                        <div class="input-group">
                                            <input type="text" name="property_code" class="form-control"
                                                   value='{{ $property->property_code }}'>
                                            <span class="input-group-addon">*</span>
                                        </div>
                                    </div>
                                    <div class="form-group hidden">
                                        <div class="input-group">
                                            <input type="text" name="property_id" class="form-control"
                                                   value='{{ $property->id }}'>
                                            <span class="input-group-addon">*</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label style="font-size: 13px;">Fullname (required)</label>
                                        <div>
                                            <input type="text" id="fullname" name="fullname" class="input-sm form-control"
                                                   {{ auth()->check() ? 'readonly':'' }} placeholder="Fullname"
                                                   value="{{ auth()->user() ? auth()->user()->fullname : '' }}">
                                            {{-- <span class="input-group-addon">*</span> --}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label style="font-size: 13px;">Email Address (required)</label>
                                        <div>
                                            <input type="email" name="email_address" class="input-sm form-control"
                                                   {{ auth()->check() ? 'readonly':'' }}  placeholder="Email Address"
                                                   value="{{ auth()->user() ? auth()->user()->email : '' }}">
                                            {{-- <span class="input-group-addon">*</span> --}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label style="font-size: 13px;">Message</label>
                                        <div>
                            <textarea name="message" class="form-control" placeholder="Message"
                                      style="font-size:13px; width:100%; height:125px; resize:none">Please contact me regarding your property ({{$property->property_title }})</textarea>
                                            {{-- <span class="input-group-addon">*</span> --}}
                                        </div>
                                    </div>
                                    <input class="hidden" type="text" value="{{ $property->property_code }}"
                                           id="property_code">
                                    <div class="form-group">
                                        <button name="send" id="send" type="submit" class="btn btn-info btn-block">
                                            <span class="fa fa-envelope" style="padding-right:10px;"></span>Send Message
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    {{-- <span id="top-link-block" class="pull-right affix">
       <a href="#top" class=" btn btn-lg btn-default" onclick="$('html,body').animate({scrollTop:0},'slow');return false;">
          <i class="glyphicon glyphicon-chevron-up"></i>
       </a>
   </span> --}}
@endsection


@section('scripts')
    <script language="javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAGmn-_-Q4FnEIofsyt2nDTmvLEICgxmgU&v=3&libraries=drawing+geometry"　async defer></script>
    <script src="maps.google.com/maps/api/js?sensor=true"></script>
    <script type='text/javascript' src='/assets/js/gmaps.js'></script>
    <script type='text/javascript' src='/assets/js/mapa.js'></script>
    <script type="text/javascript" src='/assets/js/blowup.js'></script>
    <script>
        if({{ $property->visibility }} == 0){
            window.location = '/dashboard';
        }
        $(function () {
            var owner = '{{ $property->user->user_code  }}';
            var user = '{{ auth()->check() ? auth()->user()->user_code : '' }}';
            console.log('owner' + owner + ' ' + 'user' + user);
            if (owner != user) {

                var pcode = $('#property_code').val();
                var token = $('#_token').val();
                var inquirer = $('#inquirer').val();
                var viewer = $('#viewer').val();

                $.ajax({
                    url: '/blowup/save_log',
                    type: 'post',
                    data: {
                        '_token': token,
                        'property_code': pcode,
                        'action': 'VIEWED LISTING',
                        'inquirer_type': viewer,
                        'inquirer_name': inquirer,
                        'type': '1'
                    },
                    success: function (success) {
                        console.log(success);
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });

            }


        });

    </script>
@endsection
