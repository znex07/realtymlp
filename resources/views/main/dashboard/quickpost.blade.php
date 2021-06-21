@extends('main.dashboard.property.base')
@section('styles')
    <link rel="stylesheet" href="/assets/admincss/select2.min.css">
    <link rel="stylesheet" href="/assets/css/dashboard/dashboard.css">


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

        .quick-post {

        }

        @media screen and (max-width: 768px) {
            .quick-post {
                padding: 0px !important;
            }
        }

        @media screen and (max-width: 480px) {
            .hidden-xxs {
                display: none;
            }

            .visible-xxs {
                display: block;
            }
        }

        .visible-xxs {
            display: none;
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
                        <li class="active">Quick Post</li>
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
                        <form action='/property' id="form_submit" method='POST'>
                            <input type='hidden' name='_token' value='{{ csrf_token() }}'/>
                            <input type='hidden' name='method_type' value='quick'/>

                            <div class="form-group">
                                <label>Title * (required)<p class="text-danger" id="PTitle" style="font-size: 12px;display:none;">
                                        This is required field </p></label>
                                <input type="text" name="property_title" id="property_title" class="form-control"
                                       placeholder="Title">
                                <span class="counter hidden-xs" id="counter_title">60/60 Characters Left</span>
                            </div>
                            <div class="form-group">
                                <label>Listing Type * (required)<p class="text-danger" id="PListing"
                                                        style="font-size: 12px;display:none;">This is required field </p>
                                </label><br>
                                <select name="listing_type" id="listing_type" onchange="wiz.handleCheckpoint(this)"
                                        class="form-control">
                                    <option value="default" default hidden>For Rent, For Sale, or for Joint Venture?
                                    </option>
                                    @foreach($transaction as $transactions)
                                        <option value="{{ $transactions->id }}">{{ $transactions->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Condition Type * (required)<p class="text-danger" id="PCondition"
                                                        style="font-size: 12px;display:none;">This is required field </p>
                                </label>
                                <select name="condition_type" id="condition_type" onchange="wiz.handleCheckpoint(this)"
                                        class="form-control">
                                    <option value="default" default selected hidden>What's the condition of the
                                        property?
                                    </option>
                                    @foreach($condition as $condtions)
                                        <option value="{{ $condtions->category_id }}">{{ $condtions->description }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Availability Type * (required)<p class="text-danger" id="PAvail"
                                                             style="font-size: 12px;display:none;">This is required
                                        field </p></label>
                                <select name="availability_type" onchange="wiz.handleCheckpoint(this)"
                                        id="availability_type" class="form-control">
                                    <option value="default" default selected hidden>What's the availability of the
                                        property?
                                    </option>
                                    @foreach($availabilities as $availability)
                                        <option value="{{ $availability->category_id }}">{{ $availability->description }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class='form-group' data-placement="top" data-trigger="hover focus"
                                 title="this is a required field">
                                <label for="property_classification" onchange="wiz.handleCheckpoint(this)">Property
                                    Classification * (required)<p class="text-danger" id="PClass"
                                                       style="font-size: 12px;display:none;">This is required field </p>
                                </label>
                                <select onchange="wiz.handleCheckpoint(this)" name="property_classifications"
                                        autocomplete="off" id="property_classification" class="form-control">
                                    <option value="default" default selected hidden>What's the Classification of the
                                        Property?
                                    </option>
                                    @foreach($department as $d)
                                        <option value="{{$d->id}}">{{$d->department_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class='form-group' id="c_property_type" style='display:none;'>
                                <label for="property_type">Choose Property Type * (required)<p class="text-danger" id="PType"
                                                                                    style="font-size: 12px;display:none;">
                                        This is required field </p></label>

                                <div class="loader" id="l_property_type"></div>
                                <select  onchange="wiz.handleCheckpoint(this)" autocomplete="off"
                                        id="property_type" class="form-control">
                                </select>
                                <input type="hidden" name="property_types" id="hidden_property_type">
                            </div>
                            <div class="form-group" data-placement="top" data-trigger="hover focus"
                                 title="this is a required field">
                                <label for="province">Province * (required)<p class="text-danger" id="PProvince"
                                                                   style="font-size: 12px;display:none;">This is
                                        required field </p></label>
                                <select name="province" onchange="wiz.handleCheckpoint(this)" autocomplete="off"
                                        id="province" class="form-control">
                                    <option value="default" default hidden>Choose Province</option>
                                    @foreach($province as $l)
                                        <option value="{{$l->id}}">{{$l->name}}</option>
                                    @endforeach
                                </select>
                                <input type="hidden" name="lp_province" value="" id="lp_province"/>
                            </div>
                            <div class="form-group" data-placement="top" data-trigger="hover focus"
                                 title="this is a required field">
                                <label for="city" style="display:none;">City / Municipality * (required)<p class="text-danger"
                                                                                                id="PCity"
                                                                                                style="font-size: 12px;display:none;">
                                        This is required field </p></label>

                                <div class="loader" id="l_city"></div>
                                <div id="f_city"></div>
                                <input type="hidden" name="lp_city" value="" id="lp_city"/>
                            </div>
                            <div class="form-group">
                                <label for="brgy">Barangay</label>
                                <input type="text" autocomplete='off' value="" name="brgy" id="brgy"
                                       placeholder="Barangay" class="form-control enter">
                            </div>
                            <div class="form-group">
                                <label for="street_address">Address</label>
                                <input type="text" autocomplete='off' value="" class="form-control enter"
                                       name="street_address" id="street_address" placeholder="Street Address">
                                <span class="counter hidden-xs" id="counterS">160/160 Characters left</span>
                            </div>
                            <div class="form-group" data-placement="top" data-trigger="hover focus"
                                 title="this is a required field" id="f_rental_price" style="display: none;">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label for="rental_price">Rental Price (in PHP) *<p class="text-danger"
                                                                                            id="PRental"
                                                                                            style="font-size: 12px;display:none;"></p></label>

                                        <div class="input-group hidden-xs" style="width: auto;">
                                            <input oninput="wiz.handleCheckpoint(this)" type="text" autocomplete='false'
                                                   class="form-control numeric enter prices" aria-label="..."
                                                   id="rental_price" name="rental_price" placeholder="Rental Price">
                                        <span class="input-group-addon addon-select">
                                        <select name="rental_stat" class='stat'>
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
                            <div id="f_lot_area" style="display: none;">
                                <div class="row">
                                    <div class="col-lg-12 ">
                                        <label for="lot_area">Lot Area</label>

                                        <div class="input-group" style="width: auto;">
                                            <input type="text" min="0" autocomplete='off' onpaste='return false'
                                                   id="lot_area" class="form-control numeric enter prices" name="lot_area"
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
                                                   id="floor_area" class="form-control numeric enter prices" name="floor_area"
                                                   placeholder="Floor Area">
                <span class="input-group-addon">
                    <span style="color:black;">square meters</span>
                </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" data-placement="top" data-trigger="hover focus"
                                 title="this is a required field" id="f_selling_price" style="display: none;">
                                <div class="row">
                                    <div class="col-lg-12 hidden-xs">
                                        <label for="selling_price">Selling Price (in PHP) *<p class="text-danger"
                                                                                              id="PSelling"></p></label>

                                        <div class="input-group" style="width: auto;">
                                            <input oninput="wiz.handleCheckpoint(this)" type="text" autocomplete='false'
                                                   class="form-control numeric enter prices" aria-label="..."
                                                   id="selling_price" name="selling_price" placeholder="Selling Price">
                                            <span class="input-group-addon addon-select">
                                        <select name="selling_stat" class='stat'>
                                            <option value="gross">Selling Price</option>
                                        </select>
                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" id="description" class="form-control"
                                          style="height: 120px; resize: none;" placeholder="Description"></textarea>
                                <span class="counter hidden-xs" id="counter_desc">2000/2000 Characters Left</span>
                            </div>
                            <div class="form-group">
                                <label>Personal Notes</label>
                                <label class="text-muted"> (This notes will not be shown on public.)</label>
                                <textarea name="personal_notes" id="personal_notes" class="form-control"
                                          style="height:100px; resize:none;" placeholder="Personal Notes"></textarea>
                                <span class="counter hidden-xs" id="counter_notes">2000/2000 Characters Left</span>

                            </div>
                            <div class="form-group well">
                                <p><strong>
                                    Is this viewable in public ?
                                </strong></p>
                                <label class="radio" for="radio1" style="display:inline; margin: 0 5px;">
                                    <input type="radio" name="optionsRadios1" value="1" id="radio1" data-toggle="radio" checked="checked" class="custom-radio">
                                    Public
                                </label>
                                <label class="radio" for="radio2" style="display:inline; margin: 0 5px;">
                                    <input type="radio" name="optionsRadios1" value="2" id="radio2" data-toggle="radio" class="custom-radio">
                                    Private
                                </label>
                          </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-info btn-block submit" id="btnPost">Post Property
                                </button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')

    <script type='text/javascript' src='/assets/js/wiz.js'></script>
    <script type='text/javascript' src='/assets/js/jquery.numeric.min.js'></script>
    <script type='text/javascript' src='/assets/js/wizard-step.js'></script>
    <script type='text/javascript' src='/assets/js/wizard-edit.js'></script>
    <script type='text/javascript' src='/assets/js/quickpost.js'></script>



@endsection
