@extends('main.dashboard.base')


@section('content')
	<div class="container" style="margin-top:70px;">
	<div class="col-md-3"></div>
	
	@if($emails->status == '1')
		@if(time() - strtotime($emails->created_at) < 60*60*24)
		<div class="col-md-6">
			<h2>Change Password</h2>
			<form method="post" id="update_pass" action="/auth/forgot_password/change_password/update">
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-8"`>
							<input type="hidden" name="_token" value="{{csrf_token()}}">
							<div class="form-group">
								@if(session()->get('update.success'))
		                            <div class='alert alert-danger'>
		                                {{ session()->get('update.success') }}
		                            </div>
                            	@endif
							</div>

							<div class="form-group">
								<input type='hidden' name='_token' value='{{ csrf_token() }}' />
								<input type="hidden" name="user_id" id="user_id" value="{{ $user->id }}" >
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
					<div class="col-md-4">
						<div class="form-group">
							<button type="submit" name="update_password" id="update_password" class="btn btn-info btn-lg btn-block">Update Password</button>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<a href="/dashboard"><button type="button" name="cancel" id="cancel" class="btn btn-danger btn-lg btn-block">Cancel</button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		</form>
		@else
		<div class="row" style="padding-top:200px;">
		<div class="col-md-12">
			<div class="col-md-4">
			</div>
			<div class="col-md-5"> 
				<div class="form-group">
					<label>The link you have clicked on has expired.</label>
					<label>Please click <a href="/auth/forgot_password">this</a> to send a new activation link.</label>
					<!-- <a href="/auth/forgot_password"><button type="button" class="btn btn-info btn-lg btn-block">Send Again</button></a> -->
				</div>
			</div>
		</div>
	</div>
	@endif
	
	@else
	<div class="row" style="padding-top:200px;">
		<div class="col-md-12">
			<div class="col-md-4">
			</div>
			<div class="col-md-5"> 
				<div class="form-group">
					<label>The link you have clicked on has expired.</label>
					<label>Please click <a href="/auth/forgot_password">this</a> to send a new activation link.</label>
					<!-- <a href="/auth/forgot_password"><button type="button" class="btn btn-info btn-lg btn-block">Send Again</button></a> -->
				</div>
			</div>
		</div>
	</div>
	@endif
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
        
        if(new_pass_length < 8) {
            console.log('less than 8 Characters');
            $('#new_password').tooltip({ title: 'Your password has to be at least 8 characters long, with at least one alphabetic character and one numerical character in it', placement: 'right'}).tooltip('show');
           	$('#new_password:visible').parent().addClass("has-error");
        }
        else {
        	$('#new_password:visible').parent().removeClass("has-error");
            $('#new_password:visible').tooltip('destroy');
        	status1 = 'okay';
        }

      

        if(confirm_pass != new_pass) {
            $('#confirm_new_password').tooltip({ title: 'Password do not match', placement: 'right'}).tooltip('show');
           	$('#confirm_new_password:visible').parent().addClass("has-error");            
        }
        else {
        	$('#confirm_new_password:visible').parent().removeClass("has-error");
            $('#confirm_new_password:visible').tooltip('destroy');
        	status2 = 'okay';
        }

        if(status1 == 'okay' && status2 == 'okay') {
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