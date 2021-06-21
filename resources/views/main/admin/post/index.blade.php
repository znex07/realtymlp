@extends('main.admin.base')
@section('styles')
<link rel="stylesheet" href="/assets/css/basic.min.css">
<link rel="stylesheet" href="/assets/css/dropzone.min.css">
<link rel="stylesheet" href="/assets/admincss/select2.min.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="/assets/css/alertify.min.css">
<style>
.dropzone-status {
	font-size:14px;
}
.nopad{
	padding-left: 0 !important;
	padding-right: 0 !important;
}
.nopad-left {
	padding-left: 0 !important;
}
.nopad-right {
	padding-right: 0 !important;
}
hr {
	border-top: 1px solid #ccc;
}
#ui-datepicker-div {
	z-index:989999 !important;
}
.dz-progress{
	display: none !important;
}
.dz-removeBtn{
	position:absolute;
	top:3;
	right:3;
	padding:3px;
	ex:99;
	background:rgba(255,255,255,0.2);
	color:red;
}
.map-control div:not(#map-btn-desc){
	display: inline;
	margin: 0 5px;
	padding: 0 !important;
}
.map-control #map-btn-desc{
	font-size: 12px;
	padding: 5px;
	width: 200px;
	word-break: keep-all;
}
.map-control div label {
	font-size: 12px;
	line-height: 0;
	margin: 0 2px;
	cursor: pointer;
	width: ;
}
#rmv-mrk {
	color: #888;
	cursor: pointer;
	transition: color .5s;
	-webkite-transition: color .5s;
	-moz-transition: color .5s;
}
#rmv-mrk:hover {
	color: black;
}
.map-control {
	background: rgba(255,255,255,0.66);
	padding: 2px;
	border-radius: 1px;
	border: 1px solid #e6e6e6;
}
.map-control:hover{
	background: white;
}
</style>
@endsection

@section('content')
<input type='hidden' id="_token" name='_token' value='{{ csrf_token() }}' />
<input type='hidden' id="_project_code" name='_project_code' value="P{{date('mdY').time()}}" />
<div class="hidden" id="unit-codes-container">

</div>
<!-- Modal -->
<div class="modal fade" id="modal_developer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document" style="width: 30%;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Add Developer</h4>
			</div>
			<div class="modal-body">
				<form method="post" id="formDeveloper" action="/admin/post/addDeveloper">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="dev_name">Developer name</label>
							<input type="text" name="dev_name" id="dev_name" class="form-control" placeholder="Developer Name">
						</div>
					</div>
				</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-primary" onclick="post.add_developer()" id="add_developer">Add</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="modal_units" tabindex="-1" role="dialog" aria-labelledby="myModalLabelUnit">
	<div class="modal-dialog" style="width:50%" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" onclick="post.destroy_units()" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabelUnit">Add Unit Entry</h4>
			</div>
			<div class="modal-body">

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" onclick="post.destroy_units()" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-primary" onclick="post.add_unit()" id="add_unit">Add</button>
			</div>
		</div>
	</div>
</div>


