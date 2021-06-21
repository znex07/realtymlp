<div class="col-xs-12 col-md-10 col-md-offset-1">
    <h6 class="h6Header">Details</h6>
    <div id="f_lot_area" style="display: none;">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group step-3" >
                    <label for="lot_area">Lot Area</label>
                    <div class="input-group " style="width: auto;">
                        <input  type="text" min="0" autocomplete='off' onpaste='return false' id="lot_area" class="form-control enter prices"  value="{{$property->lot_area}}"  name="lot_area" placeholder="Lot Area">
                        <span class="input-group-addon">
                            <span style="color:black;">square meters</span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="f_floor_area" style="display: none;">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group step-3">
                    <label for="floor_area">Floor Area</label>
                    <div class="input-group" style="width: auto;">
                        <input data-placement="top" data-trigger="hover focus" title="this is a required field"  type="text" min="0" autocomplete='off' onpaste='return false' id="floor_area" class="form-control enter prices" value="{{$property->floor_area}}" name="floor_area" placeholder="Floor Area">
                        <span class="input-group-addon">
                            <span style="color:black;">square meters</span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group step-3" data-placement="top" data-trigger="hover focus" title="this is a required field" id="f_rental_price" style="display: none;">
        <div class="row">
            <div class="col-lg-12">
                <label for="rental_price">Rental Price (in PHP)</label>
                <div class="input-group" style="width: auto;">
                    <input type="text" autocomplete='false' class="form-control enter prices" aria-label="..." id="rental_price" name="rental_price" placeholder="Rental Price" required value="{{$property->rental_price}}">
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
    <div class="form-group" data-placement="top" data-trigger="hover focus" title="this is a required field" id="f_selling_price" style="                                                                                                                                                                                                                                            display: none;">
        <div class="row">
            <div class="col-lg-12">
                <label for="selling_price">Selling Price (in PHP)</label>
                <div class="input-group" style="width: auto;">
                    <input  type="text" autocomplete='false' class="form-control enter prices" aria-label="..." id="selling_price" name="selling_price" placeholder="Selling Price" required value="{{$property->selling_price}}">
                    <span class="input-group-addon addon-select">
                        <select name="selling_stat" class='stat'>
                            <option value="gross">Selling Price</option>
                        </select>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div id="f_bedroom" style="display: none;">
        <div class="form-group">
            <label for="bedroom">Number of Rooms</label>
            <input type="number" min="0" onpaste='return false' id="bedroom" name="bedrooms" class="form-control enter negative" value="{{$property->bedrooms}}" placeholder="Number of Rooms">
        </div>
    </div>
    <div id="f_bathroom" style="display: none;">
        <div class="form-group">
            <label for="bathroom">Number of Bathroom</label>
            <input type="number" min="0" onpaste='return false' id="bathroom" name="bathrooms" class="form-control enter negative" value="{{$property->bathrooms}}" placeholder="Number of Bathroom">
        </div>
    </div>
    <div id="f_maid_room" style="display: none;">
        <div class="form-group">
            <label for="maid_room">Number of Maid's Room </label>
            <input type="number" min="0" onpaste='return false' id="" name="maid_room" class="form-control enter negative" value="{{$property->maid_room}}" placeholder="Number of Maid's Room">
        </div>
    </div>
    <div class="form-group" id="f_parking">
        <label for="parking">Number of Exclusive Parking </label>
        <input type="number" min="0" onpaste='return false' id="parking" name="parking" class="form-control enter negative" value="{{$property->parking}}" placeholder="Number of Parking">
    </div>
    <div class="form-group" id="f_balcony" style="display:none;">
        <label for="balcony">Number of Balcony </label>
        <input type="number" min="0" onpaste='return false' id="balcony" name="balcony" class="form-control enter negative"  value="{{$property->balcony}}" placeholder="Number of Balcony">
    </div>
    
    {{-- <div class="form-group">
        <label for="property_price">Property Price (in PHP) *</label>
        <input type="text" class="form-control numeric enter" autocomplete='off' id="property_price" name="property_price" value="{{$property->property_price}}" required placeholder="Property Price">
    </div> --}}

    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" class="form-control" placeholder="Description" style="height: 150px; resize: vertical;">{{ $property->description }}</textarea>
        <span class="counter hidden-xs" id="counterD">2000 Characters left</span>
    </div>

    <button class="btn btn-primary nextBtn btn-lg pull-right"  onclick="wiz.gotoStep(4);" type="button" ><span>Next <i class='fa fa-arrow-right'></i></span></button>
    <button class="btn btn-primary prevBtn btn-lg pull-right"  onclick="wiz.gotoStep(2,true);" type="button" style="margin-right:10px;"><span><i class='fa fa-arrow-left'></i> Previous</span></button>
</div>
