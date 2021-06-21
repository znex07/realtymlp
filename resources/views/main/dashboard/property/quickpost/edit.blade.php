@extends('main.dashboard.property.base')
@section('styles')
    <link rel="stylesheet" href="/assets/admincss/select2.min.css">

    <style>
        .select2-selection {
            border: 2px solid #bdc3c7 !important;
        }

        .select2-container--default.select2-container--focus .select2-selection--multiple {
            border: 2px solid #1abc9c !important;
        }

        .select2-selection__choice {
            background-color: #1abc9c !important;
            color: white !important;
            font-size: 16px !important;
            font-weight: 500 !important;
        }

        .select2-selection__choice .select2-selection__choice__remove {
            color: white !important;
        }

        .addon-select {
            padding: 0 !important;
        }

        .addon-select select.stat {
            color: black;
            background: transparent;
            border: none;
            outline: none;
            padding: 3px;
        }
    </style>
@endsection
@section('content.inner')
    <div class="row center-block">
        <div class="col-xs-12 col-sm-9 content">
            <div class="panel panel-default">
                <div class="panel-body quick-post">
                    <ul class="breadcrumb">
                        <li><a href="/dashboard/overview">Overview</a></li>
                        <li><a href="/dashboard">Listings</a></li>
                        <li class="active"> Edit Quick Post</li>
                    </ul>
                    <hr>
                    @if($errors->all())
                        <div class='alert alert-danger'>
                            @foreach($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif

                    @if(session()->get('quick.success'))
                        <div class='alert alert-success'>
                            {{ session()->get('quick.success') }}
                        </div>
                    @endif
                    @if(session()->get('full.success'))
                        <div class='alert alert-success'>
                            {{ session()->get('full.success') }}
                        </div>
                    @endif
                    <div class="col-md-offset-1 col-md-10 col-sm-12">
                        <form action='/dashboard/property/quickpost/edit' id="form_submit" method='POST'>
                            <input type='hidden' name='_token' value='{{ csrf_token() }}'/>
                            <input type="hidden" name='id' value='{{ $property->id }}'/>
                            <input type='hidden' name='method_type' value='quick'/>

                            <div class="form-group">
                                <label>Title *</label>
                                <input type="text" name="property_title" id="property_title" class="form-control"
                                       placeholder="Title" value="{{ $property->property_title }}">
                                <!-- <span class="counter" id="counter_title">100/100 Characters Left</span> -->
                            </div>


                            <div class="form-group">
                                <label>Choose Listing Type*</label><br>
                                <select name="listing_type" id="listing_type" class="form-control">
                                    @foreach($transaction as $transactions)
                                        <option value="{{ $transactions->id }}" {{ $property->listing_type == $transactions->id ? 'selected' : '' }} >{{ $transactions->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Condition</label>
                                <select name="condition_type" class="form-control">
                                    <option value="defaut"></option>
                                    @foreach($condition as $condtions)
                                        <option value="{{ $condtions->category_id }}" {{ $property->condition_type == $condtions->category_id ? 'selected' : '' }}>{{ $condtions->description }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Choose Availability of the Property</label>
                                <select name="availability_type" class="form-control">
                                    <option value="defaut"></option>
                                    @foreach ($availabilities as $availability)
                                        <option value="{{ $availability->category_id }}" {{ $property->availability_type == $availability->category_id ? 'selected' : '' }}>{{ $availability->description }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class='form-group' data-placement="top" data-trigger="hover focus"
                                 title="this is a required field">
                                <label for="property_classification">Property Classification * </label>
                                <select required name="property_classification" autocomplete="off"
                                        id="property_classification" class="form-control">
                                    <option value="default" default selected hidden>What's the Classification of the
                                        Property?
                                    </option>
                                    @foreach($department as $d)
                                        <option class="option_classification" value="{{$d->id}}" {{ $property->property_classifications == $d->id ? 'selected' : '' }}>{{$d->department_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class='form-group' id="c_property_type" style="display: none;">
                                <label for="property_type">Choose Property Type</label>
                                <div class="loader" id="l_property_type"></div>
                                <select name="property_types" autocomplete="off" id="property_type"
                                        class="form-control">
                                </select>
                            </div>
                            <div class="form-group" data-placement="top" data-trigger="hover focus"
                                 title="this is a required field">
                                <label for="province">Province *</label>
                                <select name="province" autocomplete="off" id="province" class="form-control" required>
                                    <option value="default">Choose Province</option>
                                    @foreach($province as $l)
                                        <option class="option_province" value="{{$l->id}}" {{ $property->province == $l->id ? 'selected' : '' }}>{{$l->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group" data-placement="top" da ta-trigger="hover focus" title="this is a required field">
                                <label for="city" style="display:none;">City / Municipality * (required)</label>
                                <div class="loader" id="l_city"></div>
                                <div id="f_city"></div>
                            </div>


                            <div class="form-group">
                                <label for="brgy">Barangay</label>
                                <input type="text" autocomplete='off' value="{{ $property->brgy }}" name="brgy"
                                       id="brgy" placeholder="Barangay" class="form-control enter">
                            </div>

                            <div class="form-group">
                                <label for="street_address">Define Your Location: Street Address</label>
                                <input type="text" autocomplete='off' class="form-control enter" name="street_address"
                                       id="street_address" placeholder="Street Address"
                                       value="{{ $property->street_address }}">
                                <span class="counter" id="counterS">160 Characters left</span>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" id="description" class="form-control"
                                          style="height: 120px; resize: none;"
                                          placeholder="Description">{{ $property->description }}</textarea>
                                <span class="counter" id="counter_desc">250/250 Characters Left</span>
                            </div>
                            <div class="form-group" data-placement="top" data-trigger="hover focus"
                                 title="this is a required field" id="f_rental_price" style="display: none;">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label for="rental_price">Rental Price (in PHP) *</label>
                                        <div class="input-group" style="width: auto;">
                                            <input type="text" autocomplete='false'
                                                   class="form-control numeric enter prices" aria-label="..."
                                                   id="rental_price" name="rental_price"
                                                   value="{{ $property->rental_price }}" placeholder="Rental Price"
                                                   required>
                                    <span class="input-group-addon addon-select">
                                        <!-- <input type="radio" class='rental_stat' name="rental_stat" value="per sqm" checked id="rental_stat1"><label for="rental_stat1">per <span class="sqmsqf">sq. m.</span></label>
                                        <input type="radio" class='rental_stat' name="rental_stat" value="per month" id="rental_stat2"><label for="rental_stat2">per month</label> -->
                                        <select name="rental_stat" id="rental_stat" class='stat'>
                                            <option value="per_month">Rent per Month</option>
                                            <option class="rent_per_day" value="rent_per_day">Rent Per Day</option>
                                            <option class="rent_per_week" value="rent_per_week">Rent Per Week</option>
                                            <option class="rent_per_quarter" value="rent_per_quarter">Rent Per Quarter</option>
                                            <option class="rent_per_year" value="rent_per_year">Rent Per Year</option>
                                        </select>
                                    </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" data-placement="top" data-trigger="hover focus"
                                 title="this is a required field" id="f_selling_price" style="display: none;">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label for="selling_price">Selling Price (in PHP) *</label>
                                        <div class="input-group" style="width: auto;">
                                            <input type="text" autocomplete='false'
                                                   class="form-control numeric enter prices" aria-label="..."
                                                   id="selling_price" name="selling_price"
                                                   value="{{ $property->selling_price }}" placeholder="Selling Price"
                                                   required>
                                        <span class="input-group-addon addon-select">
                                            <!-- <input type="radio" class='selling_stat' name="selling_stat" value="per sqm" checked id="selling_stat1"><label for="selling_stat1">per <span class="sqmsqf">sq. m.</span></label>
                                            <input type="radio" class='selling_stat' name="selling_stat" value="for whole property" id="selling_stat2"><label for="selling_stat2">for whole property</label> -->
                                            <select name="selling_stat" id="selling_stat" class='stat'>
                                                <option value="gross">Selling Price</option>
                                            </select>
                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="f_lot_area" style="display: none;">
                                <div class="row">
                                    <div class="col-lg-12 ">
                                        <label for="lot_area">Lot Area</label>

                                        <div class="input-group" style="width: auto;">
                                            <input type="text" min="0" autocomplete='off' onpaste='return false'
                                                   id="lot_area" class="form-control numeric enter prices" value="{{$property->lot_area}}" name="lot_area"
                                                   placeholder="Lot Area">
                        <span class="input-group-addon">
                            <span style="color:black;">square meters</span>
                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="f_floor_area" style="display: none;">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label for="floor_area">Floor Area</label>

                                        <div class="input-group" style="width: auto;">
                                            <input type="text" min="0" autocomplete='off' onpaste='return false'
                                                   id="floor_area" class="form-control numeric enter prices" value="{{$property->floor_area}}" name="floor_area"
                                                   placeholder="Floor Area">
                <span class="input-group-addon">
                    <span style="color:black;">square meters</span>
                </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Personal Notes</label>
                                <textarea name="personal_notes" class="form-control" style="height:100px; resize:none;"
                                          placeholder="Personal Notes">{{ $property->personal_notes }}</textarea>
                                <span class="counter" id="counter_notes">1000/1000 Characters Left</span>

                            </div>
                            <div class="form-group well">
                                <p><strong>
                                    Is this viewable in public ?
                                </strong></p>
                                <label class="radio" for="radio1" style="display:inline; margin: 0 5px;">
                                    <input type="radio" name="property_status" value="3" id="radio1" data-toggle="radio" class="custom-radio">
                                    Public
                                </label>
                                <label class="radio" for="radio2" style="display:inline; margin: 0 5px;">
                                    <input type="radio" name="property_status" value="4" id="radio2" data-toggle="radio" class="custom-radio">
                                    Private
                                </label>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-info btn-block submit" id="btnPost">Update
                                    Property
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection


@section('scripts')
    <script>
        var city = '{{ rtrim($property->city_title) }}';
        var listing_type = '{{$property->listing_type}}'
        if(listing_type == '1')
        {
            $('#f_rental_price').show();
        }
        if(listing_type == '2')
        {
            $('#f_selling_price').show();
        }

        var prop_status = '{{$property->property_status}}'
        if(prop_status == '3')
        {
            document.getElementById('radio1').checked = true;
        }
        if(prop_status == '4')
        {
            document.getElementById('radio2').checked = true;
        }
        $(document).ready(function(){
            $('#accordion').fadeIn();
            $('#btnAddLocation').fadeIn();
            var storageSupported = typeof(Storage) !== "undefined" ? true : false;
            $("#province").ready(function(){
                $('#street_address').val('');
                $('#brgy').val('');
                var ret = '<select name="city"  onchange="mapa.geocode();wiz.handleCheckpoint(this)" id="city" class="form-control" required><option value="default" default selected hidden>Which city/municipality does it belong to ?</option>';
                //</select>'
                var selVal = $(this).find(".option_province:selected").val();
                var prov = $(this).find("option:selected").text();
                var con = $("#f_city");
                $("#city").prop('disabled',true);
                $('#l_city').fadeIn();
                $('#lp_province').attr('value',$('#province option:selected').text());

                if($(this).find('option:selected').val() == 'default') {
                    $('label[for="city"]').hide();
                    $('#l_city').hide();
                    $('#f_city').hide();
                }
                if(selVal == 'default')
                {
                    $('#l_city').fadeOut();
                    ret += '<option disabled>Please Choose Province to load municipality</option></select>';
                    con.html(ret).fadeIn(500);
                }else {
                    if(storageSupported){
                        if(!JSON.parse(storageLoad('province_'+selVal))) {
                            $.get('/dashboard/property/wizard/requests',{reqtype:"province",value:selVal}).done(function(data){
                                storageSave('province_'+selVal+'_data',JSON.stringify(data));
                                $.each(data,function(i,v){
                                    ret+='<option value="'+ v.id+'">'+ v.name +'</option>';
//                                    console.log(v.name);
                                });
                                ret += '</select>';
                                $('#l_city').fadeOut();
                                con.html(ret).fadeIn(500);
                            });
//                            console.log(city);
                            storageSave('province_'+selVal,true);
                        } else {
                            var data = JSON.parse(storageLoad('province_'+selVal+'_data'));
                            for (var x=0;x<data.length;x++) {
                                if(city.replace(' ','') === data[x].name.replace(' ',''))
                                {
                                    ret+='<option value="'+ data[x].id+'" selected="selected">'+ data[x].name +'</option>';

                                }else{
                                    ret+='<option value="'+ data[x].id+'">'+ data[x].name +'</option>';
                                }
//                                console.log(data[x].name);
                            }
                            ret += '</select>';
                            $('#l_city').fadeOut();
                            con.html(ret).show().fadeIn();
                        }
                    }
                    else {
                        $.get('/dashboard/property/wizard/requests',{reqtype:"province",value:selVal}).done(function(data){
                            storageSave('province_'+selVal+'_data',JSON.stringify(data));
                            $.each(data,function(i,v){
                                ret+='<option value="'+ v.id+'">'+ v.name +'</option>';
                            });
                            ret += '</select>';
                            $('#l_city').fadeOut();
                            con.html(ret).fadeIn(500);
                        });
                    }
                }
                $('label[for="city"]').show();

                // if (selVal == 'default') {
                //     con.hide();
                //     $('label[for="city"]').hide();
                //     $('#l_city').hide();
                // }
            });
        });

    </script>
    <script type='text/javascript' src='/assets/js/wiz.js'></script>
    <script type='text/javascript' src='/assets/js/jquery.numeric.min.js'></script>
    <script type='text/javascript' src='/assets/js/wizard-step.js'></script>
    <script type='text/javascript' src='/assets/js/wizard-edit.js'></script>
    <script type='text/javascript' src='/assets/js/quickpost.js'></script>
    <script>edit.init()</script>
    <script>wiz.init()</script>



@endsection







