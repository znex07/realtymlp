@extends('main.partials.base')

@section('content')
<div class="row row-offcanvas row-offcanvas-left">
    <div class='container' style='margin-top: 70px ;'>
        @include('main.dashboard.account.deactivate.sidebar')
        <div class="col-xs-12 col-sm-9 content">
            @yield('content.inner')
        </div>
    </div>
</div>    
@endsection
