@extends('main.admin.prices.base')

@section('content.inner')

    <h3><i class="fa fa-plus"></i> Add Subscription Type</h3>
    <form method="post" action="/admin/prices/edit/update">
        <input type='hidden' name='_token' value='{{ csrf_token() }}'/>
        <input type='hidden' name='id' value='{{ $subscription->id }}'/>

        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" value="{{ $subscription->name }}" placeholder="Name of the package"
                   class="form-control"/>
        </div>
        <div class="form-group">
            <label>Listings</label>
            <input type="text" name="listings" value="{{ $subscription->listings }}"
                   placeholder="No. of Regular Post" class="form-control numbers_only"/>
        </div>
        <div class="form-group">
            <label>Requirements</label>
            <input type="text" name="requirements" value="{{ $subscription->requirements }}"
                   placeholder="No. of Requirements" class="form-control numbers_only"/>
        </div>
        <div class="form-group">
            <label>Affiliates</label>
            <input type="text" name="affiliates" value="{{ $subscription->affiliates }}" placeholder="No. of Affiliates"
                   class="form-control"/>
        </div>
        <div class="form-group">
            <label>Shared to user</label>
            <input type="text" name="shared_to_me" value="{{ $subscription->shared_to_me }}"
                   placeholder="No. of Received Listings from Share Feature" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Image Capacity</label>
            <input type="text" name="no_img" value="{{ $subscription->no_img }}"
                   placeholder="No. of Image in Regular Post" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Attachment Capacity</label>
            <input type="text" name="no_att" value="{{ $subscription->no_att }}"
                   placeholder="No. of Attachment in Regular Post" class="form-control"/>
        </div>
        <div class="form-group">
            <label>File size for Images (mb)</label>
            <input type="text" name="size_img_mb" value="{{ $subscription->size_img_mb }}"
                   placeholder="Maximum file size for image in Regular Post" class="form-control"/>
        </div>
        <div class="form-group">
            <label>File size for Attachments (mb)</label>
            <input type="text" name="size_att_mb" value="{{ $subscription->size_att_mb }}"
                   placeholder="Maximum file size for attachment in Regular Post" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Single Messaging</label>
            <select name="single_msg" class="form-control">
                <option value="default"></option>
                <option value="Yes" {{ $subscription->single_msg == 'Yes'? 'selected': '' }}>Yes</option>
                <option value="No" {{ $subscription->single_msg == 'No'? 'selected': '' }}>No</option>
            </select>
        </div>
        <div class="form-group">
            <label>Group Messaging</label>
            <select name="group_msg" class="form-control">
                <option value="default"></option>
                <option value="Yes" {{ $subscription->group_msg == 'Yes'? 'selected': '' }}>Yes</option>
                <option value="No" {{ $subscription->group_msg == 'No'? 'selected': '' }}>No</option>
            </select>
        </div>
        <div class="form-group">
            <label>Library</label>
            <select name="library" class="form-control">
                <option value="default"></option>
                <option value="Yes" {{ $subscription->library == 'Yes'? 'selected': '' }}>Yes</option>
                <option value="No" {{ $subscription->library == 'No'? 'selected': '' }}>No</option>
            </select>
        </div>
        <div class="form-group">
            <label>Group Subscription</label>
            <input type="text" name="group" value="{{ $subscription->group }}" class="form-control"
                   placeholder="No. of Group that can be subscribed"></input>
        </div>
        <div class="form-group">
            <label>Auto Matching</label>
            <select name="auto_matching" class="form-control">
                <option value="default"></option>
                <option value="Yes" {{ $subscription->auto_matching == 'Yes'? 'selected': '' }}>Yes</option>
                <option value="No" {{ $subscription->auto_matching == 'No'? 'selected': '' }}>No</option>
            </select>
        </div>

        <div class="form-group">
            <label>Price</label>
            <input type="text" name="price" value="{{ $subscription->price }}" class="form-control"
                   placeholder="Price"></input>
        </div>

        <div class="form-group">
            <label>Lifespan</label>
            <input type="text" name="lifespan" value="{{ $subscription->lifespan }}" class="form-control"
                   placeholder="Lifespan"></input>
        </div>

        <div class="form-group">
            <label>Unit of Measure</label>
            <select name="status" class="form-control">
                <option value="default"></option>
                <option value="day">Day</option>
                <option value="weeks">Weeks</option>
                <option value="months">Months</option>
                <option value="year">Years</option>
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
