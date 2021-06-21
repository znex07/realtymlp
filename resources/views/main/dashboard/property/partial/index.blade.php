<input type='hidden' id="_token" name='_token' value='{{ csrf_token() }}' />
<input type='hidden' name='method_type' value='full' />
<input type='hidden' name="user_id" value="{{ Auth::user()->id }}" />
<input type='hidden' name="property_code" value="PR-{{date('mdY').time()}}"/>
<div class="row setup-content" id="step-1">
    <div class="col-xs-12 col-md-10">
        <h6 class="h6Header">start</h6>
        <div class="form-group">
            <label>Choose Listing Type</label><br>
            @foreach($transaction as $t)
            <span style="margin:0 5px;">
                <label for="t{{$t->id}}">{{$t->title}}</label>
                <input type="checkbox" name="listing_types[]" id="t{{$t->id}}" value="{{$t->id}}" data-name="{{$t->title}}" class="listing_type">
            </span>
            @endforeach
        </div>
        <div class="form-group">
            <label for="property_title">Title *</label>
            <textarea required  autocomplete="off" title="This is a required field" data-placement="top" id="property_title" class="form-control" style="height: 100px; resize: vertical;" name="property_title" placeholder="Property Title"></textarea>
            <span class="counter hidden-xs" id="counter">100 Characters left</span>
        </div>
        <div class="form-group">
            <label for="property_classification">Property Classification</label>
            <select name="property_classification" id="property_classification" class="form-control">
                <option value="-1">Choose Property Classification</option>
                @foreach($department as $d)
                <option value="{{$d->id}}">{{$d->department_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="property_type" style="display:none;">Property Type</label>
            <div class="loader" id="l_property_type"></div>
            <div id="f_property_type"></div>

        </div>
        <button class="btn btn-primary nextBtn btn-lg pull-right "  onclick="wiz.gotoStep(2);mapa.trigger_map();"  type="button" ><span>Next <i class='fa fa-arrow-right'></i></span></button>
    </div>
</div>
<div class="row setup-content" id="step-2" style="display:none;">
    <div class="col-xs-12 col-md-10 col-md-offset-1">
        <h6 class="h6Header">location</h6>
        <div class="form-group">
            <label for="province">Province *</label>
            <select name="province" id="province" class="form-control" required onchange="mapa.geocode();">
                <option value="default">Choose Province</option>
                @foreach($locProvince as $l)
                <option value="{{$l->id}}">{{$l->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="city" style="display:none;">City / Municipality *</label>
            <div class="loader" id="l_city"></div>
            <div id="f_city"></div>
        </div>
        <div class="form-group">
            <label for="brgy">Barangay</label>
            <input type="text" autocomplete='off' name="brgy" id="brgy" placeholder="Barangay" class="form-control">
        </div>
        <div class="form-group">
            <label for="street_address">Define Your Location: Street Address</label>
            <input type="text" autocomplete='off' onchange="mapa.geocode();" class="form-control" name="street_address" id="street_address" placeholder="Street Address">
        </div>
        <div class="form-group">
            <label for="village">Define Your Location: Village / Subdivision / District</label>
            <input type="text" autocomplete='off' class="form-control" name="village" id="village" placeholder="Village / Subdivision / District">
        </div>
        <div class="form-group">
            <div id="map" style="height:300px;background:#e6e6e6;"></div>

            <div class="map-control">
                <div><input type="checkbox" id="pin" onchange="mapa.map_button(this);" class="map-btn"><label for="pin"> Drop a Pin</label></div>
                <div><input type="checkbox" id="area" onchange="mapa.map_button(this);" class="map-btn"><label for="area"> Drop an Area</label></div>
                <div id="map-btn-remove" style="display: none;"><i onclick="mapa.map_button(this)" id="rmv-mrk" class="fa fa-times"></i></div>
            </div>
            <input type="hidden" id="complete_address" value="">
            <input type="hidden" value="" name="google_lang">
            <input type="hidden" value="" name="google_lat">
            <input type="hidden" name="marker_type">
        </div>
        <button class="btn btn-primary nextBtn btn-lg pull-right"  onclick="wiz.gotoStep(3);" type="button" ><span>Next <i class='fa fa-arrow-right'></i></span></button>
        <button class="btn btn-primary prevBtn btn-lg pull-right "  onclick="wiz.gotoStep(1,true);" type="button" style="margin-right:10px;"><span><i class='fa fa-arrow-left'></i> Previous</span></button>
    </div>
</div>
<div class="row setup-content" id="step-3" style="display:none;">
    <div class="col-xs-12 col-md-10 col-md-offset-1">
        <h6 class="h6Header">Details</h6>
        <div id="f_lot_area" style="display: none;">
            <div class="form-group">
                <label for="lot_area">Lot Area</label>
                <input type="text" autocomplete='off' id="lot_area" class="form-control negative" value=""  name="lot_area" placeholder="Lot Area">
            </div>
        </div>
        <div id="f_floor_area" style="display: none;">
            <div class="form-group">
                <label for="floor_area">Floor Area</label>
                <input type="text" autocomplete='off' id="floor_area" class="form-control negative" value="" name="floor_area" placeholder="Floor Area">
            </div>
        </div>
        <div id="f_bedroom" style="display: none;">
            <div class="form-group">
                <label for="bedroom">Number of Rooms</label>
                <input type="number" min="0" onpaste='return false' id="bedroom" name="bedroom" class="form-control" placeholder="Number of Rooms">
            </div>
        </div>
        <div id="f_bathroom" style="display: none;">
            <div class="form-group">
                <label for="bathroom">Number of Bathroom</label>
                <input type="number" min="0" onpaste='return false' id="bathroom" name="bathroom" class="form-control" placeholder="Number of Bathroom">
            </div>
        </div>
        <div class="form-group" id="f_parking">
            <label for="parking">Number of Exclusive Parking</label>
            <input type="number" min="0" onpaste='return false' id="parking" name="parking" class="form-control" placeholder="Number of Parking">
        </div>
        <div class="form-group" id="f_balcony" style="display:none;">
            <label for="balcony">Number of Balcony</label>
            <select name="balcony" id="balcony" class="form-control">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="3+">3+</option>
            </select>
        </div>
        <div class="form-group">
            <label for="property_price">Property Price (in PHP) *</label>
            <input type="text" class="form-control numeric" autocomplete='off' id="property_price" name="property_price" required placeholder="Property Price">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" placeholder="Description" style="height: 150px; resize: vertical;"></textarea>
            <span class="counter hidden-xs" id="counterD">1000 Characters left</span>
        </div>

        <button class="btn btn-primary nextBtn btn-lg pull-right"  onclick="wiz.gotoStep(4);" type="button" ><span>Next <i class='fa fa-arrow-right'></i></span></button>
        <button class="btn btn-primary prevBtn btn-lg pull-right"  onclick="wiz.gotoStep(2,true);mapa.trigger_map()" type="button" style="margin-right:10px;"><span><i class='fa fa-arrow-left'></i> Previous</span></button>
    </div>
</div>
<div class="row setup-content" id="step-4" style="display:none;">
    <div class="col-xs-12 col-md-10 col-md-offset-1">
        <div class="form-group hidden" style="font-size: 14px;"><span style="color:red;" id="totalMB">0MB</span> of 2.00MB</div>
        <h6 class="h6Header">image attachments</h6>
        <div class="form-group dropzone" id="dropzone-image">
            <div class="dropzone-previews-img"></div>
        </div>

        <h6 class="h6Header">document attachments</h6>
        <div class="form-group dropzone" id="dropzone-docs">
            <div class="dropzone-previews-doc"></div>
        </div>
        <button class="btn btn-primary nextBtn btn-lg pull-right" type="button"  onclick="wiz.gotoStep(5,true);wiz.step_5();" id="fourthStep" ><span>Next <i class='fa fa-arrow-right'></i></span></button>
        <button class="btn btn-primary prevBtn btn-lg pull-right" type="button"  onclick="wiz.gotoStep(3,true);" style="margin-right:10px;"><span><i class='fa fa-arrow-left'></i> Previous</span></button>
    </div>
</div>
<div class="row setup-content" id="step-5" style="display:none;">
    <div class="col-xs-12 col-md-10 col-md-offset-1">
        <h6 class="h6Header">set property as..</h6>
        <div class="row">
            <div class="form-group col-md-12 row" style="background:white;">
                <div class="col-md-4">
                <p for="property_status">Is this viewable in public ?</p>
                <div style="display:inline; margin: 0 5px;"><input type="radio" name="property_status" id="ps_public" value="1"><label for="ps_public"> Public</label></div>
                    <div style="display:inline; margin: 0 5px;"><input type="radio" name="property_status" id="ps_private" value="2" checked><label for="ps_private"> Private</label></div>
                </div>
            </div>
        </div>
                {{-- <input type='hidden' id="property_status" name="property_status"> --}}
        <h6 class="h6Header">summary</h6>
        <div class="col-md-12 no-pad">
            <div class="col-md-4 no-pad">
                <img src="/img/img_placeholder.png" id="prev-img" style="height: 150px;" />
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
                <div class="progress"  style="margin-top:10px;display:none;height:20px;">
                    <div style="transition:width 1s;" class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>

        <button class="btn btn-primary btn-lg pull-right" type="submit" id="btnSubmit" ><span>Finish <i class='fa fa-check'></i></span></button>
        <button class="btn btn-primary prevBtn btn-lg pull-right" onclick="wiz.gotoStep(4);" type="button" style="margin-right:10px;"><span><i class='fa fa-chevron-circle-left'></i> Previous</span></button>
    </div>
</div>