<section id="main-content">
	<section class="wrapper">
		<form method="post" id="formFeatured" enctype="multipart/form-data" action="/admin/post/postFeatured">
		<div class="col-md-6">


				{{-- Developer --}}
				<div class="col-md-12">
					<h3>Developer</h3>
					<div class="form-group">
						<label for="developer_code">Select Developer *</label>
						<div></div>
						<select name="developer_code" id="developer_code" required class="form-control select2" style="width:80%;">
							<option></option>
							@foreach($developers as $developer)
							<option value="{{ $developer->developer_code }}">{{ $developer->developer_name }}</option>
							@endforeach
						</select>
						<button class="btn btn-xs btn-primary pull-right" data-toggle="modal" data-target="#modal_developer" type="button" style=""><i class="fa fa-plus"></i> Add Developer</button>
					</div>
				</div>

				{{-- Project --}}
				<div class="col-md-12">
					<hr>
					<h3>Project</h3>
					<div class="form-group">
						<label for="project_name">Project Name (aka. Brand Name)</label>
						<input type="text" class="form-control" name="project_name" id="project_name" placeholder="Project Name">
					</div>
					<div class="form-group">
						<label for="property_classification">Property Classification</label>
						<select name="property_classification" required id="property_classification" class="form-control select2" multiple>
							<option></option>
							@foreach($classifications as $classification)
							<option value="{{ $classification->id }}"> {{ $classification->department_name }} </option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="project_description">Project Description</label>
						<textarea name="project_description" id="project_description" style="resize: vertical;height:150px;" class="form-control" placeholder="Description"></textarea>
					</div>
					<div class="form-group">
						<label for="whats">What's in the Unit</label>
						<textarea name="whats" id="whats" style="resize: vertical;height:150px;" class="form-control" placeholder="What's in the Unit"></textarea>
					</div>
					<div class="form-group">
						<label for="building_amenities">Building Amenities</label>
						<textarea name="building_amenities" id="building_amenities" style="resize: vertical;height:150px;" class="form-control" placeholder="Building Amenities"></textarea>
					</div>
					<div class="form-group">
						<label for="facilities_services">Facilities and Services</label>
						<textarea name="facilities_services" id="facilities_services" style="resize: vertical;height:150px;" class="form-control" placeholder="Facilities and Services"></textarea>
					</div>
					<div class="form-group">
						<label for="commercial_area">Commercial Area</label>
						<textarea name="commercial_area" id="commercial_area" style="resize: vertical;height:150px;" class="form-control" placeholder="Commercial Area"></textarea>
					</div>
					<div class="col-md-12 nopad">
						<h5><strong>Project Availability</strong></h5>
						<div class="col-md-4 nopad-left">
							<div class="form-group">
								<label for="availability_year">Year</label>
								<select name="availability_year" id="availability_year" class="form-control">
									<option></option>
									@foreach($years as $year)
									<option value="{{ $year }}">{{ $year }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="availability_quarter">Quarter</label>
								<select name="availability_quarter" id="availability_quarter" class="form-control">
									<option></option>
									@foreach($quarters as $quarter)
									<option value="{{ $quarter }}">{{ $quarter }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-md-4 nopad-right">
							<div class="form-group">
								<label for="availability_month">Year</label>
								<select name="availability_month" id="availability_month" class="form-control">
									<option></option>
									@foreach ($months as $month=>$value)
									<option value="{{ $month }}">{{ $value }}</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>
					<div class="col-md-12 nopad">
						<h5><strong>Locations</strong></h5>
						<div class="col-md-6 nopad-left">
							<div class="form-group">
								<label for="province">Province *</label>
								<select class="form-control" id="province" onchange="mapa.geocodeFeatured()" name="province" required>
									<option></option>
									@foreach($provinces as $province)
									<option value="{{ $province->id }}">{{ $province->name }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-md-6 nopad-right">
							<div class="form-group">
								<label for="city">City *</label>
								<select class="form-control" onchange="mapa.geocodeFeatured()" disabled id="city" name="city" required>
									<option></option>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="street_address">Street Address</label>
						<input type="text" onchange="mapa.geocodeFeatured()" class="form-control" name="street_address" id="street_address" placeholder="Street Address">
					</div>
					<div class="form-group">
						<label for="brgy">Barangay</label>
						<input type="text" class="form-control" id="brgy" name="brgy" placeholder="Barangay">
					</div>
					<div class="form-group">
						<label for="geopolitical_location">Geopolitical Location</label>
						<input type="text" class="form-control" id="geopolitical_location" name="geopolitical_location" placeholder="Geopolitical Location">
					</div>
					<div class="form-group" id="map-wrapper">
						<div>
							<div class="map-control">
								<div>
									<input data-content="Please drag &amp; drop the red pin to where the location is" type="checkbox" id="pin" onchange="mapa.map_button(this); mapa.popover();" class="map-btn">
									<label for="pin"> Drop a Pin</label>
								</div>
								<div>
									<input data-content="Please drag &amp; drop the red circle to where the location is. You can re-size the circle by dragging the small white circle" type="checkbox" id="area" onchange="mapa.map_button(this); mapa.popover();" class="map-btn">
									<label for="area"> Drop an Area</label>
								</div>
								<div id="map-btn-remove" style="display: none;"><input type="button" onclick="mapa.map_button(this)" id="rmv-mrk" class="hidden"> <label for="rmv-mrk"><i id="rmv-mrk1" class="fa fa-times"></i>  Clear</label></div>
								<div id="map-btn-desc" style="display:none;"></div>
							</div>
							<div id="map" style="height: 300px;"></div>
              <input type="hidden" id="complete_address" value="">
              <input type="hidden" value="" name="google_lang">
              <input type="hidden" value="" name="google_lat">
              <input type="hidden" id="marker_type" name="marker_type">
              <input type="hidden" name="map_options">
						</div>
					</div>

					{{-- <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal_units"><i class="fa fa-plus"></i> Add Unit Entry</a> --}}
					{{-- <hr> --}}
					<a role='button' href='/admin/post/unit' class="btn btn-info btn-block" style="" target="_blank">Add Unit Entry</a>
					<button type="button" class="btn btn-success btn-block" style="" id="submitFeatured"><i class="fa fa-check"></i> <span>Submit</span></button>
				</div>

		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="">Brand Image <span class='label dropzone-status-8 dropzone-status'></span></label>
				<div class="form-group dropzone dropzone-8" id="dropzone-8">
					<div class="dropzone-previews-8"></div>
				</div>
			</div>
			<div class="form-group">
				<label for="dropzone-1">Vicinity Map <span class='label dropzone-status-1 dropzone-status'></span></label>
				<div class="form-group dropzone" id="dropzone-1">
					<div class="dropzone-previews-1"></div>
				</div>
			</div>
			<div class="form-group">
				<label for="dropzone-2">Site Development Plan <span class='label dropzone-status-2 dropzone-status'></span></label>
				<div class="form-group dropzone" id="dropzone-2">
					<div class="dropzone-previews-2"></div>
				</div>
			</div>
			<div class="form-group">
				<label for="dropzone-3">Floor Plans <span class='label dropzone-status-3 dropzone-status'></span></label>
				<div class="form-group dropzone" id="dropzone-3">
					<div class="dropzone-previews-3"></div>
				</div>
			</div>
			<div class="form-group">
				<label for="dropzone-4">Amenities <span class='label dropzone-status-4 dropzone-status'></span></label>
				<div class="form-group dropzone" id="dropzone-4">
					<div class="dropzone-previews-4"></div>
				</div>
			</div>
			<div class="form-group">
				<label for="dropzone-6">Other Images <span class='label dropzone-status-6 dropzone-status'></span></label>
				<div class="form-group dropzone" id="dropzone-6">
					<div class="dropzone-previews-6"></div>
				</div>
			</div>
		</div>
		{{-- <div class="col-md-6 units-preview-container">

		</div> --}}
		</form>
	</section>
</section>
{{-- start units template --}}
{{-- <div class="units-preview" style='display: none;'>
	<div class="col-md-6">
		<div class="panel panel-info">
			<div class="panel-body">
				<a href="#">
					<img  src="" class="img-responsive" style=" height:210px; width:302px; ">
					<h6><span class='unitprev-title'>Title</span></h6>
				</a>
			</div>
		</div>
	</div>
</div>
<div class="unit-wrapper" style='display: none;'>
	<div class="col-md-12 unit-container">
		<h3>Unit</h3>
		<div class="form-group unit_name">
			<label for="project_description">Unit Type Name</label>
			<input type="text" class="form-control" name="unit_name" placeholder="Unit Type Name">
		</div>
		<div class="form-group unit_codename">
			<label for="">Unit Type Code</label>
			<input type="text" class="form-control" name="unit_codename" placeholder="Unit Type Code">
		</div>
		<div class="col-md-12 nopad">
			<div class="form-group property_type">
				<label for="">Property Type</label>
				<select name="property_type" id="" style="width: 100%;" class="form-control property_type">
					<option></option>
				</select>
			</div>
		</div>
		<div class="col-md-6 nopad-left">
			<div class="form-group min-price">
				<label>Min Price</label>
				<div class="input-group">
					<span class="input-group-addon">Php</span>
					<input type="number" placeholder='Minumum Price' class="form-control">
				</div>
			</div>
		</div>
		<div class="col-md-6 nopad-right">
			<div class="form-group max-price">
				<label>Max Price</label>
				<div class="input-group">
					<span class="input-group-addon">Php</span>
					<input type="number" placeholder='Maximum Price' class="form-control">
				</div>
			</div>
		</div>
		<div class="col-md-12 nopad">
			<div class="col-md-4 nopad-left">
				<div class="form-group dateupdated">
					<label for="myDate">Updated at</label>
					<input type="text" placeholder='Updated at' name="myDate" class="form-control" id="myDate">
				</div>
			</div>
		</div>

		<div class="col-md-5 nopad">
			<div class="form-group quantity_total">
				<label for="">Quantity Total</label>
				<input type="number" placeholder='Total Quantity' class="form-control">
			</div>
		</div>
		<div class="col-md-2 text-center">
			<div class="form-group">
				<label for=""></label>
				<span class='form-control' style="border:none;font-size:16px;">/</span>
			</div>
		</div>
		<div class="col-md-5 nopad">
			<div class="form-group quantity_available">
				<label for="">Quantity Available</label>
				<input type="number" placeholder='Quantity Available' class="form-control">
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<div class="form-group unit_area">
					<label>Unit Area</label>
					<input type="text" placeholder='Unit Area' class="form-control">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group rooms">
					<label>No. of Room</label>
					<input type="number" placeholder='Room' class="form-control">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group bathroom">
					<label>No. of Bathroom</label>
					<input type="number"  placeholder='Bathroom' class="form-control">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group parking">
					<label>No. of Parking</label>
					<input type="number" placeholder="Parking" class="form-control">
				</div>
			</div>
		</div>
		<!-- <div class="form-group">
			<label for="">Unit Brand Image</label>
			<div class="form-group dropzone dropzone-9" id="dropzone-9">
				<div class="dropzone-previews-9"></div>
			</div>
		</div> -->
		<div class="form-group">
			<label for="">Unit Layout Plans</label>
			<div class="form-group dropzone dropzone-5" id="dropzone-5">
				<div class="dropzone-previews-5"></div>
			</div>
		</div>
		<div class="form-group">
			<label for="">Other Images</label>
			<div class="form-group dropzone dropzone-7" id="dropzone-7">
				<div class="dropzone-previews-7"></div>
			</div>
		</div>

	</div>
</div> --}}

<div class="unit-form-wrapper" style="display:none;">

</div>
@endsection

@section('script')
{{-- <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script> --}}
<script type='text/javascript' src='/assets/adminjs/lodash.min.js'></script>
<script type="text/javascript" src="/assets/adminjs/select2.min.js"></script>
<script type="text/javascript" src="/assets/js/alertify.min.js"></script>
<script type="text/javascript" src="/assets/adminjs/post.js"></script>
<script type='text/javascript' src='/assets/js/jquery.numeric.min.js'></script>script>
<script src='/assets/js/dropzone.min.js'></script>
<script src="http://maps.googleapis.com/maps/api/js?v=3.20&sensor=true" type="text/javascript"></script>
<script type='text/javascript' src='/assets/js/gmaps.js'></script>
<script type='text/javascript' src='/assets/js/mapa.js'></script>
<script>

$(function(){

	post.init();

	$('#developer_code').select2({
		placeholder:'Select a Developer',
	});
	$('#property_classification').select2({
		placeholder:'Select a Property Classification',
	});
	$('#availability_year').select2({
		placeholder:'Select Year'
	});
	$('#availability_quarter').select2({
		placeholder:'Select Quarter'
	});
	$('#availability_month').select2({
		placeholder:'Select Month'
	});

	$('#city').select2({
		placeholder:'Select City',
	});
	$('#province').select2({placeholder:'Choose Province'}).on('change', function() {
		$('#city').empty().append('<option></option>');
	});


	mapa.init();
});
</script>
@endsection
