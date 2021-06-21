@extends('main.dashboard.affiliates.base')

@section('styles')
<link href='/assets/css/affiliates.css'  rel='stylesheet' />
<style>
.template_img {
	transition: border-color .25s linear;
	cursor:pointer;
	width:100%;
	height: 120px; 
	background: #fff;
	background-size:cover;
	position: relative;
}
.cb_checked {
	border:5px solid #1abc9c;
}
.cb_uncheck {
	border:5px solid #bdc3c7;
}

</style>
@endsection

@section('content.inner')
@include('main.dashboard.affiliates.partials.modal')
{{-- @if(!auth()->user()->affiliates()->count()) --}}
<input type="hidden" value="{{ csrf_token() }}">
<input type="hidden" id='aff-name' value="{{ $user->full_name }}">
<div class="panel panel-default">
	<div class="panel-body">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row">	
					<div class="col-md-8">
						<div class="row">
							<ul class="breadcrumb">
								<li><a href="/profile/{{ $user->user_code }}/ {{ str_slug($user->full_name) }}">{{ $user->full_name }}</a></li>
								<li class="active">View Shared Listings</li>
							</ul>
						</div>
					</div>
					<div class="col-md-4 text-right aff-view-mode">			
					{{--dd	{{$properties->count()}}--}}
						<label>View Mode: </label>                      
						<div class="btn-group">
							<a class="list_public btn-sm btn btn-primary active" onclick="affiliate.arrange_listing(this);" href="#fakelink"><span class="fui-list-numbered"></span></a>
							<a class="grid_public btn-sm btn btn-primary" onclick="affiliate.arrange_listing(this);" href="#fakelink"><span class="fui-list-small-thumbnails"></span></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		@if (!$properties->count())
		@include('main.dashboard.affiliates.partials.no_shared')
		@endif
		<div class="row">
			<div class="col-md-12" style="margin-top: 20px !important;">
				@foreach ($properties as $property)

				<div class="aff-properties-container">
					<input type="hidden" value="{{ $property->pivot->user_id }}" class="user_id">
					<input type="hidden" value="{{ $property->pivot->property_id }}" class="property_id">
					<input type="hidden" value="{{ $property->pivot->sharables }}" class="sharables">
					 <input type="hidden" value="{{ $property->pivot->id }}" class="pivot_id">
					@include('main.dashboard.listings.partial.property')
				</div>
				@endforeach
				<div class="aff-checkbox-container">
					@include('main.dashboard.profile.checkbox')
				</div>
			{{-- <div style="display: none;" class="aff-attachment-container">
				<div class="col-md-12 well well-sm" data-tab="attachments">

					<div class="col-md-12">
						<p><small><strong>Attachments:</strong></small></p>
						<div class="col-md-12">
							<p><small><strong>Images:</strong></small></p>
							<div id="aff-img-container" class="row"></div>
						</div>
						<div class="col-md-12">
							<p><small><strong>Documents:</strong></small></p>
							<div id="aff-doc-container" class="row"></div>
						</div>
					</div>

				</div>
			</div> --}}
		</div>
	</div>
</div>
</div>

@endsection

@section('scripts')
<script type='text/javascript' src='/assets/js/datum/affiliates.js'></script>

<script type='text/javascript' src='/assets/js/sharing.js'></script>
<script type='text/javascript' src='/assets/js/affiliates.js'></script>
<script>
$(function() {
	var length = $('.aff-properties-container').length;
	if (length) {
		affiliate.init_shared();
	}
	$('#save_changes').bind('click',affiliate.set_sharables);
    	// $('.sch_options').parent().hide();

	   //  $('.aff-show-option').on('click',function(e) {
	   //  	e.preventDefault();
	   //  	var $this = $(this);
	   //  	var cb = $this.parents('div.aff-properties-container').find('div.aff-checkbox-container').clone();

	   //  	if ($this.hasClass('clicked')) {
	   //  		$this.removeClass('clicked');
	   //  	}
	   //  	else {
	   //  		$this.addClass('clicked');
	   //  		cb.fadeIn();
				// $(this).parents('div.panel-body').append(cb);
	   //  	}

	   //  });
});
</script>
@endsection

