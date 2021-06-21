@extends('main.mails.partials.base')
@section('content')
		<div class="container-fluid">
			<div class="form-group">
			<h1>RealtyMLP</h1>
				<!-- <button name="btnregister" class="btn btn-info btn-block"> Register</button> -->
				<label>Dear {{ $user->user_fname }} {{ $user->user_lname }}!</label><br>
				<label>To re-activate your account, kindly click on the activation link below to reset your password:</label><br>
				<label> http://realtymlp.com/auth/forgot_password/change_password/{{str_slug($token)}}/{{ $user->id }}</label><br>
				<label>Thank you!</label><br>
				<label>- RealtyMLP Admin</label><br>
			</div>
		</div>
			

@endsection