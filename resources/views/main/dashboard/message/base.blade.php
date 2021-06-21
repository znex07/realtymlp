@extends('main.partials.base')
@section('content')
	@include('main.dashboard.partials.nav')

    <div class='container' style='margin-top: 70px ;'>
    	<div class="row row-offcanvas row-offcanvas-left">
	        @include('main.dashboard.message.sidebar')
	        <div class="col-xs-12 col-sm-9 content">
	    		@yield('content.inner')
	    	</div>
	    </div>	
    </div>
@endsection