@if($accurate_listing->visibility == 1)
<a id="thumbnail-listing" class='listing-thumbnail-anchor' href='/blowup/{{ $accurate_listing->id.'?view_from='.$view_from}}'>
    @if($accurate_listing->id && $accurate_listing->images()->count())
      @if ( !is_null ($accurate_property->thumbnail()) )
        <div class="ratio img-responsive listing-thumbnail" style="background-image: url(/uploads/{{ $accurate_listing->thumbnail()->file_path }});"></div>
      @else
        <div class="ratio img-responsive listing-thumbnail" style="background-image: url(/uploads/{{ $accurate_listing->images()->first()->file_path }});"></div>
      @endif
    @else
      <div class="ratio img-responsive listing-thumbnail" style="background-image: url(/img/img_placeholder.png);"></div>
    @endif
</a>
@else
<a id="thumbnail-listing" class='listing-thumbnail-anchor'>
    @if($accurate_listing->id && $accurate_listing->images()->count())
      @if ( !is_null ($accurate_listing->thumbnail()) )
        <div class="ratio img-responsive listing-thumbnail" style="background-image: url(/uploads/{{ $accurate_listing->thumbnail()->file_path }});"></div>
      @else
        <div class="ratio img-responsive listing-thumbnail" style="background-image: url(/uploads/{{ $accurate_listing->images()->first()->file_path }});"></div>
      @endif
    @else
      <div class="ratio img-responsive listing-thumbnail" style="background-image: url(/img/img_placeholder.png);"></div>
    @endif
</a>
@endif