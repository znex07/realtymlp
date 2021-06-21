@extends('main.admin.base')
@section('styles')
  <link rel="stylesheet" href="/assets/admincss/select2.min.css">
  <style>

  </style>
@endsection

@section('content')

<section id="main-content">
	<section class="wrapper">
    <div class="row">
    <div class="col-md-6">
      <form method="post" action="/admin/group/postCreate">
        <input type="hidden" name='_token' value="{{csrf_token()}}" />
        <h3>Create Group</h3>
        <div class="form-group">
          <label for="user_id" class="form-label">Select Owner to this Group *</label>
          <select name="owner_id" required id="owner_id" class="form-control">
            <option></option>
            @foreach($users as $user)
            <option value="{{ $user->id }}">{{ $user->full_name }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="group_title" class="form-label">Group Title *</label>
          <input type='text' required class="form-control" name="group_title" value="" placeholder="Group Title" id="group_title" />
        </div>
        <div class="form-group">
          <label for="group_description" class="form-label">Group Description</label>
          <textarea class="form-control" name="group_description" value="" placeholder="Group Description" style="resize: vertical; height:150px;"></textarea>
        </div>
        <div class="form-group">
          <label for="user_id" class="form-label">Invite user to join Group</label>
          <select name="user_id[]" id="user_id" class="form-control" multiple>
            <option></option>
            @foreach($users as $user)
            <option value="{{ $user->id }}">{{ $user->full_name }}</option>
            @endforeach
          </select>
        </div>
        <button type="submit" class="btn btn-success btn-block">Submit</button>
      </form>
    </div>
    </div>
	</section>
</section>
@endsection

@section('script')
<script src="/assets/adminjs/select2.min.js"></script>
<script>
$(function() {
  $('#user_id').select2({
    placeholder: 'Add User to Group',
  });
  $('#owner_id').select2({
    placeholder: 'Select Owner of the Group',
  });
});
</script>
@endsection
