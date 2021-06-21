@extends('main.partials.base')
@section('styles')
<style>
.privacy p {
    font-weight: 400;
    font-size: 14px;
    color: #888 !important;
    padding:0px 30px;
    line-height: 1.5;
}  
.control-label {
    font-weight: bold;
}
</style>
@endsection
@section('content')
<div class="container">
    <div class="col-md-7 col-md-offset-2" style="margin-top: 70px;">
        <form method="post" action='/auth/register' id="register">
            <input type='hidden' name='_token' value='{{ csrf_token() }}' />
            <div class="panel panel-default" >                
                <div class="panel-body">
                    <h2>Create New Account</h2>
                    <hr>
                    @if($errors->all())
                    <div class='alert alert-danger'>
                        @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                        @endforeach
                    </div>
                    @endif
                    
                    <div class="col-md-12">
                                <!-- <div class="form-group">
                                    <input type="input" name="full_name" id="txtFullname"
                                           class="form-control input-lg"
                                           placeholder="Fullname">
                                       </div> -->
                                    <div class="form-group row">
                                        <label class="col-md-3 control-label">Firstname</label>
                                        <div class="col-md-9">
                                            <input type="text" name="first_name" id="first_name"
                                            class="form-control"
                                            onblur="check_fname()"
                                            placeholder="Firstname"
                                            >
                                        </div>
                                        <!-- <span class="counter" id="counter_fname">60/60 Characters Left</span> -->

                                    </div>
                                    <!-- </div> -->
                                    <div class="form-group row">
                                        <label class="col-md-3 control-label">Lastname</label>
                                        <div class="col-md-9">
                                            <input type="text" name="last_name" id="last_name"
                                            class="form-control"
                                            onblur="check_lname()"
                                            placeholder="Lastname"
                                            >
                                        </div>
                                        <!-- <span class="counter" id="counter_lname">60/60 Characters Left</span> -->

                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 control-label">Email</label>
                                        <div class="col-md-9">
                                            <input type="email" name="email" id="txtEmail"
                                            class="form-control"
                                            onblur="check_email()"
                                            placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 control-label">Password</label>
                                        <div class="col-md-9">
                                            <input type="password" name="password" id="password"
                                            class="form-control"
                                            placeholder="Password">
                                        </div>       
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 control-label">Confirm Password</label>
                                        <div class="col-md-9">
                                            <input type="password" name="password_confirmation" id="confirm_password"
                                            onblur="match_password()"
                                            class="form-control"
                                            placeholder="Confirm Password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 control-label">Contact No</label>
                                        <div class="col-md-9">
                                            <input type="text" name="contact_no" id="contact_no"
                                            class="form-control"
                                            placeholder="Contact No.">
                                        </div>
                                    </div>                                    
                                    <div class="form-group clearfix">
                                        <div class="well">
                                            <label><input type="checkbox" id="agree"> 
                                                I confirm that I have read, understood and accept the </label><a id="tnc" style="cursor:pointer;color:#23c6c8;"> Terms and Condition</a>
                                            </div>                                       
                                        </div>
                                        <button type="submit" name="btnLoginU" id="btnLoginU" class="btn btn-primary pull-right  ladda-button disabled"
                                    data-style="slide-left">
                                    <span class="ladda-label" disabled>Register Now</span>
                                    <span class="ladda-spinner"></span>
                                </button>
                                

                            </div>
                    <div class="col-md-6 hidden">
                        <div class="media">
                            <div class="media-body">        
                                @if($code != null)
                                <div class="form-group">
                                    <input type="text" name="invite_name" id="invite_name"
                                           class="form-control"
                                           value="{{ $user->user_fname }} {{ $user->user_lname }}"
                                           placeholder="Invited By">
                                </div>
                                @else
                                <h3 id="invited_by" class="text-info" style="font-size:14px; cursor:pointer">Who Invited You <span class="fa fa-chevron-down"></span></h3>
                                <div class="form-group" id="invite_form" style="display:none;">
                                    <input type="text" name="invite_name" id="invite_name"
                                           class="form-control"
                                           placeholder="Invited By">
                                </div>
                                @endif

                                <hr>
                                <div class="form-group privacy">
                                    <label style="font-size:18px;">Account Type: Please Choose Below</label>
                                    <label class="radio">
                                        <input type="radio" id="free" name="subscription_type" checked id="optionsRadios1" value="1" data-toggle="radio" class="custom-radio"><span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span>
                                        <strong>Free</strong>
                                    </label>
                                    <p style="font-size:12px;">Try and get to feel of RealtyMLP with this <b>FREE ACCOUNT </b>10 Regular Listings, 10 Quick Listings, 10 Shared Listings, 10 Affiliates.</p>
                                    <label class="radio">
                                        <input type="radio" id="premium" name="subscription_type" id="optionsRadios1" value="2" data-toggle="radio" class="custom-radio"><span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span>
                                        <strong>Premium</strong>
                                    </label>
                                    <p style="font-size:12px;">Multiply your database and networking power by subscribing to Premium for only &#8369; 500 / month (6 months/subscription) 100 Regular Listings, 100 Quick Listings, 100 Shared Listings, 100 Affiliates.</p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div> 

            </div>
        </form>
    </div>
