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
</style>
<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-body">
        <div id="panel-element-372244" class="panel-collapse collapse" style="margin-top:5px;">

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

          <div class="col-md-5">
            <label class="col-md-4" style="padding:0 20 0;font-size:14px">Selling Price</label>
            <div class="col-md-8"</div>
              <div id="slider3">
                <span class="ui-slider-value first"></span>
                <span class="ui-slider-value last"></span>
              </div>
            </div>
            <label class="col-md-4" style="padding:0 20 0;font-size:14px">Rental Price</label>
            <div class="col-md-8">
              <div id="slider4">
                <span class="ui-slider-value first"></span>
                <span class="ui-slider-value last"></span>
              </div>
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
        </div>

        <div class="pull-right">
          
          <a class="btn btn-sm btn-primary collapsed" data-toggle="collapse" data-parent="#panel-75497" href="#panel-element-372244">
            <span class="fa fa-search"></span> Search
          </a>
        </div>
      </div>
    </div>  
</div>
