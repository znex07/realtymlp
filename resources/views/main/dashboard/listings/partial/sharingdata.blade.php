<div class="hidden property-documents">
    @if($property->files()->count())
    @foreach($property->documents as $file)
    <input type="hidden" class="documents" value="{{ $file }}">
    @endforeach
    @endif
</div>
<div class="property-images hidden">
    @if($property->files()->count())
    @foreach($property->images as $file)
    <input type="hidden" class="images" value="{{ $file }}">
    @endforeach
    @endif
</div>
<div class="property-data hidden">
    <input type="hidden" class="property-title" value="{{ $property->property_title }}" />
    <input type="hidden" class="property-price" value="{{ $property->published_price }}" />
    <input type="hidden" class="published-address" value="{{ $property->published_address }}" />
    <input type="hidden" class="published-attribute" value="{{ $property->published_attribute }}" />
    <input type="hidden" class="property-details" value="{{ json_encode($property->details) }}" />
    <input type="hidden" class="property-locations" value="{{ json_encode($property->locations) }}" />
    <input type="hidden" class="property-sharables" value="{{ $property->sharables }}" />
</div>
