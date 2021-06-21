<div class="sharing-viewability-wrapper">
	<div class="col-md-12 well well-sm tab-location" data-tab="location">

		<div class="col-md-12">
			<p><small><strong>Location: </strong></small></p>
		</div>
		<div class="col-md-3" style="display: none;">
			<label class="checkbox sch_options label_locations" for="scb_brgy">
				<input type="checkbox" id="scb_brgy" data-toggle="checkbox" class="custom-checkbox scb_brgy opt_locations" checked>
				Barangay
			</label>
		</div>
		<div class="col-md-3" style="display: none;">
			<label class="checkbox sch_options label_locations" for="scb_street_address">
				<input type="checkbox" id="scb_street_address" data-toggle="checkbox" class="custom-checkbox scb_street_address opt_locations" checked>
				Street Address
			</label>
		</div>
		<div class="col-md-3" style="display: none;">
			<label class="checkbox sch_options label_locations" for="scb_village">
				<input type="checkbox" id="scb_village" data-toggle="checkbox" class="custom-checkbox scb_village opt_locations" checked>
				Village / Subdivision / District
			</label>
		</div>
		<div class="col-md-3" style="display: none;">
			<label class="checkbox sch_options label_locations" for="scb_maps">
				<input type="checkbox" id="scb_maps" data-toggle="checkbox" class="custom-checkbox scb_maps opt_locations" checked>
				Google Map
			</label>
		</div>


	</div>
	<div class="col-md-12 well well-sm tab-details" data-tab="details">

		<div class="col-md-12">
			<p><small><strong>Details:</strong></small></p>
		</div>
		<div class="col-md-3" style="display: none;">
			<label class="checkbox sch_options label_details" for="scb_description">
				<input type="checkbox" id="scb_description" data-toggle="checkbox" class="custom-checkbox scb_description opt_details" checked>
				Description
			</label>
		</div>
		{{-- <div class="col-md-3" style="display: none;">
			<label class="checkbox sch_options label_details" for="scb_rental_price">
				<input type="checkbox" id="scb_rental_price" data-toggle="checkbox" class="custom-checkbox opt_details" checked>
				Rental Price
			</label>
		</div>
		<div class="col-md-3" style="display: none;">
			<label class="checkbox sch_options label_details" for="scb_selling_price">
				<input type="checkbox" id="scb_selling_price" data-toggle="checkbox" class="custom-checkbox opt_details" checked>
				Selling Price
			</label>
		</div> --}}
		<div class="col-md-3" style="display: none;">
			<label class="checkbox sch_options label_details" for="scb_lot_area">
				<input type="checkbox" id="scb_lot_area" data-toggle="checkbox" class="custom-checkbox scb_lot_area opt_details" checked>
				Lot Area
			</label>
		</div>
		<div class="col-md-3" style="display: none;">
			<label class="checkbox sch_options label_details" for="scb_floor_area">
				<input type="checkbox" id="scb_floor_area" data-toggle="checkbox" class="custom-checkbox scb_floor_area opt_details" checked>
				Floor Area
			</label>
		</div>
		<div class="col-md-3" style="display: none;">
			<label class="checkbox sch_options label_details" for="scb_bathrooms">
				<input type="checkbox" id="scb_bathrooms" data-toggle="checkbox" class="custom-checkbox scb_bathrooms opt_details" checked>
				Bathrooms
			</label>
		</div>
		<div class="col-md-3" style="display: none;">
			<label class="checkbox sch_options label_details" for="scb_maid_room">
				<input type="checkbox" id="scb_maid_room" data-toggle="checkbox" class="custom-checkbox scb_maid_room opt_details" checked>
				Maid's Room
			</label>
		</div>
		<div class="col-md-3" style="display: none;">
			<label class="checkbox sch_options label_details" for="scb_parking">
				<input type="checkbox" id="scb_parking" data-toggle="checkbox" class="custom-checkbox scb_parking opt_details" checked>
				Parking
			</label>
		</div>
		<div class="col-md-3" style="display: none;">
			<label class="checkbox sch_options label_details" for="scb_rooms">
				<input type="checkbox" id="scb_rooms" data-toggle="checkbox" class="custom-checkbox scb_rooms opt_details" checked>
				Rooms
			</label>
		</div>
		<div class="col-md-3" style="display: none;">
			<label class="checkbox sch_options label_details" for="scb_balcony">
				<input type="checkbox" id="scb_balcony" data-toggle="checkbox" class="custom-checkbox scb_balcony opt_details" checked>
				Balcony
			</label>
		</div>

	</div>

	<div class="col-md-12 well well-sm tab-attachments" data-tab="attachments">

		<div class="col-md-12">
			<p><small><strong>Attachments:</strong></small></p>
			<div class="images-wrapper col-md-12">
				<div class="col-md-12 row">
					<small>Images:</small>
				</div>
				<div class="cb-imgs-container">
				{{-- images contents here --}}
				</div>
			</div>

			

		</div>

	</div>
	<div class="col-md-12 well well-sm tab-attachments" data-tab="attachments">
		<div class="documents-wrapper col-md-12">
				<div class="col-md-12 row">
					<small>Documents:</small>
				</div>
				<div class="cb-docs-container">
				{{-- documents contents here --}}
				</div>
			</div>
	</div>
</div>
<div class="col-md-12 well well-sm tab-attachments dp-none" data-tab="attachments">
	<div class="template-docs" style="display: none" >
		<div class="doc-container col-md-12 col-xs-12 col-lg-12">
			<label class="checkbox sch_options ch-docs" data-title="" for="scb_documents" style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">
				<input type="checkbox" value="" id="scb_documents" data-toggle="checkbox" class="custom-checkbox scb_documents" checked>
				<span class="doc-name">Document</span>
			</label>
		</div>
	</div>
</div>
<div class="template-imgs" style="display: none">
	<div class="img-container col-md-4 col-lg-4 col-xs-6 col-sm-6" style='margin-top:2px;margin-bottom: 2px;'>
		<div>
			<img src="" class="template_img cb_checked">
			<label class="checkbox template_label pull-right" data-title="" data-id="" style="position: absolute; bottom:1px; margin:0; right:1px; z-index: 100;" for="">
				<input data-id="" type="checkbox" data-toggle="checkbox" class="template_input" value="" id="" checked>
			</label>
		</div>
	</div>
</div>
