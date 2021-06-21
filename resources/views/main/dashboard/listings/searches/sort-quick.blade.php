<div class="col-md-12">
  <div class="panel panel-default">
    <div class="panel-body">
      <div id="sort-quick" data-tab="sort-quick" class="panel-search panel-collapse collapse">
        <div class="row">
          <div class="col-md-4">
            <div class="row">
              <div class="col-md-12 col-xs-6">
                <div class="form-group-sm form-group">
                  <select data-field="listing_type" name="t1-listing-type" id="t1-listing-type" class="form-control input-sm">
                    <option value="" hidden>Listing Type</option>
                    @foreach($_listing_type as $type) 
                    <option value="{{ $type->id }}">{{ $type->title }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-12 col-xs-6">
                <div class="form-group-sm form-group">
                  <select data-field="condition_type" name="t1-condition-type" id="t1-condition-type" class="form-control input-sm">
                    <option value="" hidden>Condition Type</option>
                    @foreach($_conditions as $condition) 
                    <option value="{{ $condition->category_id }}">{{ $condition->description }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-12 col-xs-6">
                <div class="form-group-sm form-group">
                  <select data-field="availability_type" name="t1-availability-type" id="t1-availability-type" class="form-control input-sm">
                    <option value="" hidden>Availability Type</option>
                    @foreach($_availabilities as $availability) 
                    <option value="{{ $availability->id }}">{{ $availability->description }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-12 col-xs-6">
                <div class="form-group-sm form-group">
                  <select data-field="ownership_type" name="t1-ownership-type" id="t1-ownership-type" class="form-control input-sm">
                    <option value="" hidden>Listing Ownership</option>
                    @foreach($_ownerships as $ownership) 
                    <option value="{{ $ownership->id }}">{{ $ownership->description }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="row">
              <div class="col-md-12 col-xs-6">
                <div class="form-group-sm form-group">
                  <select data-field="property_classifications" name="t1-property-classification" id="t1-property-classification" class="form-control input-sm">
                    <option value="" hidden>Property Classification</option>
                    @foreach($_classifications as $classification) 
                    <option value="{{ $classification->id }}">{{ $classification->department_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-12 col-xs-6">
                <div class="form-group-sm form-group">
                  <select data-field="property_types" disabled name="t1-property-type" id="t1-property-type" class="form-control input-sm">
                    <option value="" hidden>Property Type</option>
                    @foreach($_listing_type as $type) 
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-12 col-xs-6">
                <div class="form-group-sm form-group">
                  <select data-field="province" name="t1-province" id="t1-province" class="form-control input-sm">
                    <option value="" hidden>Province</option>
                    @foreach($_province as $p) 
                    <option value="{{ $p->id }}">{{ $p->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-12 col-xs-6">
                <div class="form-group-sm form-group">
                  <select data-field="city" disabled name="t1-city" id="t1-city" class="form-control input-sm">
                    <option value="">City / Municipality</option>
                  </select>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="row">
              <div class="col-md-12 col-xs-6">
                <div class="form-group-sm form-group">
                  <input data-field="bedrooms" type="number" min="{{ $_rooms['min'] }}" max="{{ $_rooms['max'] }}" maxlength="2" id="t1-rooms" name="t1-rooms" placeholder="Rooms" class="form-control">
                </div>
              </div>
              <div class="col-md-12 col-xs-6">
                <div class="form-group-sm form-group">
                  <input data-field="bathrooms" type="number" min="{{ $_bathrooms['min'] }}" max="{{ $_bathrooms['max'] }}" maxlength="2" id="t1-bathrooms" name="t1-bathrooms" placeholder="Bathrooms" class="form-control">
                </div>
              </div>
              <div class="col-md-12 col-xs-6">
                <div class="form-group-sm form-group">
                  <input data-field="parking" type="number" min="{{ $_parking['min'] }}" max="{{ $_parking['max'] }}" maxlength="2" id="t1-parking" name="t1-parking" placeholder="Parking" class="form-control">
                </div>
              </div>
              <div class="col-md-12 col-xs-6">
                <div class="form-group-sm form-group">
                  <input data-field="balcony" type="number" min="{{ $_balcony['min'] }}" max="{{ $_balcony['max'] }}" maxlength="2" id="t1-balcony" name="t1-balcony" placeholder="Balcony" class="form-control">
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-12">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group-sm form-group">
                  <input type="text" id="spb-price" class="ionSlider" name="spc-slider" data-min="1" data-max="100000" value="" />
                  <label for="">Price</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group-sm form-group">
                  <input data-field="lot_area" type="text" id="spb-floor-area" class="ionSlider" name="spc-slider" data-min="{{ $_lot_area['min'] }}" data-max="{{ $_lot_area['max'] }}" value="" />
                  <label for="">Lot Area</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group-sm form-group">
                  <input data-field="floor_area" type="text" id="spb-floor-area" class="ionSlider" name="spc-slider"  data-min="{{ $_floor_area['min'] }}" data-max="{{ $_floor_area['max'] }}" value="" />
                  <label for="">Floor Area</label>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="pull-right">
        <!-- <select name="spb-view" id="spb-view" class="input-sm" style="height: 26px; padding: 1px;">
          <option value="0">All</option>
          <option value="1">Public</option>
          <option value="2">Private</option>
        </select> -->
        <label style="font-size: 12px;" class="hidden-xs">View Mode: </label>
        <div class="btn-group">
          <a class="list_public btn-xs btn btn-primary active" href="#fakelink"><span class="fui-list-numbered"></span></a>
          <a class="grid_public btn-xs btn btn-primary " href="#fakelink"><span class="fui-list-small-thumbnails"></span></a>
        </div>
        <a class="btn-search btn btn-xs btn-primary collapsed" style="display: none;">
          <span class="fa fa-Search"></span> Search
        </a>
        <a class="btn-filter btn btn-xs btn-primary collapsed" data-toggle="collapse" href="#sort-quick">
          <span class="fa fa-filter"></span> Filter
        </a>
      </div>
    </div>
  </div>
</div>