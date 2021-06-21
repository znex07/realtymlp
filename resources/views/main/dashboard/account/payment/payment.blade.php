@extends('main.dashboard.account.base')


@section('content.inner')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<ul class="breadcrumb">
					<li><a href="#">Home</a></li>
					<li><a href="#">Profile</a></li>
					<li><a href="#">Upgrade</a></li>
					<li class="active">Payment method</li>
				</ul>
					<hr/>
				<form method="post"  action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
					<input type="hidden" name="cmd" value="_s-xclick">
					<input type="hidden" name="hosted_button_id" value="TBYV2F4RZ66KE">
					<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
					<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
				</form>
				<!-- <a  href="/dashboard/account/payment/success">
 						<img src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="1" name="submit" alt="PayPal - The safer, easier way to pay online!"/></link>
 -->
				</form>

				</div>
			</div>
		</div>
	</div>

@endsection
