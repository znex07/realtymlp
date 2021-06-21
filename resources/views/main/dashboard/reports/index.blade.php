@extends('main.dashboard.reports.base')

@section('content.inner')
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-body">
        <ul class="breadcrumb">
          <li><a href="dashboard/overview">Overview</a></li>
          <li class="active">Reports</li>
        </ul>
        <hr>
        <div class="row" style="padding:30px;">
         <div class="col-md-6">
          <a href="/dashboard/reports/listings">
            <button style="height: 100px;" class="btn btn-block btn-info btn-lg">
             <i class="fa fa-list-alt" style="margin-right: 10px;"></i>LISTINGS</button>
           </a>
         </div>
         <div class="col-md-6">
          <a href="/dashboard/reports/affiliates">
            <button style="height: 100px;" class="btn btn-block btn-success btn-lg">
             <i class="fa fa-users" style="margin-right: 10px;"></i>AFFILIATES</button>
           </a>
         </div>
       </div>
     </div>
   </div>
 </div>
</div>
@endsection	