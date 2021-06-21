@extends('main.partials.base')
@section('styles')
<link rel="stylesheet" href="/assets/css/landing.css" />
<link rel="stylesheet" href="/assets/css/landing-page.css" />
<link rel="stylesheet" href="/assets/css/full-slider.css" />
@endsection
@section('content')

<header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for Slides -->
        <div class="carousel-inner">
            <div class="item">
                <!-- Set the first background image using inline CSS below. -->
                <div class="fill" style="background-image:url('/img/lite6.webp');"></div>
                <div class="header-text hidden-xs">
                    <div class="container">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <h2 class="slide-1">
                                    <span>WE ARE</span>
                                    <br>
                                    <span><strong>LAUNCHING</strong></span>
                                    <br>
                                    <span>SOON</span>
                                </h2>
                                <br>
                                
                                <br>
                                <div class="">
                                    <a href="https://play.google.com/store/apps/details?id=com.myrealtymlplite.androiddatabase&hl=en" class="btn-1 btn-1b">Get Realty MLP for free</a>
                                </div>
                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
            <div class="item active item-active">
                <!-- Set the second background image using inline CSS below. -->
                <div class="fill" style="background-image:url('/img/lite2.webp');"></div>
                <div class="header-text hidden-xs">
                    <div class="container">
                        <div class="col-md-12">     
                            <div class="col-md-12 text-right slide-2">
                                <h2>
                                    <span style="text-shadow: 2px 2px #333;">LIST & SHARE PROPERTIES</span>
                                </h2>
                                <br>
                                <h3>
                                    <span style="text-shadow: 2px 2px #333;">IN REALTY MULTI - LISTING PORTAL</span>
                                </h3>
                                <br>
                                <div class="">                                    
                                     <a href="/feature" role="button" class="btn btn-primary" >Learn more</a>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
            <div class="item">
                <!-- Set the third background image using inline CSS below. -->
                <div class="fill" style="background-image:url('/img/lite3.webp');"></div>
                <div class="header-text hidden-xs">
                    <div class="container">
                        <div class="col-md-12">
                            <div class="col-md-12 slide-3">
                                <h2>
                                    <span>WELCOME TO REALTY MLP</span>
                                </h2>
                                <br>
                                <h3>
                                    <span>Homes, experiences, and places — all in one app.</span>
                                </h3>
                                <br>
                                
                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>

    </header>
{{-- <div class="main-text">
    <div class="col-md-12 text-right">
        <div class="container">
            <div class="intro-message landing-page">
                <div class="row">
                    <div class='col-md-12' id="startchange">
                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="intro" style="font-size:58px !important; font-weight:700 !important">LIST & SHARE PROPERTIES</h1>
                                <h6 class="intro">IN REALTY MULTI - LISTING PORTAL</h6>
                                <a href="/feature" class="btn btn-small btn-primary btn-learn">Learn more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
         
        </div>
    </div>
</div> --}}    
<div class="container" style="margin-top:48px;">
    @include('main.landing.search')
</div>
{{-- <div class="container-full overlay">
    <div class="intro-header">

        <div class="container">
            <div class="intro-message landing-page">
                <div class="row">
                    <div class='col-md-12' id="startchange">
                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="intro" style="font-size:58px !important; font-weight:700 !important">LIST & SHARE PROPERTIES</h1>
                                <h6 class="intro">IN REALTY MULTI - LISTING PORTAL</h6>
                                <a href="/feature" class="btn btn-small btn-primary btn-learn">Learn more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
           @include('main.landing.search')
       </div>
   </div>

</div> --}}
@endsection

@section('scripts')
{{--<script src='/assets/js/datum/properties.js'></script>--}}
{{--<script src='/assets/js/landing.js'></script>--}}
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script type='text/javascript'>
{{--$(document).ready(function(){--}}
    {{--landing.init();--}}
    {{--$('#search-property').on('typeahead:selected', function(obj, datum, name) {      --}}
        {{--// alert(JSON.stringify(datum));--}}
        {{--var location_data = datum.location;--}}
        {{--$('#column').val(location_data);--}}
        {{--// console.log(JSON.stringify(datum.column));--}}
        {{--});--}}
    {{--});--}}
$(function () {
    var availableTags = [
    "caloocan",
    "albay",
    "agusan"
    ];
    $( "#search-property" ).autocomplete({
        source: availableTags,
        minLength: 4,
        autoFocus: true
    });
});
$('.carousel').carousel({
        interval: 5000 //changes the speed
    })
</script>
@endsection
