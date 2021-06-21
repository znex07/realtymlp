@extends('main.dashboard.account.base')


@section('content.inner')
<div class="panel panel-default">
	<div class="panel-body panel-padding">
		<div class="row">
			<div class="col-md-12">				
				<ul class="breadcrumb">
					<li><a href="#">Home</a></li>
					<li><a href="#">Profile</a></li>
					<li class="active">Upgrade</li>
				</ul>
				<hr>
			</div>
		</div>
		<div class="col-md-12">
			<div class="panel-default panel">
				<div class="panel-heading">Subscription Summary <div class="pull-right" style="font-weight:normal">(<strong>1</strong>) item</div></div>
				<div class="panel-body">
					<div class="col-md-offset-1 col-md-11">
						<div class="pull-right">
							<label><strong>&#8369;{{$subs_desc}}</strong></label>
						</div>
						<h3 class="text-primary" style="margin-bottom:15px !important">Your getting Subscription: {{$subs_type}} </h3>
						<small style="font-weight:800;">Description</small>
						<p>&#8369;{{$subs_desc}} for 180 days</p>
						<small style="font-weight:800;">Expiration Date</small>
						<p>{{$expire_at->toDateString()}}</p>
						<hr>
						<div class="pull-right">
							<label><strong></strong></label>
						</div>
						<h3 class="text-danger">Your current Subscription: {{$subs_name->name}}</h3>
					</div>
					<hr>
					<p></p>
				</div>				
				<div class="panel-footer clearfix">
					<div class="pull-right">
						<a href="/dashboard/account/payment/payments/{{$subs_type}}" class="btn btn-sm btn-primary"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Checkout</a>
						<a href="/dashboard/account/upgrade" class="btn btn-sm btn-secondary"> Cancel</a>
					</div>
					<h3 class="clearfix" style="margin-top: 12px !important;">Total: <strong class="text-primary">&#8369; {{$subs_desc}}</strong></h3>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection



