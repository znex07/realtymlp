@extends('main.dashboard.base')
@section('content')
    <div class='container' style='margin-top: 70px ;'>
    	<div class="row row-offcanvas row-offcanvas-left">
	        @include('main.dashboard.overview.sidebar')
	        <div class="col-xs-12 col-sm-9 content">
	    		<div class="panel panel-default">
	    			<div class="panel-body text-center">	    				
	    				<h1 style="font-size:60px !important" class="text-primary"><i class="fa fa-check-circle" aria-hidden="true"></i></h1>
	    				<h1><strong>You're all set!</strong></h1>
	    				<div class="col-md-6 col-md-offset-3">
	    				<h3 style="margin:20px !important; font-weight:normal !important; line-height:1.5">Thank you for being awesome, we hope you enjoy your subscription!</h3>
	    				</div>
	    				<div class="col-md-12">
	    				
	    				<p><em>Thanks from the Realty MLP team</em></p>	  
	    				</div>  				
	    			</div>
	    		</div>
	    	</div>
	    </div>	
    </div>
@endsection