@extends('main.partials.base')
@section('styles')
<style>
ol.breadcrumb li a{
    color:#16a085;
}
ol.breadcrumb li a:hover{
    color:#186354;
}
.clickable{
    cursor: pointer;
}

.panel-heading span {
	margin-top: -20px;
	font-size: 15px;
}
.fotorama__nav-wrap{
  margin-top:10px;
}
.truncs{
  font-size: 13px;
  padding-top: 0;
  margin-top: -10px;
}
.text-muted {
    color: #777 !important;
}
p {
    font-size: 16px;
    margin-bottom: 5px;
}
.panel-primary>.panel-heading {
    background: #1abc9c;
    border-color: #1abc9c; 
}
.panel-primary {
    border-color: #1abc9c;
}
</style>
@endsection
@section('content')
<div class="container" style="margin-top: 70px;">
    <div class="panel panel-default">
        <div class="panel-heading">
            <ol class="breadcrumb" style="margin-bottom:0;">
                <li><a href="/projects/{{$unit->project->project_code}}/{{ str_slug($unit->project->project_name) }}" class="">{{ $unit->project->project_name }}</a></li>
                <li> <a class="active">{{ $unit->unit_name }}</a></li>
            </ol>
        </div>
        <div class="panel-body">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-8">
                        <h4>{{ $unit->title }}</h4>
                        <div class="col-md-12">
                            <div class="row" style="font-size: 14px;font-weight: 400;">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        @if($unit->min_price)
                                        <span class="title">FOR SALE AS LOW AS:</span> <span class="label label-primary">Php {{ number_format($unit->min_price)  }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        @if($unit->unit_area)
                                        <span class="title">FLOOR AREA:</span> <span class="text-muted" >{{ $unit->unit_area }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        @if($unit->rooms)
                                        <span class="title">BEDROOMS:</span> <span class="text-muted" style="font-size: 14px;">{{ $unit->rooms  }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        @if($unit->parkings)
                                        <span class="title">PARKING:</span> <span class="text-muted" style="font-size: 14px;">{{ $unit->parkings }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <span class="title">BATHROOM:</span> <span class="text-muted" style="font-size: 14px;">{{ $unit->bathrooms }}</span>
                                    </div>
                                    <div class="form-group">
                                       <!-- <span class="title">AVAILABILITY:</span> <span class="text-muted" style="font-size: 14px;">{{ !isset($availability) ? $availability : '' }}</span> -->
                                       <span class="title">AVAILABILITY:</span> <span class="text-muted" style="font-size: 14px;">{{ isset($availability) ? $availability->year : '' }}</span>
                                   </div>
                               </div>
                           </div>
                           <div class="row">
                            <!--FOR IMAGE SLIDER-->
                            <div style=" margin-top:20px;background-color:#f6f6f6;  position:relative; width:100%">
                                <div class="fotorama text-center" id="dImg" data-transition="crossfade" data-fit="contain" data-width="100%" data-height="300" data-ratio="800/600" data-stopautoplayontouch="false" data-autoplay="true" data-nav="thumbs">
                                    @foreach($unit->images as $img)
                                    <img src="/img/featured_files/{{ $img->file_path  }}">
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 20px">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">ABOUT THE PROJECT</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="col-md-7">
                                        <div style=" margin-top:20px;background-color:#f6f6f6;  position:relative; width:100%">
                                            <div class="fotorama text-center" id="dImg" data-transition="crossfade" data-fit="contain" data-width="100%" data-height="300" data-ratio="800/600" data-stopautoplayontouch="false" data-autoplay="true" data-nav="thumbs">
                                                @foreach($unit->project->pictures() as $img)
                                                <img src="/img/featured_files/{{ $img->file_path  }}">
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <p class="text-muted" style="font-size: 13px;line-height: 1.5;white-space:pre-line;">
                                           {{ $unit->project->project_description  }}
                                       </p>
                                   </div>
                               </div>
                           </div>
                           {{-- --}}
                           @if ($unit->project->whats)
                           <div class="panel panel-success collapsible">
                            <div class="panel-heading">
                                <h3 class="panel-title">WHAT'S IN THE UNIT</h3>
                                <span class="pull-right clickable panel-collapsed"><i class="glyphicon glyphicon-chevron-down"></i></span>
                            </div>
                            <div class="panel-body truncs" style="display:none;white-space:pre-line;">
                              {{ $unit->project->whats }}
                          </div>
                      </div>
                      @endif
                      @if ($unit->project->building_amenities)
                      <div class="panel panel-success collapsible">
                        <div class="panel-heading">
                            <h3 class="panel-title">BUILDING AMENITIES</h3>
                            <span class="pull-right clickable panel-collapsed"><i class="glyphicon glyphicon-chevron-down"></i></span>
                        </div>
                        <div class="panel-body truncs" style="display:none;white-space:pre-line;">
                          {{ $unit->project->building_amenities }}
                      </div>
                  </div>
                  @endif
                  @if ($unit->project->facilities_services)
                  <div class="panel panel-success collapsible">
                    <div class="panel-heading">
                        <h3 class="panel-title">FACILITIES & SERVICES</h3>
                        <span class="pull-right clickable panel-collapsed"><i class="glyphicon glyphicon-chevron-down"></i></span>
                    </div>
                    <div class="panel-body truncs" style="display:none;white-space:pre-line;">
                      {{$unit->project->facilities_services}}
                  </div>
              </div>
              @endif
              @if ($unit->project->commercial_area)
              <div class="panel panel-success collapsible">
                <div class="panel-heading">
                    <h3 class="panel-title">COMMERCIAL AREA</h3>
                    <span class="pull-right clickable panel-collapsed"><i class="glyphicon glyphicon-chevron-down"></i></span>
                </div>
                <div class="panel-body truncs" style="display:none;white-space:pre-line;">
                  {{$unit->project->commercial_area}}
              </div>
          </div>
          @endif
      </div>
  </div>

</div>

<div class="col-md-4 col-xs-12">
    <div class="row hidden-xs">
        <div class="panel panel-default" data-spy="affix" style="width:350px;">
            <div class="panel-heading text-center">Contact this agent</div>
            <div class="panel-body">
                <div class="row">
                    <div class="media">
                                                    {{-- <a class="pull-left" href="#" style="padding-left: 5px;">
                                                        <div id="" class="" style="width: 75px;height: 75px;background-size:cover;"></div>
                                                    </a> --}}
                                                    <div class="media-body">
                                                        <p class="text-primary text-center">
                                                            Joseph Eliezer Montecillo
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p><i class="fa fa-phone"></i> Show Contacts </p>
                                                    <p><i class="fa fa-envelope-o"></i> Show Email </p>
                                                </div>
                                                <div class="col-md-6">
                                                    {{-- <p class="text-muted">+63 926 704 4555</p> --}}
                                                </div>
                                            </div>
                                            <hr>
                                            <form class="form-vertical">
                                                <p class="text-center text-muted" >ASK ABOUT THE PROPERTY</p>
                                                <div class="form-group">
                                                    <input type="text" class="form-control input-sm" name="txtName" id="txtName" value="" placeholder="Your name">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control input-sm" id="txtPhone" name="txtPhone" value=""  placeholder="Phone">
                                                </div>

                                                <div class="form-group">
                                                    <input type="email" class="form-control input-sm" id="txtEmail" name="txtEmail" value=""  placeholder="Email address" >
                                                </div>

                                                <div class="form-group">
                                                    <textarea rows="2" class="form-control input-sm" style="width:100%; resize:none;" id="txtMessage"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <button class="btn btn-primary pull-right" type="button" style="width:inherit;" id="btnSendEmail" data-to="$pro_usercode" data-prop="$prop_code"><i class="fa fa-envelope"></i>&nbsp;&nbsp;Contact agent</button>
                                                </div>
                                            </form>
                                        </div>                                        

                                    </div>
                                </div>
                                <div class="visible-xs">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center">Contact this agent</div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="media">
                                                    {{-- <a class="pull-left" href="#" style="padding-left: 5px;">
                                                        <div id="" class="" style="width: 75px;height: 75px;background-size:cover;"></div>
                                                    </a> --}}
                                                    <div class="media-body">
                                                        <p class="text-primary text-center">
                                                            Joseph Eliezer Montecillo
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p><i class="fa fa-phone"></i> Show Contacts </p>
                                                    <p><i class="fa fa-envelope-o"></i> Show Email </p>
                                                </div>
                                                <div class="col-md-6">
                                                    {{-- <p class="text-muted">+63 926 704 4555</p> --}}
                                                </div>
                                            </div>
                                            <hr>
                                            <form class="form-vertical">
                                                <p class="text-center text-muted" >ASK ABOUT THE PROPERTY</p>
                                                <div class="form-group">
                                                    <input type="text" class="form-control input-sm" name="txtName" id="txtName" value="" placeholder="Your name">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control input-sm" id="txtPhone" name="txtPhone" value=""  placeholder="Phone">
                                                </div>

                                                <div class="form-group">
                                                    <input type="email" class="form-control input-sm" id="txtEmail" name="txtEmail" value=""  placeholder="Email address" >
                                                </div>

                                                <div class="form-group">
                                                    <textarea rows="2" class="form-control input-sm" style="width:100%; resize:none;" id="txtMessage"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <button class="btn btn-primary pull-right" type="button" style="width:inherit;" id="btnSendEmail" data-to="$pro_usercode" data-prop="$prop_code"><i class="fa fa-envelope"></i>&nbsp;&nbsp;Contact agent</button>
                                                </div>
                                            </form>
                                        </div>                                        

                                    </div>
                                </div>
                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </div>
        @endsection
        @section('scripts')
        <script>
        $('.panel-heading span.clickable').on('click', function(e){
          var $this = $(this);
          if(!$this.hasClass('panel-collapsed')) {
              $this.parents('.collapsible').find('.panel-body').slideUp();
              $this.addClass('panel-collapsed');
              $this.find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
          } else {
              $this.parents('.collapsible').find('.panel-body').slideDown();
              $this.removeClass('panel-collapsed');
              $this.find('i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
          }
      })
        </script>
        @endsection
