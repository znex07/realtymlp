@extends('main.partials.base')

@section('content')
    <div class="container" style="margin-top: 70px; height:auto;">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">                    
                    <div class="col-md-12">
                        <h1>{{ $featured->project_name }}</h1>
                        <ul class="breadcrumb">
                          <li><a href="/projects">Projects</a></li>
                          <li class="active">{{ $featured->project_name }}</li>
                        </ul>
                        <hr>
                        <div class="row">
                            <div class="col-md-7">
                                    <div class="fotorama text-center" id="brandImagesSlide" data-transition="crossfade" data-fit="contain" data-width="100%" data-height="300" data-ratio="800/600" data-stopautoplayontouch="false" data-autoplay="true" data-nav="thumbs">
                                        @if ($featured->pictures()->count())
                                        @foreach($featured->pictures() as $img)
                                        <img src="/img/featured_files/{{ $img->file_path }}">
                                        @endforeach
                                        @endif
                                    </div>
                            </div>
                            <div class="col-md-5">
                                <h3>{{ $featured->project_name }}</h3>
                                <p style="font-size: 13px;white-space:pre-line;">{{ $featured->project_description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                @if ($featured->units()->count())
                @foreach($featured->units as $unit)
                <div class="col-md-4 col-sm-6">
                    <div class="panel panel-default">
                        <div class="panel-body thumb-img">

                            <a href="/projects/units/{{ $unit->unit_code}}/{{ str_slug($unit->unit_name) }}">
                              @if($unit->images()->count())
                              <div class="ratio img-responsive listing-thumbnail" style="background-image: url(/img/featured_files/{{ $unit->images()->first()->file_path }});"></div>
                                {{-- <img  src="/img/featured_files/{{ $unit->images()->first()->file_path }}" class="img-responsive" style=" height:200px;"> --}}
                              @else
                              <div class="ratio img-responsive listing-thumbnail" style="background-image: url(/img/img_placeholder.png);"></div>
                                {{-- <img  src="/img/img_placeholder.png" class="img-responsive" style=" height:200px;"> --}}
                              @endif
                                <!-- <h6></h6> -->
                            </a>
                            <div class="thumb-content">
                                <h3>{{ str_limit($unit->unit_name,20) }}</h3>
                                <a role="button" class="pull-right btn btn-sm btn-primary" style="margin:0 0 20px 5px;" href="/projects/units/{{ str_slug($unit->unit_name) }}">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
