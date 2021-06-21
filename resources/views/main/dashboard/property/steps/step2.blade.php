<div class="col-xs-12 col-md-10 col-md-offset-1">
    <h6 class="h6Header">location</h6>
    <div class="form-group" data-placement="top" data-trigger="hover focus" title="this is a required field">
        <label for="province">Province * (required)</label>
        <select onchange="mapa.geocode();wiz.handleCheckpoint(this)" name="province" autocomplete="off" id="province" class="form-control" required>
            <option value="default" hidden>Which province does it belong to?</option>
            @foreach($locProvince as $l)
                <option value="{{$l->id}}" {{ $property->province == $l->id ? 'selected' : '' }}>{{$l->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group" data-placement="top" data-trigger="hover focus" id="c_city" title="this is a required field">
        <label for="city" style="display:none;">City / Municipality * (required)</label>
        <div class="loader" id="l_city"></div>
        <div id="f_city"></div>
    </div>
    <div class="form-group" id="c_bldg_name" style="display: none">
        <label for="bldg_name">Building / Project Name</label>
        <input type="text" value="" onchange="" name="bldg_name" id="bldg_name" placeholder="What Building is it in?" autocomplete="off" class="form-control enter">
    </div>
    <div class="form-group" id="c_brgy" style="display: none">
        <label for="brgy">Barangay</label>
        <input type="text"  value="{{ $property->brgy }}" onchange="mapa.geocode();" name="brgy" id="brgy" placeholder="What barangay is it in?" class="form-control enter">
    </div>
    <div class="form-group" id="c_street_address" style="display: none">
        <label for="street_address">Street Address</label>
        <input type="text"  value="{{ $property->street_address }}" onchange="mapa.geocode();" class="form-control enter" name="street_address" id="street_address" placeholder="What's the street address?">
    </div>
    <div class="well well-sm well-pin">
        <div class="form-group" id="c_drop_pin">
            <label for="pin">Do you want to drop a Pin ?</label>            
            <label class="checkbox" for="pin">
                <input data-content="Please drag &amp; drop the red pin to where the location is" type="checkbox" value="" id="pin" onchange="mapa.map_button(this); mapa.popover();" data-toggle="checkbox" class="map-btn custom-checkbox">
            </label>
            <a href="" class="btn btn-sm btn-primary" disabled>Done</a>
        </div>
        
    </div>
    <div class="form-group" id="map-wrapper" style="display: none;">
        <div id="map" style="height:300px;background:#e6e6e6;"></div>
        {{--<div class="map-control">--}}

            {{--<div>--}}
                {{--<input data-content="Please drag &amp; drop the red circle to where the location is. You can re-size the circle by dragging the small white circle" type="checkbox" id="area" onchange="mapa.map_button(this); mapa.popover();" class="map-btn">--}}
                {{--<label for="area"> Drop an Area</label>--}}
            {{--</div>--}}
            {{--<div>--}}
                {{--<input data-content="Please drag &amp; draw where the location is. " type="checkbox" id="draw" onchange="mapa.map_draw(); mapa.popover();" class="map-btn">--}}
                {{--<label for="drawing"> Draw on Map</label>--}}
            {{--</div>--}}
            {{--<div id="map-btn-remove" style="display: none;"><input type="button" onclick="mapa.map_button(this)" id="rmv-mrk" class="hidden"> <label for="rmv-mrk"><i id="rmv-mrk1" class="fa fa-times"></i>  Clear</label></div>--}}
            {{--<div id="map-btn-desc" style="display:none;">--}}

            {{--</div>--}}
        {{--</div>--}}

        <input type="hidden" id="complete_address" value="">
        <input type="hidden" value="" name="google_lang">
        <input type="hidden" value="" name="google_lat">
        <input type="hidden" name="marker_type">
        <input type="hidden" id="brgy" value="{{$property->brgy}}">
        <input type="hidden" id="street_address" value="{{$property->street_address}}">
        <input type="hidden" name="map_options" value="{{ $property->map_options }}">
    </div>
    <button class="btn btn-primary nextBtn btn-lg pull-right"  onclick="wiz.gotoStep(3);wiz.step_3();" type="button" ><span>Next <i class='fa fa-arrow-right'></i></span></button>
    <button class="btn btn-primary prevBtn btn-lg pull-right "  onclick="wiz.gotoStep(1,true);" type="button" style="margin-right:10px;"><span><i class='fa fa-arrow-left'></i> Previous</span></button>
</div>
