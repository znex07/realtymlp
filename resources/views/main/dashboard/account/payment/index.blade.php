@extends('main.dashboard.account.payment.base')
 
@section('styles')
<style>
	.label {
		font-size: 15px;
	}
</style>
@endsection
@section('content.inner')

<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			Upgrade your basic account
		</div>
		<div class="panel-body">
			<div class="text-center">
				<h2>You're almost there</h2>
				<label>Upgrade your RealtyMLP account (<b>{{ auth()->user()->email }}</b>) to</label><br>
				<form action="/dashboard/account/payment/pay_via_paypal" method="post" target="_top">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="cmd" value="_xclick-subscriptions">
					<input type="hidden" name="business" value="angeldhevs@gmail.com">
					<input type="hidden" name="lc" value="US">
					<input type="hidden" name="item_name" value={{$subs_type}}>
					<input type="hidden" name="item_number" value="12121">
					<input type="hidden" name="no_note" value="1">
					<input type="hidden" name="src" value="1">
					<input type="hidden" name="currency_code" value="USD">
					<input type="hidden" name="bn" value="PP-SubscriptionsBF:btn_subscribe_LG.gif:NonHostedGuest">
					<input type="hidden" name="currency_code" value="PHP">
					<input type="hidden" name="option_select0" value="3 month">
					<input type="hidden" name="option_amount0" value="100.00">
					<input type="hidden" name="option_period0" value="M">
					<input type="hidden" name="option_frequency0" value="1">
					<input type="hidden" name="option_select1" value="6 month">
					<input type="hidden" name="option_amount1" value="400.00">
					<input type="hidden" name="option_period1" value="M">
					<input type="hidden" name="option_frequency1" value="1">
					<input type="hidden" name="option_select2" value="1 year">
					<input type="hidden" name="option_amount2" value="10000.00">
					<input type="hidden" name="option_period2" value="M">
					<input type="hidden" name="option_frequency2" value="1">
					<input type="hidden" name="option_index" value="0">
					<br>				
					<input type="hidden" class="form-control" name="on0" value="Subscriptions">
					<span class="label label-default">{{$subs_type}}</span>
					<hr>			
					<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_subscribe_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
					<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
				</form>
			</div>
			<div class="col-md-12">
				<p class="text-center text-muted">Your Realty MLP Premium plan begins when when we have successfully processed your payment and will expire at the end of the period you've purchased. Full terms are available here.. This form of payment cannot be combined with a free trial or similar introductory discounts.</p>
			</div>
		</div>
	</div>
</div>


<!-- <form method="post"  action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="TBYV2F4RZ66KE">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form> -->

@endsection
