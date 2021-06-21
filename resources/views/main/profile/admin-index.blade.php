@extends('main.dashboard.base')
@section('styles')
<link rel="stylesheet" href="/assets/css/dashboard/dashboard.css">
<style>
.progress {
	height: 3px;
	margin-bottom: 0px;
}
.sidebar-offcanvas {
	display: none;
}
.navbar {
	display: none;
}
.thumb-price p i {
	color: #c6c6c6;
	padding: 0 8px;
}
.thumb-img {
	padding: 0px;
}

.panel-body .thumb-content {
	padding: 15px 15px 0px;
}
.panel-body .thumb-price {
	padding: 0px 15px 0px;
}
.panel-body .thumb-tag {
	padding: 15px 15px 0px;
}
.thumb-content h6 {
	margin: 0 0 5px;
	font-size: 14pt;
}

.thumb-price hr {
	margin: 10px 0 10px;
}
.thumb-price p {
	font-size: 15px;
	font-weight: 400;
	margin-bottom: 1px;
}
.thumb-price .text-muted {
	color: #888;
}
.thumb-table td {
	padding: 15px 10px 15px !important;
	font-size: 12px;
}
.thumb-table {
	margin-bottom: 0px;
}
.thumb-img:hover,
.thumb-img:active, {
	background-color: rgba(0,0,0, 0.5);
}
.ratio {
	background-position: center center;
	background-repeat: no-repeat;
	background-size: cover;
	height: 0;
	padding-bottom: 75%;
	position: relative;
	width: 100%;
}
.input-group {
	margin-bottom: 30px;
}
p {
	font-size: 14px;
	font-weight: 500
}
.detail h6 {
	font-size: 18px;
}
.detail span {
	margin-left: 20px;
	font-size: 12px;
}
.detail p {
	font-size: 16px;
	font-weight: 600;
}
.detail i {
	margin-right: 10px;
}
em {
	font-weight: 400;
}
.text-muted {
	color: #777;
}
.panel-body .thumb-price,.thumb-location {
	padding: 0px 15px 0px;
}
.thumb-location p {
	font-size: 13px;
	font-weight: 400;
	margin-bottom: 1px;
	color: #888
}
.table-borderless tbody tr td, .table-borderless tbody tr th, .table-borderless thead tr th {
	border: none;
	font-size: 13px;
}
.action-button {
	position: absolute;
	bottom: 0;
	right: 0;
	margin-bottom: 10px;
	margin-right: 10px;
}
.label-status {
	position: absolute;
	bottom: 10px;
	right: 40px;
}
.list_view {
	display: block;
}
</style>
@endsection
@section('content.inner')
<div class="{{ $mode === 'in_public' ? 'col-md-12 ' : 'col-sm-12 col-xs-12 content'}}">
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-12">

						<input type='hidden' name='_token' id="_token" value='{{ csrf_token() }}'/>
						<input type='hidden' name='id' id="id" value='{{ $user->id }}'/>
						<h2>Profile</h2>
						<ul class="breadcrumb">
							<li class="active">Profile</li>
						</ul>
						
					</div>
					{{-- <div class="col-md-6">
						<a href="#" class="pull-right btn btn-sm btn-primary" style="
						{{ auth()->user() && auth()->user()->user_code == $user->user_code ? 'display: none;' : 'display: none;' }}
						">
						<i class="fa fa-user-plus"></i> Add as Affiliate</a>
					</div> --}}
				</div>
				
				<hr>
				
			</div>
			<div class="col-md-6">
				<div class="row">
					<div class="col-md-12" style="margin-bottom:20px;">
						<div class="row">
							<div class="col-md-4">
								@if($user->profile_image === '')
								<img src="/avatars/basic.jpg"  alt="" width="120px" class='img-responsive img-circle' style="margin-bottom:10px"/>
								@else
								<img src='/avatars/{{ $user->profile_image }}' width="120px" class='img-responsive img-circle' style="margin-bottom:10px"/>
								@endif
							</div>
							<div class="col-md-8 detail">
								<h2>{{ $user->full_name }}</h2>
								<h3>{{ $user->headline}}</h3>
								@if($user->describe)

								<p style="white-space: pre-line;";>{{ $user->describe}}</p>

								@endif
							</div>
							{{--<div class="col-md-4">	--}}
							{{--<div class="pull-right">				--}}
							{{--<button class="btn btn-primary btn-sm" data-affiliate-id="" id="add_as_affiliate" onclick="affiliate.add_affiliate(this)">Add as Affiliate</button>--}}
							{{--<a type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal7"> Send Message</a>	--}}
							{{--</div>					--}}
							{{--</div>	--}}

						</div>
					</div>
					<div class="col-md-6">
						<table class="table table-borderless">				
							<tbody>
								<tr>
									<td>
										@if ($user->current_address)
										<strong>Location :</strong>
										@endif
									</td>
									<td class="text-muted">
										@if ($user->current_address)
										<em>{{ $user->current_address }}</em>
										@endif
									</td>						
								</tr>
								<tr>
									<td>
										@if ($user->email)
										<strong>Email :</strong>
										@endif
									</td>
									<td class="text-muted">
										@if ($user->email)
										<em>{{ $user->email }}</em>
										@endif
									</td>						
								</tr>
								<tr>
									<td>
										@if ($user->user_mobile)
										<strong>Mobile :</strong>
										@endif
									</td>
									<td class="text-muted">
										@if ($user->user_mobile)
										<em>{{ $user->user_mobile }}</em>
										@endif
									</td>						
								</tr>
								<tr>
									<td>
										@if ($user->user_phone)
										<strong>Phone :</strong>
										@endif
									</td>
									<td class="text-muted">
										@if ($user->user_phone)
										<em>{{ $user->user_phone }}</em>
										@endif
									</td>						
								</tr>
							</tbody>
						</table>		
					</div>
				</div>
			</div>	
			<div class="col-md-3">
              <div class="panel panel-default">
                <div class="panel-body">
                  <div class="pull-right text-muted">
                    <i class="fa fa-home" aria-hidden="true" style="font-size:30px; opacity:.4;"></i>
                  </div>
                  <h1 class="text-primary" style="margin:0px !important;">
                    <strong>{{$public}}</strong>
                  </h1>
                  <small class="text-muted" style="text-transform: uppercase;">
                    Total Public Listings
                  </small>
                  <div class="progress">
                    <div class="progress-bar progress-bar-primary" style="width: 10%">
                      
                    </div>
                  </div>
                </div>              
              </div>
             </div>		
             <div class="col-md-3">
              <div class="panel panel-default">
                <div class="panel-body">
                  <div class="pull-right text-muted">
                    <i class="fa fa-home" aria-hidden="true" style="font-size:30px; opacity:.4;"></i>
                  </div>
                  <h1 class="text-primary" style="margin:0px !important;">
                    <strong>{{$private}}</strong>
                  </h1>
                  <small class="text-muted" style="text-transform: uppercase;">
                    Total Private Listings
                  </small>
                  <div class="progress">
                    <div class="progress-bar progress-bar-primary" style="width: 10%">
                      
                    </div>
                  </div>
                </div>              
              </div>
             </div>	
		</div>
	</div>
	@if ($user->properties()->count())
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="col-md-12">
				<ul class="nav nav-tabs" style="margin-bottom:15px">
					<li class="active">
						<a href="#list" data-toggle="tab"><h3>Listings</h3></a>
					</li>
					<li>
						<a href="#require" data-toggle="tab"><h3>Requirements</h3></a>
					</li>
				</ul>
			</div>
			<div id="myTabContent" class="tab-content">
				<div class="tab-pane fade active in" id="list">
					@foreach($listings as $property)

					@include('main.dashboard.listings.partial.listview')
					@endforeach
				</div>
				<div class="tab-pane fade" id="require">

				</div>

			</div>
		</div>
	</div>
	@else
	@endif
</div>
{{-- <div class="col-sm-3 col-xs-12 ">
	<div class="panel panel-default">
		<div class="panel-heading">Contact Agent</div>
		<div class="panel-body">
			<form method="post" id="send_message" action="/threads">
				<input type='hidden' name='_token' value='{{ csrf_token() }}' />
				<input type="hidden" name="from_id" value="{{ auth()->check() ? auth()->user()->id : ''}}">
				<input type="hidden" name="to_id" value="{{  $user->id }}">

				<input type="hidden" name="profile_code" value="{{ $user->user_code }}">
				<input type="hidden" name="profile_name" value="{{ $user->fullname }}">
				<input type="hidden" class="form-control" id="subject" name="subject" placeholder="Subject" value="empty">
				@if(session()->get('message.success'))
				<div class='alert alert-success'>
					{{ session()->get('message.success') }}
				</div>
				@endif
				@if(session()->get('message.danger'))
				<div class='alert alert-danger'>
					{{ session()->get('message.danger') }}
				</div>
				@endif
				<div class="form-group">       
					<label>Fullname* <p style="display: none;" id="PFullname" class="text-danger">This is a required field</p></label>
					<input type="text" class="form-control" id="fullname" placeholder="Fullname" name="fullname" value="{{ auth()->check() ? auth()->user()->full_name : ''}}">
				</div>
				<div class="form-group"> 
					<label>Email* <p style="display: none;" id="PEmail" class="text-danger">This is a required field</p></label>                    
					<input type="text" class="form-control" id="email" placeholder="Email" name="email" value="{{ auth()->check() ? auth()->user()->email : ''}}">
				</div>
				<div class="form-group">
					<label>Message* <p style="display: none;" id="PMessage" class="text-danger">This is a required field</p></label>                    
					<textarea class="form-control" rows="3" id="message_txt" name="message" placeholder="Message" style="resize:none;"></textarea>
				</div>
				<button type="submit" id="send" class="btn btn-primary btn-block" name="send"><i class="fa fa-envelope" style="padding-right:10px;"></i>Send</button>
			</form>
		</div>	  	
	</div>
</div> --}}


<!-- Modal -->
<div class="modal fade" id="myModal7" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title">Message</h3>
			</div>
			<div class="modal-body">
				<form method="post" id="send_message" action="/threads">
					<input type='hidden' name='_token' value='{{ csrf_token() }}' />
					<input type="hidden" name="from_id" value="{{ auth()->check() ? auth()->user()->id : ''}}">
					<input type="hidden" name="to_id" value="{{  $user->id }}">

					<input type="hidden" name="profile_code" value="{{ $user->user_code }}">
					<input type="hidden" name="profile_name" value="{{ $user->fullname }}">
					<input type="hidden" class="form-control" id="subject" name="subject" placeholder="Subject" value="empty">
					@if(session()->get('message.success'))
					<div class='alert alert-success'>
						{{ session()->get('message.success') }}
					</div>
					@endif
					@if(session()->get('message.danger'))
					<div class='alert alert-danger'>
						{{ session()->get('message.danger') }}
					</div>
					@endif
					<div class="form-group">       
						<label>Fullname* <p style="display: none;" id="PFullname" class="text-danger">This is a required field</p></label>
						<input type="text" class="form-control" id="fullname" placeholder="Fullname" name="fullname" value="{{ auth()->check() ? auth()->user()->full_name : ''}}">
					</div>
					<div class="form-group"> 
						<label>Email* <p style="display: none;" id="PEmail" class="text-danger">This is a required field</p></label>                    
						<input type="text" class="form-control" id="email" placeholder="Email" name="email" value="{{ auth()->check() ? auth()->user()->email : ''}}">
					</div>
					<div class="form-group">
						<label>Message* <p style="display: none;" id="PMessage" class="text-danger">This is a required field</p></label>                    
						<textarea class="form-control" rows="3" id="message_txt" name="message" placeholder="Message" style="resize:none;"></textarea>
					</div>

				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary btn-xs" data-dismiss="modal">Cancel</button>
				<button type="submit" id="send" class="btn btn-primary btn-xs" name="send">Send</button>
			</div>
		</div>
	</div>
</div>

@endsection


@section('scripts')

<script>

$('#send').click(function (e) {
	e.preventDefault();

	var fullname = $('#fullname').val();
	var email = $('#email').val();
	var message = $('#message_txt').val();

	var error1 = 1,error2 = 1,error3 = 1,error4 = 1;

	if(fullname == '') {
		$('#PFullname').show();
		$('#fullname:visible').parent().addClass('has-error');
		error1 = 1;

	}
	else {
		$('#PFullname').hide();
		$('#fullname:visible').parent().removeClass('has-error');
		error1 = 0;
	}


	if(email == '') {
		$('#PEmail').show();
		$('#email:visible').parent().addClass('has-error');
		error2 = 1;
	}
	else {
		$('#PEmail').hide();
		$('#email:visible').parent().removeClass('has-error'); 
		error2 = 0;

	}


	


	if(message == '') {
		$('#PMessage').show();
		$('#message_txt:visible').parent().addClass("has-error");
		error4 = 1;

	}
	else {
		$('#PMessage').hide();
		$('#message_txt:visible').parent().removeClass("has-error"); 
		error4 = 0;
	}


	if(error1 == 0 && error2 == 0  && error4 == 0) {
		$('#send_message').submit();
	}
	else {
		console.log('hello');
	}


});

</script>

@endsection
