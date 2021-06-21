@extends('main.admin.prices.base')

@section('content.inner')

	<h3><i class="fa fa-plus"></i> Add Subscription Type</h3>
	<form method="post" action="/admin/prices/new/create">
            <input type='hidden' name='_token' value='{{ csrf_token() }}' />

		<div class="form-group">
			<label>Name</label>
			<input type="text" name="name" placeholder="Name of the subscription" class="form-control"/>
		</div>
		<div class="form-group">
			<label>Listings</label>
			<input type="text" name="listings" placeholder="No. of Listings" class="form-control numbers_only"/>
		</div>
		<div class="form-group">
			<label>Requirements</label>
			<input type="text" name="requirements" placeholder="No. of Requirements" class="form-control numbers_only"/>
		</div>
		<div class="form-group">
			<label>Affiliates</label>
			<input type="text" name="affiliates" placeholder="No. of Affiliates" class="form-control numbers_only"/>
		</div>
		<div class="form-group">
			<label>Shared to user</label>
			<input type="text" name="shared_to_me" placeholder="No. of Received Listings from Share Feature" class="form-control numbers_only"/>
		</div>
		<div class="form-group">
			<label>Image Capacity</label>
			<input type="text" name="no_img" placeholder="No. of Image in Regular Post" class="form-control numbers_only"/>
		</div>
		<div class="form-group">
			<label>Attachment Capacity</label>
			<input type="text" name="no_att" placeholder="No. of Attachment in Regular Post" class="form-control numbers_only"/>
		</div>
		<div class="form-group">
			<label>File size for Images (mb)</label>
			<input type="text" name="size_img_mb" placeholder="Maximum file size for image in Regular Post" class="form-control numbers_only"/>
		</div>
		<div class="form-group">
			<label>File size for Attachments (mb)</label>
			<input type="text" name="size_att_mb" placeholder="Maximum file size for attachment in Regular Post" class="form-control numbers_only"/>
		</div>
		<div class="form-group">
			<label>Single Messaging</label>
			<select name="single_msg" class="form-control">
				<option value="default"></option>
				<option value="Yes">Yes</option>
				<option value="No">No</option>
			</select>
		</div>
		<div class="form-group">
			<label>Group Messaging</label>
			<select name="group_msg" class="form-control">
				<option value="default"></option>
				<option value="Yes">Yes</option>
				<option value="No">No</option>
			</select>
		</div>
		<div class="form-group">
			<label>Library</label>
			<select name="library" class="form-control">
				<option value="default"></option>
				<option value="Yes">Yes</option>
				<option value="No">No</option>
			</select>
		</div>
		<div class="form-group">
			<label>Group Subscription</label>
			<input type="text" name="group" class="form-control numbers_only" placeholder="No. of Group that can be subscribed"></input>
		</div>
		<div class="form-group">
			<label>Auto Matching</label>
			<select name="auto_matching" class="form-control">
				<option value="default"></option>
				<option value="Yes">Yes</option>
				<option value="No">No</option>
			</select>
		</div>

		<div class="form-group">
			<label>Price</label>
			<input type="text" name="price" class="form-control numbers_only" placeholder="Price"></input>
		</div>
		<div class="form-group">
			<label>Lifespan</label>
			<input type="text" name="lifespan" class="form-control numbers_only" placeholder="Lifespan">
		</div>
		<div class="form-group">
			<label>Unit of Measure</label>
			<select name="uom" class="form-control">
				<option value="default"></option>
				<option value="day">Day</option>
				<option value="weeks">Weeks</option>
				<option value="months">Months</option>
				<option value="year">Year</option>
			</select>
		</div>
		<div class="form-group">
			<label>Status</label>
			<select name="status" class="form-control">
					<option value="default"></option>
					<option value="active">Active</option>
					<option value="inactive">Inactive</option>
			</select>
		</div>

		<div class="form-group">
			<button name="submit" onclick="opener.location.href = opener.location.href; window.close();" type="submit" class="btn btn-info">Submit</button>
		</div>
	</form>


@endsection
