@extends('main.partials.base')
@include('main.dashboard.partials.nav')
@section('content')
<div class='container' style='margin-top: 70px ;'>
    	<div class="row row-offcanvas row-offcanvas-left">
	        @include('main.dashboard.account.sidebar')
	        <div class="col-xs-12 col-sm-9 content">
	    		@yield('content.inner')
	    	</div>
	    </div>
    </div>

@endsection
