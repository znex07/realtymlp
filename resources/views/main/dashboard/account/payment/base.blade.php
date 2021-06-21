@extends('main.partials.base')

@section('content')
<div class="row row-offcanvas row-offcanvas-left">
    <div class='container' style='margin-top: 70px ;'>
        <div class="col-xs-12 col-md-12 content">
            @yield('content.inner')
        </div>
    </div>
</div>    
@endsection
