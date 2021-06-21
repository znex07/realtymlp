@extends('main.partials.base')
@section("styles")
<style>
@media screen and (max-width: 768px) {
	.forgot {
		padding: 0% !important;
	}
}
.forgot {
	padding:5% 20%; 
}
</style>
@endsection
@section('content')
<div class="container" style="padding-top:50px;">
	<div class="row">
		<div class="col-md-12" style="margin-top:70px;">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="col-md-12 forgot">
						<h4>Forgot your password?</h4>
						<div class="row">
							<div class="col-md-12">
								<label>Enter the email address you registered with, we’ll email you a password reset link</label>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<form method="post" action="/auth/forgot_password/send_email">
									<input type='hidden' name='_token' value='{{ csrf_token() }}' />
									<div class="form-group">
										<label><b>Email address</b></label>
										<input type="email" name="email_address" id="email_address" class="form-control" placeholder="Email">
									</div>
									<div class="form-group">
										<button type="submit" id="send" name="send" class="btn btn-info btn-sm btn-block">Send me reset instructions</button>
									</div>
									<hr>
									<div class="form-group">
										<label>We will be sending you an email shortly. Thank you!</label>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection


