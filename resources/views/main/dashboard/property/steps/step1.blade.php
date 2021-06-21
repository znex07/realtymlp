<div class="col-xs-12 col-md-10 col-md-offset-1">
    <h6 class="h6Header">start</h6>
    <div class="form-group" data-placement="top" data-trigger="hover focus" title="this is a required field">
        <label for="property_title">Title * (required)</label>
        <input class="form-control" type="text" id="property_title" name="property_title" placeholder="Property Title" value="{{ $property->property_title }}" />
        <span class="hidden-xs counter" id="counter">60 Characters left</span>
    </div>
    <div class='form-group' data-placement="top" data-trigger="hover focus" title="this is a required field">
      <label for="listing_type">Listing Type * (required)</label>
      <select onchange="wiz.handleCheckpoint(this)" required name="listing_type" autocomplete="off" id="listing_type" class="form-control">
        <option value="default" default selected hidden>What type of listing? </option>
        @foreach($transaction as $t)
          <option data-name="{{ $t->title }}" value="{{ $t->id }}" {{ $t->id == $property->listing_type ? 'selected' : '' }}>{{ $t->title }}</option>
        @endforeach
      </select>
    </div>
    <div class='form-group' data-placement="top" data-trigger="hover focus" id="c_availability_type" title="this is a required field" style='display:none;'>
        <label for="availability_type">Availability Type * (required)</label>
        <select onchange="wiz.handleCheckpoint(this)" required name="availability_type" autocomplete="off" id="availability_type" class="form-control">
            <option value="default" default selected hidden>How is it available?</option>
            @foreach($availabilities as $availability)
                <option class="{{ $availability->is_hidden ? 'hidden meron' : '' }}"  {{ $availability->category_id == $property->availability_type ? 'selected' : '' }} data-hidden-id="{{ $availability->hidden_id }}" value="{{ $availability->category_id }}">{{ $availability->description }}</option>
            @endforeach
        </select>
    </div>
    <div class='form-group' data-placement="top" data-trigger="hover focus" id="c_condition_type" title="this is a required field" style='display:none;'>
      <label for="condition_type">Condition Type * (required)</label>
      <select onchange="wiz.handleCheckpoint(this)" required name="condition_type" autocomplete="off" id="condition_type" class="form-control">
        <option value="default" default selected hidden>What is it's current condition?</option>
        @foreach($conditions as $condition)
          <option {{ $condition->category_id == $property->condition_type ? 'selected': ''}} value="{{ $condition->category_id }}">{{ $condition->description }}</option>
        @endforeach
      </select>
    </div>


    {{-- <div class="form-group" data-placement="top" data-trigger="hover focus" title="select atleast one">
        <label for="property_classifications">Property Classification *</label>
        <select required name="property_classifications" autocomplete="off" id="property_classification" class="form-control">
            <option></option>
            @foreach($department as $d)
                <option value="{{$d->id}}" {{ $property->property_classification == $d->id ? 'selected' : '' }}>{{$d->department_name}}</option>
            @endforeach
        </select>
    </div> --}}

    <div class='form-group' data-placement="top" data-trigger="hover focus" id="c_property_classification" title="this is a required field" style='display:none;'>
      <label for="property_classification">Property Classification * (required)</label>
      <select onchange="wiz.handleCheckpoint(this)" required name="property_classifications" autocomplete="off" id="property_classification" class="form-control">
        <option value="default" selected hidden>Choose Property Classification</option>
        @foreach($department as $d)
          <option {{ $d->id == $property->property_classifications ? 'selected' : '' }} value="{{$d->id}}">{{$d->department_name}}</option>
        @endforeach
      </select>
    </div>

    <div class='form-group' id="c_property_type" title="this is a required field" style='display:none' >
      <label for="property_type">Choose Property Type * (required)</label>
      <div class="loader" id="l_property_type"></div>
      <select onchange="wiz.handleCheckpoint(this)"  required autocomplete="off" id="property_type" class="form-control" data-placement="top" data-trigger="hover focus" title="this is a required field">
      </select>
      <input type="hidden" name="property_types" id="hidden_property_type" value="{{$property->property_types}}">
    </div>
    <button class="btn btn-primary nextBtn btn-lg pull-right "  onclick="wiz.gotoStep(2);mapa.trigger_map();{{ $type=='edit' ? 'edit.setCenter();' : '' }}"  type="button" ><span>Next <i class='fa fa-arrow-right'></i></span></button>
</div>
