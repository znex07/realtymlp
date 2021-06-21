@extends('main.dashboard.base')
@section('content')
@include('main.partials.sidebar')

<div class="container" style="margin-top:70px;">
  <div class="col-md-6">
	<div class="panel panel-default">
		<div class="panel-heading">
		<h3 class="panel-title">User Info</h3>
		</div>
		<div class="panel-body">
			@for($i = 0; $i<=5;$i++)
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
								<a class="read-more">Read More</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			@endfor
		 </div>
	</div>
  </div>
  		 <div class="col-md-3">
		 	<div class="row">
		 		<div class="panel panel-primary" data-spy="affix" style="width:350px;">
		 			<div class="panel-heading text-center">Agent Details</div>
		 			<div class="panel-body">
		 				<div class="row">
		 					<div class="media">
		 						<a class="pull-left" href="#" style="padding-left: 5px;">
		 						<img src="/img/default-picture.jpg" style="width: 75px;height: 75px; background-size:cover; "class="img-responsive">
		 							
		 						</a>
		 						<div class="media-body">
		 							<p class="text-primary">
		 								Ron Brian Inson
		 							</p>
		 							<p  style="font-size: 14px; line-height: 0">
		 								Listing : 6
		 							</p>
		 							<p  style="font-size: 14px; line-height: 0">
		 								Affiliate : 1
		 							</p>

		 						</div>
		 					</div>
		 				</div>
		 			</div>
		 			<div class="panel-footer" style="padding: 0 15px !important;">
		 				<form class="form-vertical">
		 				   <h6 class="text-center" style="margin:3px 0 !important; font-size:14px;background-color: #f2f3f5;">ASK ABOUT THE PROPERTY</h6>
							 <div class="form-group">
		 					   <textarea style="width: 300px; height: 150px; font-size:14px;" > 
		 					  
		 					   </textarea>
		 					 </div>
		 					<div class=" form-group pull-right">
		 						<button class="btn btn-info" type="button" style="width:inherit;" id="btnSendEmail" data-to="$pro_usercode" data-prop="$prop_code"><i class="fa fa-envelope"></i>&nbsp;&nbsp;Contact agent</button>
		 					</div>
		 				</form>
		 			</div>

		 		</div>
		 	</div>
		 </div>
</div>
@endsection
