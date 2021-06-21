@extends('main.dashboard.base')

@section('content')
@include('main.partials.sidebar')

<div class="container" style="margin-top: 70px;">
	<div class="col-md-9">

		<ul class="breadcrumb">
			<li><a href="#">Joram Salinas</a></li>
			<li class="active">View Shared Listings</li>
		</ul>
		@for($i = 0; $i<=5;$i++)
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="panel panel-default property-card ">
					<div class="panel-body">
						<div class="col-md-3" style="padding: 0px">
							<img src="/img/img_placeholder.png" class="img-responsive">
						</div>
						<div class="col-md-9">
							<div class="primary">
								<div class="btn-group pull-right">
									<button data-toggle="dropdown" type="button" class="btn btn-info btn-xs dropdown-toggle">
										More<span class="caret"></span>
									</button>
									<ul role="menu" class="dropdown-menu">
										<li><a href="#"><span class="fa fa-file-image-o" style="padding-right: 10px"></span>Create Poster</a></li>
										<li class="divider"></li>
										<li><a href="#"><span class="fa fa-share" style="padding-right: 10px;"></span>Share</a></li>
									</ul>
								</div>
								<h3 class="property-location">#6520, Pio Del Pilar, Makati City</h3>
								<h3 class="property-label">Townhouse, Land, Etc</h3>
								<h3 class="property-price weak-title"><label class="label label-default"><span class="fa fa-tag"></span> For Sale</label> Php 50, 000.00</h3>
								<h3 class="property-id weak-title">Property ID: 000000000</h3>
							</div>

							<div class="secondary">
								<p class="property-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
								<div class="text-right">
									<a class="read-more">view what affiliate will see</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				@include('main.dashboard.profile.checkbox')
			</div>
		</div>
		@endfor
	</div>
</div>
@endsection
