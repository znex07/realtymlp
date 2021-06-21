<div class="col-md-12">
  <div class="panel panel-default">
    <div class="panel-body">
      <div id="panel-public" class="panel-search panel-collapse collapse">
        <div class="row">
          <div class="col-md-3">
            <div class="form-group-sm form-group">
              <label for='spb-province'>Province</label>
              <select name="spb-province" id="spb-province" class="form-control input-sm">
                <option hidden>Province</option>
                <option>Metro Manila</option>  
                <option>Abra</option>
              </select>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group-sm form-group">
              <label for='spb-city'>City</label>
              <select name="spb-city" id="spb-city" class="form-control input-sm">
                <option hidden>City</option>
                <option>Caloocan</option>  
                <option>Makati</option>
              </select>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group form-group-sm">
              <label for="spb-classification">Classification</label>
              <select name="spb-classification" id="spb-classification" class="form-control input-sm">
                <option hidden>Classification</option>
                <option value="">1</option>
                <option value="">2</option>
                <option value="">3</option>
              </select>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group form-group-sm">
              <label for="spb-type">Type</label>
              <select name="spb-type" id="spb-type" class="form-control input-sm">
                <option hidden>Type</option>
                <option value="">1</option>
                <option value="">2</option>
                <option value="">3</option>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Price</label>
              <input type="text" id="spb-price" class="ionSlider" name="spc-slider" data-min="1" data-max="100000" value="" />
            </div>

            <div class="form-group">
              <button type="button" class="btn btn-primary btn-xs">Filter</button>  
            </div>
            
          </div>

        </div>
      </div>

      <div class="pull-right">
        <label>View Mode: </label>
        <div class="btn-group">
          <a class="list_public btn-sm btn btn-primary active" href="#fakelink"><span class="fui-list-numbered"></span></a>
          <a class="grid_public btn-sm btn btn-primary" href="#fakelink"><span class="fui-list-small-thumbnails"></span></a>
        </div>
        <a class="btn btn-sm btn-primary collapsed" data-toggle="collapse" href="#panel-public">
          <span class="fa fa-search"></span> Search
        </a>
      </div>
    </div>
  </div>
</div>