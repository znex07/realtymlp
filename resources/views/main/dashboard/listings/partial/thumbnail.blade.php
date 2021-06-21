@if($property->visibility == 1)
<a id="" class='listing-thumbnail-anchor' href='/blowup/{{ $property->id.'?view_from='.$view_from}}{{ (isset($intab) && $intab == 'group') || (isset($property->pivot->group_id)) ? '&group_id='.$property->pivot->group_id : ''}}'>
    @if($property->id && $property->images()->count())
      @if ( !is_null ($property->thumbnail()) )
        <div class="ratio img-responsive listing-thumbnail" style="background-image: url(/uploads/{{ $property->thumbnail()->file_path }});"></div>
      @else
        <div class="ratio img-responsive listing-thumbnail" style="background-image: url(/uploads/{{ $property->images()->first()->file_path }});"></div>
      @endif
    @else
      <div class="ratio img-responsive listing-thumbnail" style="background-image: url(/img/img_placeholder.png);"></div>
    @endif
</a>
@else
<a id="thumbnail-listing" class='listing-thumbnail-anchor' >
    @if($property->id && $property->images()->count())
      @if ( !is_null ($property->thumbnail()) )
        <div class="ratio img-responsive listing-thumbnail" style="background-image: url(/uploads/{{ $property->thumbnail()->file_path }});"></div>
      @else
        <div class="ratio img-responsive listing-thumbnail" style="background-image: url(/uploads/{{ $property->images()->first()->file_path }});"></div>
      @endif
    @else
      <div class="ratio img-responsive listing-thumbnail" style="background-image: url(/img/img_placeholder.png);"></div>
    @endif
</a>
@endif

