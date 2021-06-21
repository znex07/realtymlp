@extends('main.dashboard.account.base')

@section('styles')
<style>
    .nav-landing {
            display: none;
        }
    .button-green {
        border:2px solid #1abc9c;
        padding: 8px 21px;
        color: #1abc9c;
        margin: 5px;
    }
    .button-green:hover,
    .button-green:active {
        color: #fff;
        background: #1abc9c;
        border-color: #1abc9c;
    }
    .button-red {
        border:2px solid #e74c3c;
        padding: 8px 21px;
        color: #fff;
        background-color: #e74c3c;
        margin: 5px;
    }
    .button-red:hover,
    .button-red:active {
        color: #fff;
        background: #C0392B;
        border-color: #C0392B;

    }
    label {
        font-weight: 700;
    }
    .privacy p {
        font-weight: 400;
        font-size: 14px;
        color: #888 !important;
        padding:0px 30px;
        line-height: 1.5;
    }
    .radio {
        margin-bottom: 0px;
    }

</style>
@endsection

@section('content.inner')

<div class="panel panel-default">
    <div class="panel-body">
        <form method="post" id="update_profile" action="/dashboard/account/edit">
            <div class="row">
                    <input type="text" class="hidden" name="id" value="{{ $user->id }}">
                <input type="hidden" id="_token" name="_token" value="{{csrf_token()}}">
                <div class="col-md-12 box-edit">
                    <div class="row title-margin">
                        <div class="col-md-12">

                            {{-- <div class="col-md-6">
                                <div class="pull-right">
                                    <button type='button' class="bbtn button-green button-green" onclick="window.location = '/dashboard/account/upgrade'">Upgrade</button>
                                    {{-- <button type='button' class="bbtn button-red button-red" onclick="window.location = '/dashboard/account/billing'">Billing</button>
                                </div>
                            </div> --}}

                        </div>
                    </div>
                    <div class="col-md-12">
                        <h2>
                            My Profile
                            @include('main.dashboard.account.partials.subs-badge')
                        </h2>
                        <ul class="breadcrumb">
                          <li><a href="#">Home</a></li>
                          <li class="active">Profile</li>
                      </ul>
                        <div class="form-group">
                            @if(session()->get('message.danger'))
                            <div class='alert alert-danger'>
                                {{ session()->get('message.danger') }}
                            </div>
                            @endif
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Firstname</label>
                                    <input type="text" name="user_fname" id="user_fname" onblur="check_fname()" class="form-control" placeholder="Firstname" value="{{ $user->user_fname }}">
                                    <span class="counter" id="counter_fname">60/60 Characters Left</span>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Lastname</label>
                                    <input type="text" name="user_lname" id="user_lname" onblur="check_lname()" class="form-control" placeholder="Lastname" value="{{ $user->user_lname }}">
                                    <span class="counter" id="counter_lname">60/60 Characters Left</span>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control" placeholder="Email Address" value="{{ $user->email }}" disabled/>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label>Mobile No</label>
                            <input type="text" name="user_mobile" class="form-control" placeholder="Mobile No" value="{{ $user->user_mobile }}" />
                        </div>
                        <div class="form-group">
                            <label>Phone No</label>
                            <input type="text" name="user_phone" class="form-control" placeholder="Phone No" value="{{ $user->user_phone }}" />
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea type="text" name="current_address" id="current_address" style="height: 100px; resize: none;" class="form-control" placeholder="Current Address">{{ $user->current_address }}</textarea>
                            <span class="counter" id="counter_address">250/250 Characters Left</span>
                        </div>
                        <div class="form-group">
                            <label>Professional Headline</label>
                            <textarea type="text" name="headline" id="headline" style="height: 70px; resize: none;" class="form-control" placeholder="Professional Headline">{{ $user->headline }}</textarea>
                            <span class="counter" id="counter_address">180/180 Characters Left</span>
                        </div>
                        <div class="form-group">
                            <label for="describe">Describe Yourself and your Experience</label>
                            <textarea type="text" name="describe" id="describe" style="height: 200px; resize: none;" class="form-control" placeholder="Add Info"></textarea>
                            <span class="counter" id="counter_describe">300/300 Characters Left</span>
                        </div>
                        <div class="form-group">
                            <label>License No.</label>
                            <input type="" name="" class="form-control" placeholder="License No." value="" />
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h6>Privacy</h6>
                                <hr>
                            </div>
                            <div class="form-group privacy">
                                <label class="col-md-4 control-label">Who can view my Profile?</label>
                                <div class="col-md-8">
                                    <label class="radio">
                                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="1" data-toggle="radio" class="custom-radio"><span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span>
                                        Allow anyone to view my profile
                                    </label>
                                    <p class="text-muted"> Your listings marked as public will show up, including all the information you filled out </p>
                                    <label class="radio">
                                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="2" data-toggle="radio"  class="custom-radio"><span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span>
                                        Only allow people who are logged in the RealtyMLP
                                    </label>
                                    <p class="text-muted">Your listings marked as public will still show up in public however the broker information on the right are all private.</p>
                                </div>
                            </div>
                        </div>
                        <hr>

                        {{--//broker_field--}}

                        <div id="broker_field" style="display:none;"><!-- start broker -->
                            <h6>Broker Fields</h6>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Broker Name</label>
                                        <input type="text"  class="form-control input-lg" id="BName" placeholder="Broker Name" tabindex="12" value="{{ $user->broker_name }}" name="broker_name" />
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Broker Website</label>
                                        <input type="text"  class="form-control input-lg" id="BWeb" placeholder="Website" tabindex="13" value="{{ $user->broker_web }}" name="broker_web"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Broker Address</label>
                                <textarea class="form-control input-lg" id="broker_address" name="broker_address" style="height:150px; resize:none;"  placeholder="Address" tabindex="14" value="{{ $user->broker_address }}" name="broker_address"></textarea>
                                <span class="counter" id="counter_broker_address">250 Characters Left</span>
                            </div>
                            <div class="row">
                            </div>
                            <div class="form-group">
                                <label>Description of the Company</label>
                                <textarea class="form-control input-lg" id="BDesc" name="broker_description"  style="height:150px; resize:none;" placeholder="Description of Company" tabindex="15" value="{{ $user->broker_desc }}" ></textarea>
                            </div>
                        </div>


                        {{--company_field--}}

                        <div id="company_field" style="display:none;">
                            <h6>Company Fields</h6>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Company Name</label>
                                        <input type="text"  class="form-control input-lg" id="CName" placeholder="Company Name" tabindex="8" value="{{ $user->broker_name }}" name="company_name"/>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Company Website</label>
                                        <input type="text"  class="form-control input-lg" id="CWeb" placeholder="Website" tabindex="9" value="{{ $user->broker_web }}" name="company_web"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Company Address</label>
                                <textarea  class="form-control input-lg" id="company_address" name="company_address" style="height:150px; resize:none;"  placeholder="Address" tabindex="10" value="{{ $user->broker_address }}" name="company_address"></textarea>
                                <span class="counter" id="counter_company_address">250 Characters Left</span>
                            </div>
                            <div class="row">
                            </div>
                            <div class="form-group">
                                <label>Description of the Company</label>
                                <textarea class="form-control input-lg" name="company_description" style="height:150px; resize:none;" tabindex="11" id="CDesc" placeholder="Description of Company" value="{{ $user->broker_desc }}" name="company_description"></textarea>
                            </div>
                        </div>
                        <input type="hidden" name="user_status" id="status" />
                        <div class="form-group pull-right">
                            <button type="submit" class="btn btn-default btn-lg">Cancel</button>
                            <button type="button" name="save"  id="save" class="save btn btn-primary btn-lg">Save</button>
                            <button type="submit" name="save_preview"  class="save_preview btn btn-success btn-lg"> Save and Preview</button>
                        </div>
                        <div class="form-group">
                            <a id="deactivate" href="#">Deactivate Account</a>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
        </form>
    </div>
</div>

<div class="modal fade in" id="avatar-upload" aria-hidden="true" aria-labelledby="avatar-modal-label" data-keyboard="false" data-backdrop="static" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-dialog-start">
        <div class="modal-content">
            <form class="avatar-form" enctype="multipart/form-data" method="post">
                <input type="hidden" id="rlid" value="{{ auth()->user()->user_code }}">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal" type="button">&times;</button>
                    <h4 class="modal-title" id="avatar-modal-label">Change Display Picture</h4>
                </div>
                <div class="modal-body">
                    <div class="avatar-body">

                        <!-- Upload image and data -->
                        <div class="avatar-upload col-sm-12 text-center">
                            <label for="avatarInput"><span class="btn btn-primary btn-block btn-lg btnUpload"><i class="fa fa-plus-circle" style="margin-right: 10px;"></i>Upload Display Picture</span></label>
                            <input class="avatar-input hidden" id="avatarInput" name="avatar_file" type="file" accept=".png,.jpg">
                        </div>
                        <div class="row" style="">
                            <div class="col-sm-12 text-center">
                                <img class="avatar-img" id="avatar-img" src="" style="display: none;" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-info" data-dismiss="modal" type="button" id="btnCancel">Cancel</button>
                    <button class="btn btn-primary" id="btnCrop" type="submit" style="display: none;">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')

<script>
$(function() {

    var checkeds = '{{$user->status}}';
 if (checkeds == '2')
 {
//     alertify.alert('sayasaya')
     document.getElementById("optionsRadios2").checked = true;
     document.getElementById("optionsRadios1").checked = false;
 }
    else if (checkeds == '1')
 {
     document.getElementById("optionsRadios2").checked = false;
     document.getElementById("optionsRadios1").checked = true;
 }
    $("#user_fname").limitText($("#counter_fname"),60);
    $("#user_lname").limitText($("#counter_lname"),60);

})

$.fn.limitText = function(counter,limit) {
    this.on('input', function(e) {
        var tval = $(this).val(),
        tlength = tval.length,
        set = limit,
        remain = parseInt(set - tlength);
        counter.text(remain + "/" + limit + " Characters left");
        if (remain <= 0) {
            counter.text(0 + "/" + limit +"Characters left");
            $(this).val((tval).substring(0, limit -1));
        }
    });

};

function check_fname() {
    var fname = $('#user_fname').val();

    if(fname == '') {
        $('#user_fname').tooltip({ title: 'Please fill up Firstname', placement: 'top'}).tooltip('show');
        $('#user_fname:visible').parent().addClass("has-error");
    }
    else {
        $('#user_fname:visible').parent().removeClass("has-error");
        $('#user_fname:visible').tooltip('destroy');
    }
}

function check_lname() {
    var lname = $('#user_lname').val();

    if(lname == '') {
        $('#user_lname').tooltip({ title: 'Please fill up Lastname', placement: 'top'}).tooltip('show');
        $('#user_lname:visible').parent().addClass("has-error");
    }
    else {
        $('#user_lname:visible').parent().removeClass("has-error");
        $('#user_lname:visible').tooltip('destroy');
    }

}
$('.save_preview').click(function (e) {
   $('#status').val('2');

});


$('.save').click(function (e) {
    e.preventDefault();
    $('#status').val('1');
    var fname = $('#user_fname').val();
    var lname = $('#user_lname').val();
    var status1,status2;

    if(fname == '') {
        $('#user_fname').tooltip({ title: 'Please fill up Firstname', placement: 'top'}).tooltip('show');
        $('#user_fname:visible').parent().addClass("has-error");
        status1 = '0';
    }
    else {
        $('#user_fname:visible').parent().removeClass("has-error");
        $('#user_fname:visible').tooltip('destroy');
        status1 = '1';
    }


    if(lname == '') {
        $('#user_lname').tooltip({ title: 'Please fill up Lastname', placement: 'top'}).tooltip('show');
        $('#user_lname:visible').parent().addClass("has-error");
        status2 = '0';
    }
    else {
        $('#user_lname:visible').parent().removeClass("has-error");
        $('#user_lname:visible').tooltip('destroy');
        status2 = '1';

    }

    if(status1 == '1' && status2 == '1') {
        $('#update_profile').submit();
    }
    else {

    }

});


$('#deactivate').click(function (e) {
    var _token = $('#_token').val();

        // console.log(_token);
        alertify
        .confirm("RealtyMLP","Are you sure you want to deactivate your account ?.</br> All your affiliates, listings and account will deleted."  ,
            function(){
                $.ajax({
                    url: '/dashboard/account/deactivate',
                    type: 'post',
                    data: {"_token":_token},
                    success: function (success) {
                        console.log(success);
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            },
            function() {

            }
            );

        // $.ajax({
        //     url:'/dashboard/account/deactivate',
        //     type:'post',
        //     data:{"_token":_token},
        //     success: function (success) {
        //         console.log(success);
        //     },
        //     error: function (error) {
        //         console.log(error);
        //     }

        // });
});



</script>
@endsection
