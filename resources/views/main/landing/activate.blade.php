@extends('main.partials.base')

@section('content')
	<div class="container-fluid" style="margin-top:100px;">
	@if(time() - strtotime($emails->created_at) < 60*60*24)
    	@if($user->activation_code == '0')
    	<div class="row">
			<div class="col-md-12">
				  <form method="post" action='/auth/activate/update'>
				  	<input type="hidden" name="user_id" value="{{ $user->id }}">
		            <input type='hidden' name='_token' value='{{ csrf_token() }}' />
				  </form>
				
			</div>
		</div>
		@else 
			<div class="row" style="padding-top:200px;">
			<div class="col-md-4"></div>
			<div class="col-md-5">
				  <form method="post" action='/auth/activate/update'>
					<label>Your account has been activated. Please click the link below to login to your dashboard.</label><br>
					<a href="/auth/login">Login Now</a>			  
				  </form>
				
			</div>
		</div>		
		@endif
	@else 
		<div class="row">
			<div class="col-md-12">
				  <form method="post" action='/auth/activate/update'>
				  	<label>Link has been expired. Please click the link below to resend a new activation link.</label>
					<a href="/auth/login">Send Now</a>			  
				  </form>
			</div>
		</div>
	@endif

	</div>
@endsection