@extends('main.partials.base')
@include('main.dashboard.partials.nav')

@section('content')
    <div class='container' style='margin-top: 70px ;'>
    	<div class="row row-offcanvas row-offcanvas-left">
    		@include('main.partials.sidebar')
    		@yield('content.inner')
    	</div>
    </div>
@endsection

{{-- @include('main.dashboard.listings.partial.modal-shared-user') --}}
