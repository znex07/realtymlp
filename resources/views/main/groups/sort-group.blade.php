<div class="row">
  <div class="col-md-12">
    <form action="/dashboard" method="post" style="margin:0px">
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

    <div class="col-md-2">
      <a href="#" class="btn btn-primary btn-sm btn-embossed" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Share Listings</a>
    </div>    

    <div class="col-md-5">
      <input type="text" class="form-control input-sm" id="inputEmail" placeholder="Search">
    </div>

    <div class="col-md-5">
     
      
      <a data-filter-name="layout" data-filter-value=".list_view" class="basic-filters list_public btn-sm btn btn-default active" href="#"><span class="fui-list-numbered"></span></a>     
      <a class="btn-sm btn btn-default active" href="#"><i class="fa fa-chevron-up" aria-hidden="true"></i></a>

      <a class="btn-clear-filter btn btn-sm btn-primary collapsed" style="display: none;">
        <span class="fa fa-Search"></span> Clear Filter
      </a>
      <a class="btn-filter btn btn-sm btn-primary collapsed" data-toggle="collapse" href="#sort-listings">
        <span class="fa fa-filter"></span> Filter
      </a>      
    </div>    
  </div>
</div>
<hr>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>      
      </div>
      <div class="modal-body text-center">
        Would you like to post a regular listing, or would you want to make quick one for now?
        
      </div>
      <div class="modal-footer">
        <a class="btn btn-sm btn-primary" href="/dashboard/property/wizard">Regular Post</a>
        <a class="btn btn-sm btn-info" href="/dashboard/quick">Quick Post</a>
      </div>
    </div>
  </div>
</div>
