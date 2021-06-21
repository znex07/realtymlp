@extends('main.partials.base')

@yield('content')
    <div class='container' style='margin-top: 70px ;'>
        @include('main.partials.sidebar')
        <div class="col-md-7">
    		@yield('content.inner')
    	</div>
    </div>
