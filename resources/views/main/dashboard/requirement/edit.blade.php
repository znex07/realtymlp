{{--Created by PhpStorm.--}}
{{--User: mark--}}
{{--Date: 8/11/2016--}}
{{--Time: 2:16 PM--}}


@extends('main.dashboard.requirement.base')
@section('styles')
    <style>
        .nav-landing {
            display: none;
        }

        #sortable > div {
            border-top: 1px solid transparent;
        }

        .hypen {
            text-align: center;
            display: block;
            float: left;
            width: 4%;
            line-height: 34px;
            min-height: 34px;
        }
    </style>
@endsection
@section('content.inner')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <ul class="breadcrumb">
                        <li><a href="/dashboard/overview">Overview</a></li>
                        <li><a href="/dashboard/requirement">Requirement</a></li>
                        <li class="active">Requirement Post</li>
                    </ul>
                    <hr>
                    <form method='POST' action='/dashboard/requirement/update' id="form_submit">
                        <input type='hidden' name='_token' value='{{ csrf_token() }}'/>
                        <input type='hidden' name='_id' value='{{ $requirements->id }}'/>
                        <div class=" col-sm-12">
                            <div class="panel-default panel">
                                <div class="panel-heading">Detail</div>
                                <div class="panel-body">
                                    <div class="col-md-offset-1 col-md-10 col-sm-12">
                                        <div class="form-group">
                                            <label>Listing Type * <p class="text-danger" id="PListing"
                                                                     style="font-size: 12px;display:none;">This is
                                                    required field</p></label><br>
                                            <select id="listing_type"
                                                    onchange="wiz_requirements.checkInputCompleted()"
                                                    class="form-control" required>
                                                <option value="default" default selected hidden>For Rent, For Sale, or
                                                    For Joint
                                                    Venture?
                                                </option>
                                                @foreach($listing_type as $t)
                                                    @if($t->title == 'For Sale')
                                                        <option data-name="{{ $t->id }}"
                                                                value="{{ $t->id }}" {{ $t->id == $requirements->listing_type ? 'selected' : '' }}>
                                                            Want to Buy
                                                        </option>
                                                    @elseif($t->title == 'Joint Venture')
                                                        <option data-name="{{ $t->id }}"
                                                                value="{{ $t->id }}" {{ $t->id == $requirements->listing_type ? 'selected' : '' }}>
                                                            Want to {{ $t->title }}</option>
                                                    @else
                                                        <option data-name="{{ $t->id }}"
                                                                value="{{ $t->id }}" {{ $t->id == $requirements->listing_type ? 'selected' : '' }}>
                                                            Want to Rent
                                                        </option>
                                                    @endif
                                                @endforeach

                                            </select>
                                            <input type="hidden" name="listing_type" value="default"
                                                   id="hidden_listing_type"/>
                                        </div>
                                        <div class='form-group' data-placement="top" data-trigger="hover focus"
                                             title="this is a required field">
                                            <label for="property_classification" onchange="wiz.handleCheckpoint(this)">Property
                                                Classification *<p class="text-danger" id="PClass"
                                                                   style="font-size: 12px;display:none;">This is
                                                    required field</p></label>
                                            <select onchange="wiz.handleCheckpoint(this)" required
                                                    name="property_classification" autocomplete="off" required
                                                    id="property_classification" class="form-control">
                                                <option value="default" default selected hidden>What's the
                                                    classification of the property?
                                                </option>
                                                @foreach($property_classifications as $p_c)
                                                    <option {{ $p_c->id == $requirements->property_classification ? 'selected' : '' }} value="{{$p_c->id}}">{{$p_c->department_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class='form-group' id="c_property_type" style='display:none;'>
                                            <label for="property_type">Choose Property Type *</label>
                                            <div class="loader" id="l_property_type"></div>
                                            <select onchange="wiz.handleCheckpoint(this)" required autocomplete="off"
                                                    id="property_type" class="form-control" data-placement="top"
                                                    data-trigger="hover focus" title="this is a required field">
                                                <option value='default' default hidden >What's the type of the property?</option>
                                            </select>
                                            <input id="hidden_property_type" type="hidden" value=""
                                                   name='property_type'>
                                        </div>
                                        <div class="form-group">
                                            <label>Condition Type *(required)<p class="text-danger" id="PCondition1"
                                                                                style="font-size: 12px;display:none;">This is
                                                    required field</p></label>
                                            <div class="row well well-sm" id="condition_type_box">
                                                @foreach($conditions as $condition)
                                                    @if($condition->description != 'Foreclosed')
                                                    <div class="col-md-4">
                                                        <div class="check1">
                                                            <label class="checkbox">
                                                                <input type="checkbox" name="conditionCheckbox"
                                                                       value="{{ $condition->description }}"
                                                                       data-toggle="checkbox"
                                                                       class="condition_type custom-checkbox opt_condition">
                                                                <strong>{{ $condition->description }}</strong>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                        <input type="hidden" name="condition_type" id="condition_type" value=""/>
                                        <div class="form-group">
                                            <label>Availability Type *(required)<p class="text-danger" id="PAvail"
                                                                                   style="font-size: 12px;display:none;">This is
                                                    required field</p></label>
                                            <div class="row well well-sm" id="availability_type_box">
                                                @foreach($availabilities as $availability)
                                                    @if($availability->description != 'Already Leased' && $availability->description != 'Already Sold')
                                                    <div class="col-md-6">
                                                        <div class="check2" id="chck_avail_{{ $availability->category_id }}">
                                                            <label class="checkbox"  >
                                                                    <input type="checkbox" name="availCheckbox"
                                                                           value="{{ $condition->description }}"
                                                                           data-toggle="checkbox"
                                                                           class="availability_type custom-checkbox opt_availability">
                                                                    <strong>{{ $availability->description }}</strong>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                        <input type="hidden" name="availability_type" id="availability_type" value=""/>
                                    </div>

                                </div>
                            </div>

                            {{--Location Section--}}
                            <div class="panel-group" id="accordion">

                                <div class="panel panel-default template">
                                    <div class="panel-heading">
                                        <a class="btn-xs btn-remove btn-danger pull-right" id="btn-remove"
                                           style="display: none;">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </a>
                                        <h4 class="panel-title">
                                            <a class="accordion-toggle" id="location_header1" data-toggle="collapse"
                                               data-parent="#accordion"
                                               href="#collapseHead">
                                                Location 1:
                                            </a>
                                            <input type="hidden" id="location_hidden" name="location" value="">
                                        </h4>
                                    </div>
                                    <div id="collapseHead" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            <div class="col-md-10 col-md-offset-1 col-sm-12">
                                                <div class="form-group" data-placement="top" data-trigger="hover focus"
                                                     title="this is a required field">
                                                    <label for="province">Province * <p class="text-danger"
                                                                                        id="PProvince"
                                                                                        style="font-size: 12px;display:none;">
                                                            This is required field</p></label>
                                                    <select name="province" autocomplete="off" id="province1"
                                                            class="form-control province" required>
                                                        <option value="default" hidden>Which province does it belong to?
                                                        </option>
                                                        @foreach($locProvince as $l)
                                                            <option class="option_province"
                                                                    value="{{$l->id}}" {{ ltrim($location[1]) == $l->name ? 'selected' : '' }}>{{$l->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group" data-placement="top" data-trigger="hover focus"
                                                     title="this is a required field">
                                                    <label for="city" style="display:none;">City / Municipality *<p
                                                                class="text-danger" id="PCity"
                                                                style="font-size: 12px;display:none;">This is required
                                                            field</p></label>
                                                    <div class="loader" id="l_city1"></div>
                                                    <div id="f_city1"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <a id="btnAddLocation"
                                   class="btn btn-lg btn-primary btn-sm btn-add-panel disabled"> <i
                                            class="fa fa-plus"></i> Add Location</a>

                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">Property Area</div>
                                <div class="panel-body">

                                    <div class="col-md-6">
                                        <div class="check">
                                            <label>
                                                <input type="checkbox" name="areaCheckbox" value="lot">
                                                <strong>Lot Area (sqm)</strong>
                                            </label>
                                        </div>
                                        <div class="lot-area" style="display:none;">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <input type="number" class="form-control" id="lot_area_minimum"
                                                           placeholder="Min. Lot Area"/>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="number" class="form-control" id="lot_area_maximum"
                                                           placeholder="Max. Lot Area"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="check">
                                            <label>
                                                <input type="checkbox" name="areaCheckbox" value="floor">
                                                <strong>Floor Area (sqm)</strong>
                                            </label>
                                        </div>
                                        <div class="floor-area " style="display:none;">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <input type="number" class="form-control" id="floor_area_minimum"
                                                           placeholder="Min. Floor Area"/>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="number" class="form-control" id="floor_area_maximum"
                                                           placeholder="Max. Floor Area"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{--Budget Section--}}
                            <div class="panel panel-default">
                                <div class="panel-heading">Budget</div>
                                <div class="panel-body">
                                    <div class="col-md-4">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="optionsRadios" value="open" checked="checked">
                                                <p id="lbl_open">Open Budget</p>
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="optionsRadios" value="define">
                                                <p id="lbl_define">Define Budget</p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="open-budget box" style="display:none;">
                                            <label>Price (in ₱)</label>
                                            <div class="form-group">
                                                <input type="number" class="form-control" id="open_budget"
                                                       placeholder=""/>
                                            </div>
                                        </div>
                                        <div class="define-budget box" style="display:none;">
                                            <div class="row">
                                                <form role="form" class="form-inline">
                                                    <div class="col-md-12">
                                                        <label>Price Range (in ₱)</label>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <input type="text" class="form-control prices"
                                                               id="budget_minimum"
                                                               placeholder="Min. Price" name="budget_min"
                                                               value="{{ $requirements->budget_min }}"/>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <input type="text" class="form-control prices"
                                                               id="budget_maximum"
                                                               placeholder="Max. Price" name="budget_max"
                                                               value="{{ $requirements->budget_max }}"/>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--Description Section--}}
                            <div class="panel panel-default">
                                <div class="panel-heading">Description</div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label for="bedroom">Number of Rooms</label>
                                        <input type="number" min="0" onpaste="return false" id="bedroom" name="rooms"
                                               class="form-control enter negative" value="{{ $requirements->rooms }}"
                                               placeholder="Number of Rooms">
                                    </div>
                                    <div class="form-group">
                                        <label for="bathroom">Number of Bathrooms</label>
                                        <input type="number" min="0" onpaste="return false" name="bathrooms"
                                               class="form-control enter negative" id="bathroom"
                                               value="{{ $requirements->bathrooms }}"
                                               placeholder="Number of Bathrooms">
                                    </div>
                                    <div class="form-group">
                                        <label for="parking">Number of Exclusive Parking</label>
                                        <input type="number" min="0" onpaste="return false" name="parking"
                                               class="form-control enter negative" value="{{ $requirements->parking }}"
                                               id="parking"
                                               placeholder="Number of Parking">
                                    </div>
                                    <div class="form-group">
                                        <label for="balcony">Number of Balcony</label>
                                        <input type="number" min="0" onpaste="return false" name="balcony"
                                               class="form-control enter negative" id="balcony"
                                               value="{{ $requirements->balcony }}"
                                               placeholder="Number of Balcony">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" >
                                <button type="button" class="btn btn-info btn-block" id="btnPost"> Update Requirement
                                </button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type='text/javascript' src='/assets/js/wizard-step.js'></script>
    <script type='text/javascript' src='/assets/js/wiz_requirements.js'></script>
    <script type='text/javascript' src='/assets/js/global.js'></script>
    <script>
        var $template = $(".template");
        var hash = 1;
        var new_location = {};
        var condition_type = {};
        var availability_type = {};
        var hash_con = 0;
        var storageSupported = typeof(Storage) !== "undefined" ? true : false;
        var locs = '{!! $requirements->location !!}';
        wiz.init();
        wiz.propertytype = '{{ $requirements->property_type }}';
        // $('#property_classification').on('change', wiz.loadPropertyType);
        $('input[type="radio"]').click(function () {
            if ($(this).attr("value") == "open") {
                $(".box").not(".open-budget").hide();
//                    $(".open-budget").show();
                $("#open_budget").attr('name', 'budget_max');
                $("#maximum").removeAttr('name');
            }
            if ($(this).attr("value") == "define") {
                $(".box").not(".define-budget").hide();
                $(".define-budget").show();
                $("#maximum").attr('name', 'budget_max');
                $("#open_budget").removeAttr('name');
            }
        });
        $('input[type="checkbox"]').click(function () {
            if ($(this).attr("value") == "lot") {
                $(".lot-area").toggle();
            }
            if ($(this).attr("value") == "floor") {
                $(".floor-area").toggle();
            }
        });

        $('#listing_type').on('change', function () {
            $('#hidden_listing_type').attr('value', $('#listing_type option:selected').val());
            $('#PType').hide();
            $('#listing_type:visible').parent().removeClass("has-error");
           initAvailability();
        });
        $('#property_classification').on('change',function () {
            $('#PClass').hide();
            $('#property_classification:visible').parent().removeClass("has-error");
        });
        $('#property_type').on('change', function () {
            $('#hidden_property_type').attr('value', $('#property_type option:selected').text());
            $('#PpropType').hide();
            $('#property_type:visible').parent().removeClass("has-error");
        });
        $('.condition_type').change(function () {
            if ($(this).is(":checked")) {
                hash_con = hash_con + 1;
                condition_type["condition" + hash_con] = $(this).val();
                $('#condition_type').attr('value', JSON.stringify(condition_type));
            }
            console.log($('#condition_type').val());
        });
        $('.availability_type').change(function () {
            if ($(this).is(":checked")) {
                hash_con = hash_con + 1;
                availability_type["availability" + hash_con] = $(this).val();
                $('#availability_type').attr('value', JSON.stringify(availability_type));
            }
            console.log($('#availability_type').val());
        });
        function addPanel() {
            // console.log(hash);
            var $newPanel = $template.clone();
            $newPanel.find(".collapse").addClass("in");
            $newPanel.find("#province1").attr("id", "province" + (1+hash));
            $newPanel.find(".accordion-toggle").attr("href", "#" + (++hash)).text("Location " + hash + ":");
            $newPanel.find("#lblcity").attr("style", "display:none");
            $newPanel.find("#city1").attr("id", "city" + hash);
            $newPanel.find("#location_hidden").attr("id", "location_hidden" + hash);
            $newPanel.find("#location_hidden" + hash).attr("name", "location" + hash);
            $newPanel.find("#l_city1").attr("id", "l_city" + hash);
            $newPanel.find("#f_city1").attr("id", "f_city" + hash);
            $newPanel.find("#location_header1").attr("id", "location_header" + hash);
            $newPanel.find("#collapseHead").attr("id", "collapseHead" + hash);
            $newPanel.find("#btn-remove").attr("id", "btn-remove" + hash);
            $newPanel.find("#btn-remove" + hash).attr("style", "");
            new_location["location" + hash] = $('#city' + hash + ' option:selected').text() + ' , ' + $('#province' + hash + ' option:selected').text();
            var lo = JSON.parse(locs);
            $newPanel.find("#location_header" + hash).text("Location " + hash + ": " + lo["location" + hash]);
            $newPanel.find("#location_header" + hash).attr("href", "#collapseHead" + hash);
            var provs = lo["location" + hash].split(',');
            $newPanel.find("#province" + hash + " option").filter(function () {
                return this.text == provs[1].trim();
            }).attr('selected',true);
            $("#city" + hash + " option").filter(function () {
                return this.text == provs[0].trim();
            }).attr('selected',true);
            $("#btn-remove" + (hash - 1)).attr("style", "display:none");
            $("#accordion").append($newPanel.fadeIn());
            $('#collapseHead').removeClass('in');
            $('#collapseHead' + (hash - 1)).removeClass('in');
            $('#btnAddLocation').addClass('disabled');
            if (hash < 10) {
                if ($('#province' + hash).val() == 'default' || $('#city' + hash).val() == 'default') {
                    $('#btnAddLocation').addClass('disabled');
                } else {
                    $('#btnAddLocation').removeClass('disabled');
                }
            }
        }
        function addMunicipality(prov){
            var ret = '<select name="city" onchange="wiz.handleCheckpoint(this)" id="city' + hash + '" class="form-control" required><option value="default" default selected hidden>Which city/municipality does it belong to ?</option>';
            var selVal = prov.find("option:selected").val();
            var con = $("#f_city" + hash);

            $("#city" + hash).prop('disabled', true);
            $('#l_city' + hash).fadeIn();

            if ($(this).find('option:selected').val() == 'default') {
                $('label[for="city"]').hide();
                $('#l_city' + hash).hide();
                $('#f_city' + hash).hide();
            }
            if (storageSupported) {
                if (!JSON.parse(storageLoad('province_' + selVal))) {

                    $.get('/dashboard/property/wizard/requests', {
                        reqtype: "province",
                        value: selVal
                    }).done(function (data) {
                        storageSave('province_' + selVal + '_data', JSON.stringify(data));
                        $.each(data, function (i, v) {
                            ret += '<option value="' + v.id + '">' + v.name + '</option>';
                        });
                        ret += '</select>';
                        $('#l_city' + hash).fadeOut();
                        con.html(ret).fadeIn(500);
                    });
                    storageSave('province_' + selVal, true);
                } else {
                    var data = JSON.parse(storageLoad('province_' + selVal + '_data'));
                    for (var x = 0; x < data.length; x++) {
                        ret += '<option value="' + data[x].id + '">' + data[x].name + '</option>';
                    }
                    ret += '</select>';
                    $('#l_city' + hash).fadeOut();
                    con.html(ret).show().fadeIn();
                }
            }
            else {
                $.get('/dashboard/property/wizard/requests', {
                    reqtype: "province",
                    value: selVal
                }).done(function (data) {
                    storageSave('province_' + selVal + '_data', JSON.stringify(data));
                    $.each(data, function (i, v) {
                        ret += '<option value="' + v.id + '">' + v.name + '</option>';
                    });
                    ret += '</select>';
                    $('#l_city' + hash).fadeOut();
                    con.html(ret).fadeIn(500);
                });
            }
            $('label[for="city"]').show();
            if (selVal == 'default') {
                con.hide();
                $('label[for="city"]').hide();
                $('#l_city' + hash).hide();
            }
        }
        function storageSave(key,value){
            localStorage.setItem(key,value);
        }
        function storageLoad(key){
            return localStorage.getItem(key);
        }
        function initAvailability(){
            if($('#listing_type option:selected').text().trim() === 'Want to Buy')
            {

                $('#chck_avail_1').slideDown();
                $('#chck_avail_2').slideUp();
            }
            if($('#listing_type option:selected').text().trim() === 'Want to Rent')
            {

                $('#chck_avail_2').slideDown();
                $('#chck_avail_1').slideUp();
            }
            if($('#listing_type option:selected').text().trim() === 'Want to Joint Venture')
            {

                $('#chck_avail_2').slideUp();
                $('#chck_avail_1').slideUp();
            }

        }
        $(document).ready(function () {
            var city_def = '{{ rtrim($location[0]) }}';
            var loc = '{{ rtrim($location[0]) }}' + ',' + '{{ ltrim($location[1]) }}';
           $('#chck_avail_1').hide();
           $('#chck_avail_2').hide();
            $('#hidden_listing_type').val($('#listing_type').val());
            $('#hidden_property_type').val('{{ $requirements->property_type }}');
            $("#bedroom").keydown(wiz.inputNumOnly);
            $("#bathroom").keydown(wiz.inputNumOnly);
            $("#parking").keydown(wiz.inputNumOnly);
            $("#balcony").keydown(wiz.inputNumOnly);
            $("#budget_minimum").keydown(wiz.inputNumOnly);
            $("#budget_maximum").keydown(wiz.inputNumOnly);
            $("#lot_area_minimum").keydown(wiz.inputNumOnly);
            $("#lot_area_maximum").keydown(wiz.inputNumOnly);
            $("#floor_area_minimum").keydown(wiz.inputNumOnly);
            $("#floor_area_maximum").keydown(wiz.inputNumOnly);
            $("#location_header").text("Location " + hash + ": " + loc);
            wiz_requirements.init(city_def);
            var locations = '{!! $requirements->location !!}';
            var numOfLocation = Object.keys(JSON.parse(locations)).length;
            initAvailability();
            wiz_requirements.hash = numOfLocation;
            $('#location_header1').text('Location 1: ' + JSON.parse(locs)['location1']);
            for(var i = 1; i < numOfLocation; i++) {
                addPanel();
               $("#province" + (i+1)).ready(wiz_requirements.loadMunicipality(i+1));
            }
            for(var i = 1; i <= numOfLocation; i++) {
               $('#city'+i+' option').filter(function () { return $(this).text().trim() == JSON.parse(locations)['location' + i].split(',')[0]; }).prop("selected", true);;
            }
           var pType = ['Parking Unit', 'Parking Building', 'Beach Lot', 'Vacant Land / '];
           var thingsTobeHide = ['bedroom','bathroom','balcony'];
            $('#property_type').ready(function(){
                for (var i = 0; i < pType.length; i++) {
                    if('{{ $requirements->property_type }}' === pType[i]){
                        for(var j = 0; j < thingsTobeHide.length; j++)
                        {
                            $('#'+thingsTobeHide[j]).val('');
                            $('#'+thingsTobeHide[j]).parent().hide();
                        }    
                }
            }
            });
           $(document).on('change', '#property_type',function(){
                var selectedPType = $('#hidden_property_type').val().trim();
                    if(selectedPType == pType[0] 
                        || selectedPType == pType[1] 
                        || selectedPType == pType[2]){
                        for(var j = 0; j < thingsTobeHide.length; j++)
                        {
                            $('#'+thingsTobeHide[j]).val('');
                            $('#'+thingsTobeHide[j]).parent().hide();
                        }    
                    }else{
                        for(var j = 0; j < thingsTobeHide.length; j++)
                        {
                            $('#'+thingsTobeHide[j]).parent().fadeIn();
                        }    
                    }
             });            

            $('#btnAddLocation').removeClass('disabled');
            $('#btnPost').on('click', function (e) {
            var listing_type = $('#listing_type').val();
            var availability_type = $('#availability_type').val();
            var property_classification = $('#property_classification').val();
            var property_type = $('#property_type').val();
            var condition_type = $('#condition_type').val();
            var prov = $('#province1').val();
            var municipality = $('#city').val();
            var er = [];
            e.preventDefault();
            if (listing_type == 'default') {
                er[0] = 1;
                $('#PType').show();
                $('#listing_type:visible').parent().addClass("has-error");
                $("html, body").animate({scrollTop: 0}, "slow");
            } else {
                er[0] = 0;
                $('#PType').hide();
                $('#listing_type:visible').parent().removeClass("has-error");
            }
            if (availability_type == '') {
                er[1] = 1;
                $('#PAvail').show();
                $('#availability_type_box').parent().addClass("has-error");
            } else {
                er[1] = 0;
                $('#PAvail').hide();
                $('#availability_type_box').parent().removeClass("has-error");
            }
            if (property_classification == 'default') {
                er[2] = 1;
                $('#PClass').show();
                $('#property_classification:visible').parent().addClass("has-error");
                $("html, body").animate({scrollTop: 0}, "slow");
            } else {
                er[2] = 0;
                $('#PClass').hide();
                $('#property_classification:visible').parent().removeClass("has-error");
            }
            if (property_type == 'default') {
                er[3] = 1;
                $('#PpropType').show();
                $('#property_type:visible').parent().addClass("has-error");
                $("html, body").animate({scrollTop: 0}, "slow");
            } else {
                er[3] = 0;
                $('#PpropType').hide();
                $('#property_type:visible').parent().removeClass("has-error");
            }
            if (condition_type == '') {
                er[4] = 1;
                $('#PCondition1').show();
                $('#condition_type_box:visible').parent().addClass("has-error");
                $("html, body").animate({scrollTop: 0}, "slow");
            } else {
                er[4] = 0;
                $('#PCondition1').hide();
                $('#condition_type_box:visible').parent().removeClass("has-error");
            }

            if (er[0] == 0 && er[1] == 0 && er[2] == 0 && er[3] == 0 && er[4] == 0 && condition_type != '' && availability_type != '') {
                new_location = {};
                console.log($('.accordion-toggle').length);
                for(var i = 1; i <= $('.accordion-toggle').length; i++){
                    new_location['location' + i] = $('#location_header'+i).text().split(":").pop().trim();
                }
                $('#location_hidden').val(JSON.stringify(new_location));
                console.log(JSON.stringify(new_location));
                $('#form_submit').submit();
            }
            });

            $(document).on('change', '#province1',function(){
                wiz_requirements.loadMunicipality(1);                    
            });
            $(document).on('change', '#province2',function(){
                wiz_requirements.loadMunicipality(2);                    
            });
            $(document).on('change', '#province3',function(){
                wiz_requirements.loadMunicipality(3);                    
            });
            $(document).on('change', '#province4',function(){
                wiz_requirements.loadMunicipality(4);                    
            });
            $(document).on('change', '#province5',function(){
                wiz_requirements.loadMunicipality(5);                    
            });
            $(document).on('change', '#province6',function(){
                wiz_requirements.loadMunicipality(6);                    
            });
            $(document).on('change', '#province7',function(){
                wiz_requirements.loadMunicipality(7);                    
            });
            $(document).on('change', '#province8',function(){
                wiz_requirements.loadMunicipality(8);                    
            });
            $(document).on('change', '#province9',function(){
                wiz_requirements.loadMunicipality(9);                    
            });
            $(document).on('change', '#province10',function(){
                wiz_requirements.loadMunicipality(10);                    
            });
            $(document).on('change','#city1',function(){
                wiz_requirements.hash = 1;
                wiz_requirements.citySelected();
            });
            $(document).on('change','#city2',function(){
                wiz_requirements.hash = 2;
                wiz_requirements.citySelected();
            });
            $(document).on('change','#city3',function(){
                wiz_requirements.hash = 3;
                wiz_requirements.citySelected();
            });
            $(document).on('change','#city4',function(){
                wiz_requirements.hash = 4;
                wiz_requirements.citySelected();
            });
            $(document).on('change','#city5',function(){
                wiz_requirements.hash = 5;
                wiz_requirements.citySelected();
            });
            $(document).on('change','#city6',function(){
                wiz_requirements.hash = 6;
                wiz_requirements.citySelected();
            });
            $(document).on('change','#city7',function(){
                wiz_requirements.hash = 7;
                wiz_requirements.citySelected();
            });
            $(document).on('change','#city8',function(){
                wiz_requirements.hash = 8;
                wiz_requirements.citySelected();
            });
            $(document).on('change','#city9',function(){
                wiz_requirements.hash = 9;
                wiz_requirements.citySelected();
            });
            $(document).on('change','#city10',function(){
                wiz_requirements.hash = 10;
                wiz_requirements.citySelected();
            });

        });
    </script>
@endsection