</div>



<div id="myModal" style="display:none;">
    <textarea style="width:200%; height:250px;font-size:16px; resize:none;">
        WEBSITE TERMS AND CONDITIONS

        These terms and conditions govern your use of our website, www.RealtyMLP.com (herein called “Website”).  Please read these terms and conditions in full before you use this Website.  Using the Website implies that you accept the terms and conditions.  If you disagree with these terms and conditions or any part of these terms and conditions, you must not use our Website.  We may amend these terms and conditions at any time by publishing a new version on this website.


        1.  ACCEPTABLE USE OF OUR WEBSITE

        1.1 The copyright and other intellectual property rights on this Website are owned by SEGOVIA DEVELOPMENT CORP. (“us”, “we”, or “our”) a company duly registered within the laws of the Republic of the Philippines that offer services and information contained on this Website.

        1.2 This Website may have certain users (herein called “Members”) that register in the Website to submit user generated content to describe real estate property/ies.

        1.3 You are permitted to use our Website for lawful purposes, but you must not download, reproduce, nor exploit the copyright and other intellectual property rights on our Website without our prior consent and the consent of our Members.

        1.4 You must not use our Website in any way that causes, or may cause, damage to the website or impairment of the availability or accessibility of the website; or in any way which is directly or indirectly unsolicited, unlawful, illegal, fraudulent or harmful to us, our Members, and the public.

        1.5 You must not conduct any systematic or automated data collection activities (including without limitation scraping, data mining, data extraction and data harvesting) on or in relation to our website without our express written consent.


        2.  RESTRICTED ACCESS

        2.1     Access to certain areas of our Website is restricted.  We reserve the right to restrict access to other areas of our website, or indeed our whole website, at our discretion.

        2.2     If we provide you with a user ID and password to enable you to access restricted areas of our Website or other content or services, you must ensure that that user ID and password is kept confidential. We cannot be held responsible for the loss of your password nor the use of it by someone else.


        3.  USER GENERATED CONTENT

        3.1     User generated content (including without limitation text and images) that you submit to our website for the purpose of publishing and sharing, should be submitted in accordance with the acceptable Use of Website (see Section 1).

        3.2     With the exception of personally identifiable information, any user generated content you send or post to this Website shall be considered proprietary to yourself as our Member.  It is within your rights to publish such and remove such at your discretion.  However, if such user generated content does not comply with the Acceptable Use of Our Website, we may remove such user generated content without prior notice to the member.



        4.  LIMITED WARRANTIES

        4.1     We take all reasonable steps to ensure that the information on this Website is correct.  However, we do not warrant nor guarantee the correctness, completeness, and accuracy of material on this website.

        4.2     We take all reasonable steps to ensure that this Website is available 24 hours every day, 365 days per year. However, websites do sometimes encounter downtime due to server and, other technical issues.  Therefore we will not be liable if this website is unavailable at any time.



        5.  LIMITATIONS AND EXCLUSIONS OF LIABILITY

        5.1 We will not be liable for any loss or damage of any nature including, but not limited to:

        (a) losses arising out of any event or events beyond our reasonable control;

        (b) losses in business including, but not limited to, loss of or damage to profits, income, revenue, use, production, anticipated savings, business, contracts, commercial opportunities or goodwill;

        (c) loss or corruption of any data, database or software;

        (d) and any special, indirect or consequential loss or damage.


        6.  INDEMNITY

        6.1     You hereby indemnify us and undertake to keep us indemnified against any losses, damages, costs, liabilities and expenses (including without limitation legal expenses and any amounts paid by us to a third party in settlement of a claim or dispute on the advice of our legal advisers) incurred or suffered by us arising out of any breach by you of any provision of these terms and conditions, or arising out of any claim that you have breached any provision of these terms and conditions


        8.  BREACHES OF THESE TERMS AND CONDITIONS

        8.1     Without prejudice to our other rights under these terms and conditions, if you breach these terms and conditions in any way, we may take such action as we deem appropriate to deal with the breach, including suspending your access to the website, prohibiting you from accessing the website, blocking computers using your IP address from accessing the website, contacting your internet service provider to request that they block your access to the website and/or bringing court proceedings against you.


        9.  ASSIGNMENT

        9.1     We may transfer, sub-contract or otherwise deal with our rights and/or obligations under these terms and conditions without notifying you or obtaining your consent.

        9.2     You may not transfer, sub-contract or otherwise deal with your rights and/or obligations under these terms and conditions.


        10.     SEVERABILITY

        10.1    If a provision of these terms and conditions is determined by any court or other competent authority to be unlawful and/or unenforceable, the other provisions will continue in effect.  If any unlawful and/or unenforceable provision would be lawful or enforceable if part of it were deleted, that part will be deemed to be deleted, and the rest of the provision will continue in effect.


        11.     EXCLUSION OF THIRD PARTY RIGHTS

        11.1    These terms and conditions are for the benefit of you and us, and are not intended to benefit any third party or be enforceable by any third party.  The exercise of our and your rights in relation to these terms and conditions is not subject to the consent of any third party.


        12.     ENTIRE AGREEMENT

        12.1    This disclaimer, together with our privacy policy, constitutes the entire agreement between you and us in relation to your use of our website, and supersedes all previous agreements in respect of your use of this website.

        12.2    This disclaimer shall be governed by and construed in accordance with the laws of the Republic of the Philippines.  Any dispute(s) arising in connection with this Legal Notice are subject to the exclusive jurisdiction of the Republic of the Philippines.

    </textarea>
