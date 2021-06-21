@extends('main.dashboard.account.password.base')



@section('content.inner')

<div class="panel panel-default">
	<div class="panel-body panel-padding">
		<h2>Change Password</h2>
    <ul class="breadcrumb">
      <li><a href="#">Home</a></li>      
      <li><a href="#">Profile</a></li>
      <li class="active">Change Password</li>
    </ul>
    <hr>
    <form method="post" id="update_pass" action="/dashboard/account/password/change_password">
     <div class="row">
      <div class="col-md-12">
       <div class="col-md-8 col-lg-offset-2 col-md-offset-2">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
         @if(session()->get('update.success'))
         <div class='alert alert-danger'>
          {{ session()->get('update.success') }}
        </div>
        @endif
      </div>
      <div class="form-group">
       <label>Current Password</label>
       <input type="password" name="current_password" id="current_password" class="form-control input-lg" placeholder="Current Password">
     </div>
     <div class="form-group">
       <label>New Password</label>
       <input type="password" name="new_password" id="new_password" class="form-control input-lg" placeholder="New Password">
     </div>
     <div class="form-group">
       <label>Confirm New Password</label>
       <input type="password" name="confirm_new_password" id="confirm_new_password" onblur="match_password()" class="form-control input-lg" placeholder="Confirm New Password">
     </div>
   </div>
 </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="col-md-8 col-lg-offset-2 col-md-offset-2">
      <div class="row">
       <div class="col-md-6">
        <div class="form-group">
         <button type="submit" name="update_password" id="update_password" class="btn btn-info btn-lg btn-block">Update Password</button>
       </div>
     </div>
     <div class="col-md-6">
      <div class="form-group">
       <a href="/dashboard"><button type="button" name="cancel" id="cancel" class="btn btn-danger btn-lg btn-block">Cancel</button></a>
     </div>
   </div>
 </div>
</div>
</div>
</div>					
</form>
</div>
</div>


@endsection

@section('scripts')
<script>
  function match_password() {
  	var confirm_pass = $('#confirm_new_password').val();
  	var new_pass = $('#new_password').val();


  	if(confirm_pass != new_pass) {
  		$('#confirm_new_password').tooltip({ title: 'Password do not match', placement: 'right'}).tooltip('show');
  		$('#confirm_new_password:visible').parent().addClass("has-error");            
  	}
  	else {
  		$('#confirm_new_password:visible').parent().removeClass("has-error");
  		$('#confirm_new_password:visible').tooltip('destroy');
  	}
  }


  $('#update_password').click(function (e) {
  	e.preventDefault();
  	var new_pass = $('#new_password').val();
  	var new_pass_length = new_pass.length;
  	var confirm_pass = $('#confirm_new_password').val();
  	var status1,status2;

        // if(new_pass_length < 8) {
        //     console.log('less than 8 Characters');
        //     $('#new_password').tooltip({ title: 'Your password has to be at least 8 characters long, with at least one alphabetic character and one numerical character in it', placement: 'right'}).tooltip('show');
        //    	$('#new_password:visible').parent().addClass("has-error");
        // }
        // else {
        // 	$('#new_password:visible').parent().removeClass("has-error");
        //     $('#new_password:visible').tooltip('destroy');
        // 	status1 = 'okay';
        // }



        if(confirm_pass != new_pass) {
        	$('#confirm_new_password').tooltip({ title: 'Password do not match', placement: 'right'}).tooltip('show');
        	$('#confirm_new_password:visible').parent().addClass("has-error");            
        }
        else {
        	$('#confirm_new_password:visible').parent().removeClass("has-error");
        	$('#confirm_new_password:visible').tooltip('destroy');
        	status2 = 'okay';
        }

        if(status2 == 'okay') {
        	$('#update_pass').submit();
        }


      });

$('#confirm_new_password').bind('cut copy paste', function (e) {
	e.preventDefault();
});

$('#current_password').bind('cut copy paste', function (e) {
	e.preventDefault();
});

$('#new_password').bind('cut copy paste', function (e) {
	e.preventDefault();
});		
</script>
@endsection