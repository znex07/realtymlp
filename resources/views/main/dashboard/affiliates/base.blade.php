@extends('main.dashboard.base')
@section('styles')
<style>
	.nav-landing {
		display: none;
	}
</style>
@endsection
@section('content')
@include('main.dashboard.partials.nav')
<div class="row row-offcanvas row-offcanvas-left">
    <div class='container' style='margin-top: 70px ;'>
        @include('main.dashboard.affiliates.sidebar')
        <div class="col-xs-12 col-sm-9 content">
            @yield('content.inner')
        </div>
    </div>
</div>    
@endsection
