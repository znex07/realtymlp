<div class="panel panel-default">
    <div class="panel-body">
      <form action="" method="post" style="margin:0px">
      <input type="hidden" value="" name="_token">
      <div id="sort-listings" data-tab="sort-listings" class="panel-advanced-search panel-collapse collapse">
        <div class="row">
          <div class="col-md-4">
            <div class="form-group-sm form-group">
              <select name="listing_type" data-filter-name="listing_type" class="advanced-filter form-control input-sm">
                <option value="">Listing Type</option>
               
                <option value=""></option>
               
              </select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group-sm form-group">
              <select name="property_classifications" data-filter-name="property_classifications" class="advanced-filter form-control input-sm">
                <option value="">Property Classification</option>
                
                <option value=""></option>
                
              </select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group-sm form-group">
              <select name="property_types" data-filter-name="property_types" disabled class="advanced-filter form-control input-sm">
                <option value="">Property Type</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row">        
          <div class="col-md-4">
            <div class="form-group-sm form-group">
              <input name="price" type="text" class="dont advanced-filter form-control input-sm" data-filter-name="price" placeholder="Maximum Price">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group-sm form-group">
              <select name="province" data-filter-name="province" class="advanced-filter form-control input-sm">
                <option value="">Province</option>
                 
                <option value=""></option>
                
              </select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group-sm form-group">
              <select name="city" data-filter-name="city" disabled class="advanced-filter form-control input-sm">
                <option value="">City / Municipality</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">              
            <div class="form-group-sm form-group">
              <input name="floor_area" type="text" class="dont advanced-filter form-control input-sm" data-filter-name="floor_area" placeholder="Maximum Floor Area">
            </div>              
          </div>
          <div class="col-md-4">              
            <div class="form-group-sm form-group">
              <input name="lot_area" type="text" class="dont advanced-filter form-control input-sm" data-filter-name="lot_area" placeholder="Maximum Lot Area">
            </div>
          </div>
          <div class="col-md-4">            
            <div class="form-group-sm form-group">
              <select name="bedrooms" data-filter-name="bedrooms" class="greater dont advanced-filter form-control input-sm">
                <option value="">Rooms</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="3+">3+</option>
              </select>
            </div>
          </div>
        </div>
        {{-- see more --}}
        <div class="see-more-orig text-center">
          <!-- <div class="btn-group hidden-xs see-more-link" style="padding: 5px;">
            <button class="btn-xs btn btn-primary btn-apply-filter"><span class="fa fa-search"></span> Apply Filter</button>
            <a class="btn-xs btn btn-primary btn-see-more" data-toggle="collapse" href="#see-more"><span class="fa fa-eye"></span> See More</a>
          </div> -->
          <p class="see-more-link">
            <a href="#see-more" class="btn btn-link btn-see-more" data-toggle="collapse"><span class="fa fa-eye"></span> See More</a>
          </p>

        </div>
        {{-- end see more --}}
        <div id="see-more" data-tab="see-more" class="panel-advanced-search panel-collapse collapse">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group-sm form-group">
                <select name="condition_type" data-filter-name="condition_type" class="advanced-filter form-control input-sm">
                  <option value="">Condition Type</option>
                 
                  <option value=""></option>
                  
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group-sm form-group">
                <select name="availability_type" data-filter-name="availability_type" class="advanced-filter form-control input-sm">
                  <option value="">Availability Type</option>
                  
                  <option value=""></option>
                  
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group-sm form-group">
                <select name="ownership_type" data-filter-name="ownership_type" class="advanced-filter form-control input-sm">
                  <option value="">Listing Ownership</option>
                  
                  <option value=""></option>
                  
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group-sm form-group">
                  <select name="parking" data-filter-name="parking" class="greater dont advanced-filter form-control input-sm">
                    <option value="">Parking</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="3+">3+</option>
                  </select>
                </div>
            </div>
            <div class="col-md-4">            
              <div class="form-group-sm form-group">
                <select name="bathrooms" data-filter-name="bathrooms" id="t1-city" class="greater dont advanced-filter form-control input-sm">
                  <option value="">Bathrooms</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="3+">3+</option>
                </select>
                
              </div>
            </div>
            <div class='col-md-4'>
              <div class="form-group-sm text-center form-group see-more-container">

              </div>
            </div>
            
          </div>
          
        </div> 
      </div> 
      </form>
      <div class="pull-right">
        
        
        <a class="btn-clear-filter btn btn-xs btn-primary collapsed" style="display: none;">
          <span class="fa fa-Search"></span> Clear Filter
        </a>
        <a class="btn-filter btn btn-xs btn-primary collapsed" data-toggle="collapse" href="#sort-listings">
          <span class="fa fa-filter"></span> Filter
        </a>
      </div>
    </div>
  </div>