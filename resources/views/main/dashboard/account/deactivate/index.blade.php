@extends('main.dashboard.account.deactivate.base')



@section('content.inner')

<div class="panel panel-default">
	<div class="panel-body panel-padding">
		<h2>Deactivate Account</h2>
    <ul class="breadcrumb">
      <li><a href="#">Home</a></li>      
      <li><a href="#">Profile</a></li>
      <li class="active">Deactivate Account</li>
    </ul>
    <hr>
    <div class="col-md-12">
      <h3>Are you sure you want to deactivate your account?</h3>
      Deactivating your account will disable your profile and properties from most listings you've post and shared on Realtymlp. 
      <hr>
      <h3>Before you deactivate your account, know this: </h3>
      <ul>
        <li>All your Affiliates will be deleted.</li>
        <li>All listings that you've post and shared to your affiliates or group will be deleted.</li>
        <li>Your account will be permanently removed from Realty MLP.</li>
      </ul>
    </div>
    <div class="col-md-12">
      <hr>
    </div>
    <div class="col-md-12">
      <div class="pull-right">
        <a href="/auth/logout" class="btn btn-primary btn-xs">Deactivate</a>
        <a href="/dashboard/account" class="btn btn-default btn-xs">Cancel</a>
      </div>
    </div>
  </div>
</div>


@endsection