</div>

@endsection

@section('scripts')
<script>
$('#agree').click(function(e){
   var pre = document.createElement('pre');
   pre.style.maxHeight = "400px";
   pre.style.overflowWrap = "break-word";
   pre.style.margin = "-16px -16px -16px 0";
   pre.style.paddingBottom = "24px";
   pre.appendChild(document.createTextNode($('#myModal').text()));
   alertify.confirm("Terms and Condition",pre, 
    function(){
     $('#agree').prop('checked',true);       
     $('#btnLoginU').removeClass('disabled');
 },function(){
     $('#agree').prop('checked',false);       
     $('#btnLoginU').addClass('disabled');
 }).setting('labels',{'ok':'Accept', 'cancel': 'Decline'});
});

$('#tnc').click(function (e) {
    var pre = document.createElement('pre');
        //custom style.
        pre.style.maxHeight = "400px";
        pre.style.overflowWrap = "break-word";
        pre.style.margin = "-16px -16px -16px 0";
        pre.style.paddingBottom = "24px";
        pre.appendChild(document.createTextNode($('#myModal').text()));
        //show as confirm
        alertify.confirm("Terms and Condition",pre, 
            function(){
             $('#agree').prop('checked',true);       
             $('#btnLoginU').removeClass('disabled');
         },function(){
             $('#agree').prop('checked',false);       
             $('#btnLoginU').addClass('disabled');
         }).setting('labels',{'ok':'Accept', 'cancel': 'Decline'});
    });


$('.nav-register').addClass('accented-btn');

function match_password() {
    var password = $('#password').val();
    var confirm_password =  $('#confirm_password').val();

    if(confirm_password != password) {
        $('#confirm_password').tooltip({ title: 'Password do not match', placement: 'top'}).tooltip('show');
        $('#confirm_password:visible').parent().addClass("has-error");
    }
    else {
        $('#confirm_password:visible').parent().removeClass("has-error");
        $('#confirm_password:visible').tooltip('destroy');
    }

}

$('#btnLoginU').click(function (e) {
    var error;
    var password = $('#password').val();
    var confirm_password =  $('#confirm_password').val();
    var agree = $('#agree');

    e.preventDefault();


    if(confirm_password != password) {
        $('#confirm_password').tooltip({ title: 'Password do not match', placement: 'top'}).tooltip('show');
        $('#confirm_password:visible').parent().addClass("has-error");
        error = 1;
    }
    else {
        $('#confirm_password:visible').parent().removeClass("has-error");
        $('#confirm_password:visible').tooltip('destroy');
        error = 0;
    }

    if(error == 0) {
        if(agree.is(':checked')) {
            $('#register').submit();
        }
        else {
            console.log('no');                   

        }
    }

});


$(function() {
    $("#first_name").limitText($("#counter_fname"),60);
    $("#last_name").limitText($("#counter_lname"),60);

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
    var fname = $('#first_name').val();
    if(fname == '') {
        $('#first_name').tooltip({ title: 'Please fill up Firstname', placement: 'top'}).tooltip('show');
        $('#first_name:visible').parent().addClass("has-error");
    }
    else {
        $('#first_name:visible').parent().removeClass("has-error");
        $('#first_name:visible').tooltip('destroy');
    }
}

function check_lname() {
    var lname = $('#last_name').val();
    if(lname == '') {
        $('#last_name').tooltip({ title: 'Please fill up Lastname', placement: 'top'}).tooltip('show');
        $('#last_name:visible').parent().addClass("has-error");
    }
    else {
        $('#last_name:visible').parent().removeClass("has-error");
        $('#last_name:visible').tooltip('destroy');
    }
}

function check_email() {
    var email = $('#txtEmail').val();
    if(email == '') {
        $('#txtEmail').tooltip({ title: 'Please fill up Email', placement: 'top'}).tooltip('show');
        $('#txtEmail:visible').parent().addClass("has-error");
    }
    else {
        $('#txtEmail:visible').parent().removeClass("has-error");
        $('#txtEmail:visible').tooltip('destroy');
    }
}


$('#invited_by').click(function (e) {

    $('#invite_form').show('slow');
});




</script>
@endsection
