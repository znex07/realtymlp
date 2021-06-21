<style>
.form-group {
  margin: 0px 0px 15px;
}
.text-center {
  margin: 15px 0 10px;
}
label {
  margin-bottom: 0px;
}
.ui-slider-value {
    float: right;
    margin-top: 5px;
    font-size: 12px;
}
.well-sm {
    padding: 9px;

    border-radius: 3px;
}
.sort {
  margin-top: 10px;
}
.col-md-8 {
  margin-top: 10px
}
hr {
    margin-top: 15px;
    margin-bottom: 20px;
    border: 0;
    border-top: 1px solid #ddd;
}
.tabs-style-tzoid nav ul li a span {
    font-weight: 500;
    font-size: 16px;
}
.tabs-style-tzoid nav ul li a {
    padding: 5px 1.5em 5px 0.3em;
}
.tab-fa::before {
    font-size: 1em;
  }
.tabs-style-tzoid nav {
  margin-bottom: -2px;
}
.input-sm, .form-group-sm .form-control, .form-group-sm .select2-search input[type="text"], .select2-search input[type="text"] {
    font-weight: 500;
}
[hidden], template {
    color: #888;
}
</style>
<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-body">
            <div id="panel-element-372244" class="panel-zz panel-collapse collapse" style="margin-top:5px;">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <select class="form-control input-sm" id="sel1">
                                <option disabled selected hidden>Listing type</option>
                                <option>For Sale</option>
                                <option>For Rent</option>
                                <option>Joint Venture</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control input-sm" id="sel1">
                                <option disabled selected hidden>Condition type</option>
                                <option>Brand New / Newly Developed</option>
                                <option>Resale / Pre-Owned</option>
                                <option>Foreclosed</option>
                            </select>
                        </div>
                    </div>                
                    <div class="col-md-3">
                        <div class="form-group">
                            <select class="form-control input-sm" id="sel1">
                                <option disabled selected hidden>Property Classification</option>
                                <option>Residential</option>
                                <option>Commercial</option>
                                <option>Industrial</option>
                                <option>Agricultural</option>
                                <option>Instutional</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control input-sm" id="sel1">
                                <option disabled selected hidden>Property Type</option>
                                <option>Vacant Lot</option>
                                <option>Apartment/Condominuim</option>
                                <option>Dormitory/Boarding house/Pension house unit</option>
                                <option>House & Lot</option>
                                <option>Rowhouse Townhouse</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group" style="margin-bottom:50px;">
                            <label class="col-md-3" style="padding:0 0 0;font-size:14px">Bedroom</label>
                            <div class="col-md-9">
                                <input type="number"  class="input-sm form-control enter negative" placeholder="Number of Rooms">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3" style="padding:0 0 0;font-size:14px">Bathroom</label>
                            <div class="col-md-9">
                                <input type="number"  class="input-sm form-control enter negative" placeholder="Number of Bathrooms">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group" style="margin-bottom:50px;">
                            <label class="col-md-3" style="padding:0 0 0;font-size:14px">Parking</label>
                            <div class="col-md-9">
                                <input type="number"  class="input-sm form-control enter negative" placeholder="Number of Rooms">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3" style="padding:0 0 0;font-size:14px">Balcony</label>
                            <div class="col-md-9">
                                <input type="number"  class="input-sm form-control enter negative" placeholder="Number of Bathrooms">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <select class="form-control input-sm" id="sel1">
                                <option>Province</option>
                                <option>Metro Manila</option>
                                <option>Abra</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control input-sm" id="sel1">
                                <option>City</option>
                                <option>Makati</option>
                                <option>Manila</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4" style="margin-bottom:20px;">
                        <label class="col-md-3" style="padding:0 0 0; font-size:14px">Lot Area</label>
                        <div class="col-md-9 sort">
                            <div id="slider1" class="slider">
                                <span class="ui-slider-value first"></span>
                                <span class="ui-slider-value last"></span>
                            </div>
                        </div>
                      <label class="col-md-3" style="padding:0 0 0;font-size:14px">Floor Area</label>
                      <div class="col-md-9">
                          <div id="slider2" class="slider">
                              <span class="ui-slider-value first"></span>
                              <span class="ui-slider-value last"></span>
                          </div>
                      </div>
                    </div>
                    <div class="col-md-5">
                        
                        <label class="col-md-4" style="padding:0 20 0;font-size:14px">Rental Price</label>
                        <div class="col-md-8">
                            <div id="slider4">
                                <span class="ui-slider-value first"></span>
                                <span class="ui-slider-value last"></span>
                            </div>
                        </div>
                    </div>                
                </div>
            </div>
            <div class="pull-right">
                <div class="form-group col-md-4" style="margin: 0px 0px 0px;">
                    <select class="form-control input-sm" >
                        <option>Sample Group</option>
                        <option>SDC</option>                   
                    </select>
                </div>
                <div class="col-md-8" style="margin-top:0px">            
                <label class="">View Mode: </label>
                <div class="btn-group">
                    <a class="list_public btn-sm btn btn-primary" href="#fakelink"><span class="fui-list-numbered"></span></a>
                    <a class="grid_public btn-sm btn btn-primary" href="#fakelink"><span class="fui-list-small-thumbnails"></span></a>
                </div>
                <a class="btn btn-sm btn-primary collapsed" data-toggle="collapse" data-parent="#panel-75497" href=".panel-zz">
                    <span class="fa fa-search"></span> Search
                </a>
                </div>
            </div>
        </div>    
    </div>
</div>
