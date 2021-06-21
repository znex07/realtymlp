@extends('main.dashboard.account.deactivate.base')



@section('content.inner')

<div class="panel panel-default">
	<div class="panel-body panel-padding">
		<h1>Deactivate Account</h1>
    <ul class="breadcrumb">
      <li><a href="#">Home</a></li>      
      <li><a href="#">Profile</a></li>
      <li class="active">Deactivate Account</li>
    </ul>
    <hr>
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          Please enter your password to continue
        </div>
        <div class="panel-body">
          <div class="media" style="margin-bottom:20px;">
            <a href="#" class="pull-left">
              <img alt="Bootstrap Media Another Preview" width="50px" height="50px" src="/img/default-picture.jpg" class="img-responsive media-object" />
            </a>
            <div class="media-body">                            
              <h3 style="margin-top:15px !important;">(User's Name)</h3>
            </div>            
          </div>
          The page you are trying to visit requires that you re-enter your password.
          <div class="form-group" style="margin-top:20px;">
            <label for="inputPassword" class="col-lg-2 control-label">Password</label>
            <div class="col-lg-10">
              <input type="password" class="input-sm form-control" id="inputPassword" placeholder="Password">              
            </div>
          </div>
        </div>
        <div class="panel-footer clearfix">
          <a href="/dashboard/account/deactivate/" class="btn btn-primary pull-right btn-xs">Continue</a>
        </div>
      </div>
    </div>

  </div>

</div>


@endsection