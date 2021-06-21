<div class="col-xs-12 col-md-10 col-md-offset-1">
    <h6 class="h6Header">Publish Options</h6>
    <div class='form-group'>
        <label for="ownership_type">Listing Ownership</label>
        <select name="ownership_type" autocomplete="off" id="ownership_type" class="form-control">
            <option value="0" default selected hidden> I am direct to the owner</option>
            @foreach($ownerships as $ownership)
            <option  {{ $ownership->category_id == $property->ownership_type ? 'selected': ''}} value="{{ $ownership->category_id }}">{{ $ownership->description }}</option>
            @endforeach
        </select>
    </div> 
    <div class="row">
        <div class="form-group">
            <div class="col-md-5">
                <p>Is this viewable in public ?</p>
                <label class="radio-inline radio" for="ps_public">
                  <input type="radio" name="property_status" value="1" id="ps_public" data-toggle="radio" class="custom-radio">
                  Public
                </label>
                <label class="radio-inline radio" for="ps_private">
                  <input type="radio" name="property_status" value="2" id="ps_private" data-toggle="radio" checked class="custom-radio">
                  Private
                </label>
            </div>
        </div>
    </div>

        
    

    <div class="row">
        <div class="col-md-12">            
            <span data-toggle="slide" class="hidden btn btn-primary btn-embossed btn-sm" data-toggle="slide" id="toggle-slide" data-target=".sharing-viewability-wrapper" style="color:#fff;transition: all 0.5s;cursor: pointer;margin-top:10px;margin-bottom:15px"><i class="fa fa-cog" aria-hidden="true"></i> Show Options</span>
            @include('main.dashboard.profile.checkbox')
            <span id="for_private">This Listing will not be shown in Public</span>
        </div>
    </div>
    <h6 class="h6Header">Personal Notes</h6>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label for="personal_notes" class="form-label">Personal Notes</label>
          <label class="text-muted"> (This notes will not be shown on public.)</label>
          <textarea autocomplete="off" id="personal_notes" class="form-control" style="height: 100px; resize: vertical;" name="personal_notes" placeholder="Personal Notes">{{ $property->personal_notes }}</textarea>
          <span class="counter hidden-xs" id="counterP">2000 Characters left</span>
        </div>
      </div>
    </div>
    <h6 class="h6Header">Sample Preview of Listing</h6>
    <div class="col-md-12 no-pad">
        <div class="col-md-9 col-xs-9 no-pad" id="choose-notif">
            Choose the Image that will represent your listing. <small>(click arrows to select)</small>
        </div>
        <div class="col-md-3 col-xs-3 no-pad hidden-xs">
            <div class="btn-group pull-right">
                <a class="list_public btn-sm btn btn-primary" href="#"><span class="fui-list-numbered"></span></a>
                <a class="grid_public btn-sm btn btn-primary active" href="#"><span class="fui-list-small-thumbnails"></span></a>
            </div>
        </div>
    </div>
    <div class="col-md-12" style="padding: 10px 0 !important;">
        {{-- start listview --}}
        {{-- <div class="row">
          @include('main.dashboard.listings.partial.gridview')
        </div>
        <div class="row">
          @include('main.dashboard.listings.partial.listview')
        </div> --}}

        {{-- end gridview --}}

    </div>
    <input type="hidden" name="sharables" id="sharables">
    <button class="btn btn-primary btn-lg pull-right" type="button" id="btnSubmit" disabled="" onclick="dz.submit(this);"><span>Finish <i class='fa fa-check'></i></span></button>
    <button class="btn btn-primary prevBtn btn-lg pull-right" onclick="wiz.gotoStep(4);" type="button" style="margin-right:10px;"><span><i class='fa fa-chevron-circle-left'></i> Previous</span></button>
</div>
