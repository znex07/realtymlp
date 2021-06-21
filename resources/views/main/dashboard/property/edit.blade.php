@extends('main.dashboard.property.base')


@section('styles')
    <link rel="stylesheet" href="/assets/css/basic.min.css">
    <link rel="stylesheet" href="/assets/admincss/select2.min.css">
    <link rel="stylesheet" href="/assets/css/dropzone.min.css">
    <link rel="stylesheet" href="/assets/css/wizard.css">
@endsection

@section('content.inner')
    <div class='col-sm-9 col-xs-12'>
        <div class="row">
            <div class="stepwizard">
                <div class="stepwizard-row setup-panel">
                    <div class="stepwizard-step">
                        <a href="#step-1" type="button" class="btn btn-primary btn-circle active stepped"
                           onclick="wiz.gotoWizard(1)"><span class="glyphicon glyphicon-home"></span></a>
                        <p class="hidden-xs">Start</p>
                    </div>
                    <div class="stepwizard-step" style="visibility: hidden;">
                        <a href="#step-2" type="button" class="btn btn-default btn-circle "
                           onclick="wiz.gotoWizard(2); mapa.trigger_map();edit.set_map_attributes()"><span
                                    class="glyphicon glyphicon-map-marker"></span></a>
                        <p class="hidden-xs">Location</p>
                        <
                        <div class="stepwizard-step" style="visibility: hidden;">
                            <a href="#step-3" type="button" class="btn btn-default btn-circle"
                               onclick="wiz.gotoWizard(3)"><span class="glyphicon glyphicon-list-alt"></span></a>
                            <p class="hidden-xs">Details</p>
                        </div>
                        <div class="stepwizard-step" style="visibility: hidden;">
                            <a href="#step-4" type="button" class="btn btn-default btn-circle"
                               onclick="wiz.gotoWizard(4)"><span class="glyphicon glyphicon-file"></span></a>
                            <p class="hidden-xs">Attachments</p>
                        </div>
                        <div class="stepwizard-step" style="visibility: hidden;">
                            <a href="#step-5" type="button" class="btn btn-default btn-circle"
                               onclick="wiz.gotoWizard(5);wiz.step_5();"><span
                                        class="glyphicon glyphicon-ok"></span></a>
                            <p class="hidden-xs">Finish</p>
                        </div>
                    </div>
                </div>

            </div>

            <form id="frm-property" enctype="multipart/form-data" method="post" action="/property">
                <input type="hidden" id="_city" value="{{ $property->city }}">
                <input type="hidden" id="_property_type" value="{{ $property->city }}">
                <input type='hidden' id="_token" name='_token' value='{{ csrf_token() }}'/>
                <input type='hidden' name='method_type' value='full'/>
                <input type='hidden' name="user_id" value="{{ Auth::user()->id }}"/>
                <input type='hidden' name="property_code" value="PR-{{date('mdY').time()}}"/>
                <div class="row setup-content" id="step-1">
                    <div class="col-xs-12 col-md-10 col-md-offset-1">
                        <h6 class="h6Header">start</h6>
                        <div class="form-group">
                            <label>Choose Listing Type</label><br>
                            @foreach($transaction as $t)
                                <span style="margin:0 5px;">
                            <label for="t{{$t->id}}">{{$t->title}}</label>
                            <input type="checkbox" name="listing_types[]" id="t{{$t->id}}" value="{{$t->id}}"
                                   data-name="{{$t->title}}" class="listing_type">
                        </span>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <label for="property_title">Title *</label>
                            <textarea required autocomplete="off" title="This is a required field" data-placement="top"
                                      id="property_title" class="form-control" style="height: 100px; resize: vertical;"
                                      name="property_title"
                                      placeholder="Property Title">{{ $property->property_title }}</textarea>
                            <span class="counter hidden-xs" id="counter">100 Characters left</span>
                        </div>
                        <div class="form-group">
                            <label for="property_classification">Property Classification</label>
                            <select name="property_classification" id="property_classification" class="form-control">
                                <option value="-1">Choose Property Classification</option>
                                @foreach($department as $d)
                                    @if ($property->property_classification > 0 && $property->property_classification != '')

                                        <option value="{{ $property->property_classification }}" {{ $property->property_classification === $d->id  ? 'selected' : ''}} >{{$d->department_name}}</option>

                                    @else
                                        <option value="{{$d->id}}">{{$d->department_name}}</option>
                                    @endif

                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="property_type" style="display:none;">Property Type</label>
                            <div class="loader" id="l_property_type"></div>
                            <div id="f_property_type"></div>

                        </div>
                        <button class="btn btn-primary nextBtn btn-lg pull-right "
                                onclick="wiz.gotoStep(2);mapa.trigger_map();edit.set_map_attributes()" type="button">
                            <span>Next <i class='fa fa-arrow-right'></i></span></button>
                    </div>
                </div>
                <div class="row setup-content" id="step-2" style="display:none;">
                    <div class="col-xs-12 col-md-10 col-md-offset-1">
                        <h6 class="h6Header">location</h6>
                        <div class="form-group">
                            <label for="province">Province *</label>
                            <select name="province" id="province" class="form-control" required
                                    onchange="mapa.geocode();">
                                <option value="default">Choose Province</option>
                                @foreach($locProvince as $l)
                                    <option value="{{$l->id}}" {{ $property->province == $l->id  ? 'selected' : '' }}>{{$l->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="city" style="">City / Municipality *</label>
                            <div class="loader" id="l_city"></div>
                            <div id="f_city"></div>
                        </div>
                        <div class="form-group">
                            <label for="brgy">Barangay</label>
                            <input type="text" autocomplete='off' value="{{ $property->brgy }}" name="brgy" id="brgy"
                                   placeholder="Barangay" class="form-control enter">
                        </div>
                        <div class="form-group">
                            <label for="street_address">Define Your Location: Street Address</label>
                            <input type="text" autocomplete='off' onchange="mapa.geocode();"
                                   value="{{ $property->street_address }}" class="form-control enter"
                                   name="street_address" id="street_address" placeholder="Street Address">
                        </div>
                        <div class="form-group">
                            <label for="village">Define Your Location: Village / Subdivision / District</label>
                            <input type="text" autocomplete='off' class="form-control enter" name="village" id="village"
                                   placeholder="Village / Subdivision / District" value="{{ $property->village }}">
                        </div>
                        <div class="form-group" id="map-wrapper" style="display: none;">
                            <div id="map" style="height:300px;background:#e6e6e6;"></div>

                            <div class="map-control">
                                <div>
                                    <input data-content="Please drag &amp; drop the red pin to where the location is"
                                           type="checkbox" id="pin" onchange="mapa.map_button(this); mapa.popover();"
                                           class="map-btn">
                                    <label for="pin"> Drop a Pin</label>
                                </div>
                                <div>
                                    <input data-content="Please drag &amp; drop the red circle to where the location is. You can re-size the circle by dragging the small white circle"
                                           type="checkbox" id="area" onchange="mapa.map_button(this); mapa.popover();"
                                           class="map-btn">
                                    <label for="area"> Drop an Area</label>
                                </div>
                                <div id="map-btn-remove" style="display: none;"><input type="button"
                                                                                       onclick="mapa.map_button(this)"
                                                                                       id="rmv-mrk" class="hidden">
                                    <label for="rmv-mrk"><i id="rmv-mrk1" class="fa fa-times"></i> Clear</label></div>
                                <div id="map-btn-desc" style="display:none;">

                                </div>
                            </div>

                            <input type="hidden" id="complete_address" value="">
                            <input type="hidden" value="" id="_google_lng">
                            <input type="hidden" value="" id="_google_lat">
                            <input type="hidden" name="marker_type">
                            <input type="hidden" name="map_options" value="{{ $property->map_options }}">
                        </div>
                        <button class="btn btn-primary nextBtn btn-lg pull-right" onclick="wiz.gotoStep(3);"
                                type="button"><span>Next <i class='fa fa-arrow-right'></i></span></button>
                        <button class="btn btn-primary prevBtn btn-lg pull-right " onclick="wiz.gotoStep(1,true);"
                                type="button" style="margin-right:10px;"><span><i class='fa fa-arrow-left'></i> Previous</span>
                        </button>
                    </div>
                </div>
                <div class="row setup-content" id="step-3" style="display:none;">
                    <div class="col-xs-12 col-md-10 col-md-offset-1">
                        <h6 class="h6Header">Details</h6>
                        <div id="f_lot_area" style="display: none;">
                            <div class="form-group">
                                <label for="lot_area">Lot Area</label>
                                <input type="text" autocomplete='off' id="lot_area" class="form-control negative enter"
                                       value="" name="lot_area" placeholder="Lot Area">
                            </div>
                        </div>
                        <div id="f_floor_area" style="display: none;">
                            <div class="form-group">
                                <label for="floor_area">Floor Area</label>
                                <input type="text" autocomplete='off' id="floor_area"
                                       class="form-control negative enter" value="" name="floor_area"
                                       placeholder="Floor Area">
                            </div>
                        </div>
                        <div id="f_bedroom" style="display: none;">
                            <div class="form-group">
                                <label for="bedroom">Number of Rooms</label>
                                <input type="number" min="0" onpaste='return false' id="bedroom" name="bedroom"
                                       class="form-control enter negative" placeholder="Number of Rooms">
                            </div>
                        </div>
                        <div id="f_bathroom" style="display: none;">
                            <div class="form-group">
                                <label for="bathroom">Number of Bathroom</label>
                                <input type="number" min="0" onpaste='return false' id="bathroom" name="bathroom"
                                       class="form-control enter negative" placeholder="Number of Bathroom">
                            </div>
                        </div>
                        <div class="form-group" id="f_parking">
                            <label for="parking">Number of Exclusive Parking</label>
                            <input type="number" min="0" onpaste='return false' id="parking" name="parking"
                                   class="form-control enter negative" placeholder="Number of Parking">
                        </div>
                        <div class="form-group" id="f_balcony" style="display:none;">
                            <label for="balcony">Number of Balcony</label>
                            <input type="number" min="0" onpaste='return false' id="balcony" name="balcony"
                                   class="form-control enter negative" placeholder="Number of Balcony">
                        </div>
                        <div class="form-group">
                            <label for="property_price">Property Price (in PHP) *</label>
                            <input type="text" class="form-control numeric enter" autocomplete='off' id="property_price"
                                   name="property_price" required placeholder="Property Price">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" placeholder="Description"
                                      style="height: 150px; resize: vertical;"></textarea>
                            <span class="counter hidden-xs" id="counterD">1000 Characters left</span>
                        </div>

                        <button class="btn btn-primary nextBtn btn-lg pull-right" onclick="wiz.gotoStep(4);"
                                type="button"><span>Next <i class='fa fa-arrow-right'></i></span></button>
                        <button class="btn btn-primary prevBtn btn-lg pull-right"
                                onclick="wiz.gotoStep(2,true);mapa.trigger_map();edit.set_map_attributes()"
                                type="button" style="margin-right:10px;"><span><i class='fa fa-arrow-left'></i> Previous</span>
                        </button>
                    </div>
                </div>
                <div class="row setup-content" id="step-4" style="display:none;">
                    <div class="col-xs-12 col-md-10 col-md-offset-1">
                        <div class="form-group hidden" style="font-size: 14px;"><span style="color:red;" id="totalMB">0MB</span>
                            of 2.00MB
                        </div>
                        <h6 class="h6Header">TOTAL SIZE OF IMAGES &amp; ATTACHMENTS </h6>
                        <span id="mbCounter-wrapper" style=""><span id="mbCounter">0</span> mb out of 2 mb</span>
                        <div class="form-group">
                            <div class="progress" id="progress-files" style="margin-top:10px;height:20px;">
                                <div style="transition:width 1s; background:#5b9bd1 !important;" class="progress-bar"
                                     role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                        </div>


                        <h6 class="h6Header">image attachments</h6>
                        <div class="form-group dropzone" id="dropzone-image">
                            <div class="dropzone-previews-img"></div>
                        </div>

                        <h6 class="h6Header">document attachments</h6>
                        <div class="form-group dropzone" id="dropzone-docs">
                            <div class="dropzone-previews-doc"></div>
                        </div>
                        <button class="btn btn-primary nextBtn btn-lg pull-right" type="button"
                                onclick="wiz.gotoStep(5,true);wiz.step_5();" id="fourthStep"><span>Next <i
                                        class='fa fa-arrow-right'></i></span></button>
                        <button class="btn btn-primary prevBtn btn-lg pull-right" type="button"
                                onclick="wiz.gotoStep(3,true);" style="margin-right:10px;"><span><i
                                        class='fa fa-arrow-left'></i> Previous</span></button>
                    </div>
                </div>
                <div class="row setup-content" id="step-5" style="display:none;">
                    <div class="col-xs-12 col-md-10 col-md-offset-1">
                        <h6 class="h6Header">set property as..</h6>
                        <div class="row">
                            <div class="form-group col-md-12 row" style="background:white;margin-bottom:0 !important;">
                                <div class="col-md-5">
                                    <p for="property_status">Is this viewable in public ?</p>
                                    <div style="display:inline; margin: 0 5px;"><input type="radio"
                                                                                       name="property_status"
                                                                                       id="ps_public" value="1"
                                                                                       style="transform: scale(1.8);"><label
                                                for="ps_public" style="margin:0 20px;"> Public</label></div>
                                    <div style="display:inline; margin: 0 5px;"><input type="radio"
                                                                                       name="property_status"
                                                                                       id="ps_private" value="2"
                                                                                       style="transform: scale(1.8);"
                                                                                       checked><label for="ps_private"
                                                                                                      style="margin:0 20px;">
                                            Private</label></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <span data-toggle="slide" class="hidden" data-toggle="slide" id="toggle-slide"
                                      data-target=".sharing-viewability-wrapper"
                                      style="transition: all 0.5s;cursor: pointer">Show Options</span>
                                @include('main.dashboard.profile.checkbox')
                            </div>
                        </div>
                        <h6 class="h6Header">summary</h6>
                        <div class="col-md-12 no-pad">
                            <div class="col-md-4 no-pad">
                                <img src="/img/img_placeholder.png" id="prev-img" style="height: 150px;"/>
                            </div>
                            <div class="col-md-8 no-pad">
                                <ul class="list-unstyled">
                                    <li>Title: <span id="prev-title"></span></li>
                                    <li>Location: <i class="fa fa-map-marker"></i> <span id="prev-address"></span></li>
                                    <li>Price: &#8369;<span id="prev-price"></span></li>
                                    <li>Type: <span id="prev-listing-type"></span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                Note: this post will not be shown in public.
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">

                            </div>
                        </div>
                        <input type="hidden" name="sharables" id="sharables">
                        <button class="btn btn-primary btn-lg pull-right" type="button" id="btnSubmit" disabled=""
                                onclick="dz.submit(this);"><span>Finish <i class='fa fa-check'></i></span></button>
                        <button class="btn btn-primary prevBtn btn-lg pull-right" onclick="wiz.gotoStep(4);"
                                type="button" style="margin-right:10px;"><span><i class='fa fa-chevron-circle-left'></i> Previous</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="modal fade" id="finishModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">Please wait..</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="progress" id="finishProgress" style="margin-top:10px;height:20px;">
                                    <div style="transition:width 1s;" class="progress-bar progress-bar-striped active"
                                         role="progressbar" aria-valuenow="45" aria-valuemin="0"
                                         aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <p id="finishMessage"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endsection

        @section('scripts')

            <script type='text/javascript' src='/assets/js/wiz.js'></script>
            <script type='text/javascript' src='/assets/js/dropzone.min.js'></script>
            <script type='text/javascript' src='/assets/js/jquery.numeric.min.js'></script>
            {{--<script src="http://maps.googleapis.com/maps/api/js?v=3.22" type="text/javascript"></script>--}}
            <script language="javascript" src="https://maps.googleapis.com/maps/api/js?sensor=true&v=3"></script>
            <script type='text/javascript' src='/assets/js/gmaps.js'></script>
            <script type='text/javascript' src='/assets/js/mapa.js'></script>
            <script type='text/javascript' src='/assets/js/wizard-upload.js'></script>
            <script type='text/javascript' src='/assets/js/wizard-step.js'></script>
            <script type='text/javascript' src='/assets/js/wizard-edit.js'></script>
            <script>
                $(document).ready(function () {
                    dz.init();
                    wiz.init();
                    $('.stepwizard-step a').click(function (e) {
                        e.preventDefault();
                    });

                    $('input.enter').on('keypress', function (event) {
                        if (event.which == 13 || event.which == 13) {
                            event.preventDefault();
                            return false;
                        }
                    });

                    $('.sharing-viewability-wrapper').hide();

                    $('[name=property_status]').on('change', function (e) {
                        if ($('[name=property_status]#ps_public').is(':checked'))
                            $('[data-toggle=slide]').removeClass('hidden');
                        else {
                            $($('[data-toggle=slide]').data('target')).fadeOut(200, function (e) {
                                $('[data-toggle=slide]').addClass('hidden');
                            });
                        }
                    });
                    $('[data-toggle=slide]').click(function (e) {
                        $($(this).data('target')).slideToggle('fast');
                    });
                    // sharable options
                    $('#scb_province').on('change', function (e) {
                        if ($(this).is(':checked'))
                            $('#scb_city').prop('checked', false).parents('.col-md-3').fadeIn('fast')
                        else
                            $('#scb_city').prop('checked', false).parents('.col-md-3').fadeOut('fast')
                    });

                    edit.init();
                    mapa.init();
                })
            </script>

@endsection
