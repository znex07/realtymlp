<input type='hidden' name="property_id" value="{{ $property->id }}"/>
<input type="hidden" name="property_code" value="{{ $property->property_code }}">
<input type="hidden" id="_city" value="{{ $property->city }}">
<input type="hidden" id="brgy" value="{{$property->brgy}}">
<input type="hidden" id="street_address" value="{{$property->street_address}}">
<input type="hidden" id="_property_type" value="{{ $property->property_types }}">
<input type="hidden" id="_property_status" value="{{ $property->property_status }}">
<input type="hidden" id="_listing_type" value="{{ $property->listing_type }}">
<input type="hidden" id="_rental_stat" value="{{ $property->rental_stat }}">
<input type="hidden" id="_selling_stat" value="{{ $property->selling_stat }}">
<input type="hidden" id="_stat" value="{{ $property->PriceStat()->get('stat') }}">
<input type="hidden" name="_method" value="PATCH">
<input type="hidden" name="_thumbnail_index" value="">
