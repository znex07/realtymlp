<div class="grid_view thumbnail-container col-md-4 mix visible-xs">
  <div class="panel panel-default">
    <div class="panel-body thumb-img">
      <div class="ih-item square effect3 bottom_to_top">
        <div class="img property_thumbnail">
          @include('main.dashboard.listings.partial.thumbnail')
        </div>
      </div>
      <div class="thumb-content grid-details">
        <h6 class="">
          <a class="link thumb-dept-grid" href='/blowup/{{ $property->id.'?view_from='.$view_from}}{{ (isset($intab) && $intab == 'group') || (isset($property->pivot->group_id)) ? '&group_id='.$property->pivot->group_id : ''}}' target="_blank" data-command="view_published">
         {{ $property->trans_listing_type->title }}   {{ $property->cat_availability_type->description }}
            {{--{{ $property->dept_type->department_name }}   {{ $property->trans_listing_type->title }}--}}
          </a>
          <strong style="color:#777;font-weight:bold; font-size:15px">  
            @if ($property->id)
            @if ($property->selling_stat === 'gross')
            @if($property->selling_price)
            &#8369; {{$property->selling_price}}
            @endif
            @endif
            @endif
            {{--RENTAL--}}
            @if ($property->id)
            @if($property->rental_price)
            @if($property->rental_stat === 'rent_per_year')
            &#8369; {{$property->rental_price}} rent per year
            @endif
            @endif
            @endif
            @if ($property->id)
            @if($property->rental_price)
            @if($property->rental_stat === 'rent_per_day')
            &#8369; {{$property->rental_price}} rent per day
            @endif
            @endif
            @endif
            @if ($property->id)
            @if($property->rental_price)
            @if($property->rental_stat === 'per_month')
            &#8369; {{$property->rental_price}} rent per month
            @endif
            @endif
            @endif
            @if ($property->id)
            @if($property->rental_price)
            @if($property->rental_stat === 'rent_per_quarter')
            &#8369; {{$property->rental_price}} rent per quarter
            @endif
            @endif
            @endif
            @if ($property->id)
            @if($property->rental_price)
            @if($property->rental_stat === 'rent_per_week')
            &#8369; {{$property->rental_price}} rent per quarter
            @endif
            @endif
            @endif
          </strong>
        </h6>
      </div>
      <div class="thumb-dept grid-details">
        <p class="text-muted">
          in
          @if ($property->id)
          {{ $property->loc_city->name }},
          @endif
          @if ($property->id)
          {{ $property->loc_province->name }}
          @endif
        </p>
      </div>
      <div class="thumb-dept">
      <p style="font-size:15px !important;line-height:1.4;">
        
      </p>
      </div>
      <div class="thumb-dept thumb-dept-grid">
        <p class="text-muted">
          @if ($property->id)
          @if ($property->lot_area)
          <span class="property-attr">Lot Area: {{ pluralize($property->lot_area, 'sqm') }}</span>
          @endif 
          @endif

          @if ($property->id)
          @if ($property->floor_area)
          <span class="property-attr">Floor Area: {{ pluralize($property->floor_area, 'sqm') }}</span>
          @endif 
          @endif

          @if ($property->id)
          @if ($property->bedrooms)
          <span class="property-attr">{{ pluralize($property->bedrooms, 'Room', true) }}</span>
          @endif
          @endif
          
          @if ($property->id)
          @if ($property->bathrooms)
          <span class="property-attr">{{ pluralize($property->bathrooms, 'Bathroom', true) }}</span>
          @endif
          @endif

          @if ($property->id)
          @if ($property->parking)
          <span class="property-attr">{{ pluralize($property->parking, 'Parking', true) }}</span>
          @endif 
          @endif

          @if ($property->id)
          @if ($property->balcony)
          <span class="property-attr">{{ pluralize($property->balcony, 'balcony', true) }}</span>
          @endif 
          @endif    
        </p>        
      </div>
      <hr>
      <div class="panel-body">

        {{-- @if (isset($view_code) && $view_code !== VIEW_CODE_LISTING_WIZARD) --}}
        @include('main.dashboard.listings.partial.button')
        {{-- @endif --}}
      </div>      
    </div>
  </div>
</div>
