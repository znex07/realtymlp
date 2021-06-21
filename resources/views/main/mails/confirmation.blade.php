@extends('main.mails.partials.base')

@section('content')
		<div class="container-fluid text-center">
			<div class="row">
				<div class="col-md-12">
					<label>Hello {{ $fullname }}</label>
					@if($option == 'option0')
					<label>Thank you for joining RealtyMLP, the Philippine's unique real estate multi-listing portal.To start using your account, kindly click on the activation link:...:</label>
					<label>http://realtymlp.com/auth/activate/{{str_slug($token)}}/{{$code}}</label>
					<label>Thank You !</label><br>
					<label>- RealtyMLP Admin</label><br>
					@elseif($option == 'option1')
					<label>Thank you for signing up with RealtyMLP. A temporary free account will be activated by clicking this link:</label>
					<label>http://realtymlp.com/auth/activate/{{str_slug($token)}}/{{$code}}</label>
					<label>To finish your subscription to the Premium Account, deposit 3,0000 (six months subscription)</label>
					@endif
				</div>
			</div>
		</div>
@endsection