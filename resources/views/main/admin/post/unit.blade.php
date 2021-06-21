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
</style>
@endsection

@section('content')
<input type='hidden' id="_token" name='_token' value='{{ csrf_token() }}' />
<input type='hidden' id="_unit_code" name='_unit_code' value="U{{date('mdY').time()}}" />
<div class="hidden" id="unit-codes-container">

</div>
<!-- Modal -->

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
		<form method="post" id="formFeatured" enctype="multipart/form-data" action="/admin/post/postUnit">
		<div class="col-md-6">
				{{-- Developer --}}
				<div class="col-md-12">
					<h3>Developer</h3>
					<div class="form-group">
						<label for="developer_code">Select Developer *</label>
						<select name="developer_code" id="developer_code" required class="form-control select2">
							<option></option>
							@foreach($developers as $developer)
							<option value="{{ $developer->developer_code }}">{{ $developer->developer_name }}</option>
							@endforeach
						</select>
					</div>
				</div>
				{{-- Project --}}
        <div class="col-md-12">
					<h3>Project</h3>
					<div class="form-group">
						<label for="project_code">Select Project *</label>
						<select name="project_code" id="project_code" required disabled class="form-control select2">
							<option></option>
							<option>1</option>
							<option>2</option>
						</select>
					</div>
				</div>

				{{-- Units --}}
				<div class="col-md-12 unit-container">
					<h3>Unit</h3>
					<div class="form-group unit_name">
						<label for="project_description">Unit Type Name *</label>
						<input type="text" class="form-control" required id="unit_name" name="unit_name" placeholder="Unit Type Name">
					</div>
					<div class="form-group unit_codename">
						<label for="">Unit Type Code *</label>
						<input type="text" class="form-control" required id="unit_codename" name="unit_codename" placeholder="Unit Type Code">
					</div>
					<div class="col-md-12 nopad">
						<div class="form-group property_type">
							<label for="property_type">Property Type *</label>
							<select name="property_type" disabled id='property_type' required class="form-control property_type">
								<option></option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group min-price">
								<label for="min_price">Min Price</label>
								<div class="input-group">
									<span class="input-group-addon">Php</span>
									<input type="text" id='min_price' name='min_price' placeholder='Minumum Price' class="form-control numeric">
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group max-price">
								<label for='max_price'>Max Price</label>
								<div class="input-group">
									<span class="input-group-addon">Php</span>
									<input type="text" id='max_price' name='max_price' placeholder='Maximum Price' class="form-control numeric">
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group dateupdated">
								<label for="myDate">Updated at</label>
								<input type="text" placeholder='Updated at' name="myDate" class="form-control" id="myDate">
							</div>
						</div>
					</div>
					<div class='row'>
						<div class="col-md-6">
							<div class="form-group quantity_total">
								<label for="quantity_total">Quantity Total</label>
								<input type="number" placeholder='Total Quantity' name='quantity_total' id='quantity_total' min='0' class="form-control">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group quantity_available">
								<label for="quantity_available">Quantity Available</label>
								<input type="number" placeholder='Quantity Available' name='quantity_available' id='quantity_available' min='0' class="form-control">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="form-group unit_area">
								<label for='unit_area'>Unit Area</label>
								<input type="text" placeholder='Unit Area' name='unit_area' id='unit_area' class="form-control">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group rooms">
								<label for='rooms'>No. of Room</label>
								<input type="number" name='rooms' id='rooms' placeholder='Room' min='0' class="form-control">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group bathroom">
								<label for='bathrooms'>No. of Bathroom</label>
								<input type="number"  placeholder='Bathroom' name='bathrooms' id='bathrooms' min='0' class="form-control">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group parking">
								<label for='parkings'>No. of Parking</label>
								<input type="number" id='parkings' name='parkings'  placeholder="Parking" min='0' class="form-control">
							</div>
						</div>
					</div>

				</div>


		</div>
		<div class="col-md-6">
			<h3>Images</h3>
			<div class="form-group">
				<label for="">Unit Layout Plans <span class='label dropzone-status-5 dropzone-status'></label>
				<div class="form-group dropzone dropzone-5" id="dropzone-5">
					<div class="dropzone-previews-5"></div>
				</div>
			</div>
			<div class="form-group">
				<label for="">Other Images <span class='label dropzone-status-5 dropzone-status'></label>
				<div class="form-group dropzone dropzone-7" id="dropzone-7">
					<div class="dropzone-previews-7"></div>
				</div>
			</div>
			<button class="btn btn-block btn-success" type='button' id="submit">
				<i class="fa fa-check"></i> <span>Submit</span>
			</button>
		</div>
		</form>
	</section>
</section>
{{-- start units template --}}

@endsection

@section('script')
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script type='text/javascript' src='/assets/js/jquery.numeric.min.js'></script>
<script type='text/javascript' src='/assets/adminjs/lodash.min.js'></script>
<script type="text/javascript" src="/assets/adminjs/select2.min.js"></script>
<script type="text/javascript" src="/assets/js/alertify.min.js"></script>
<script type="text/javascript" src="/assets/adminjs/post.js"></script>
<script type="text/javascript" src="/assets/adminjs/post-unit.js"></script>
<script src='/assets/js/dropzone.min.js'></script>
<script>

$(function(){

	unit.init();




	// mapa.init();
});
</script>
@endsection
