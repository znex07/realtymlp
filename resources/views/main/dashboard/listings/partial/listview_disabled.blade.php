<div class="list_view thumbnail-container mix">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-body thumb-img row-eq-height">

        <div class="col-sm-2 col-xs-3 thumb-img the3">
          @include('main.dashboard.listings.partial.thumbnail')
        </div>

        <div class="col-sm-10 col-xs-9 the9">
          <div class="thumb-content">
            <h6 class="property-label ellipsis listing-price-stat">  
              @if ($disabled_listing->id)
              {{ $property->published_price->get('primary') }}
              @endif
              <p class="price-stat">
                @if ($property->id)
                 {{ $property->published_price->get('secondary') }}
                @endif
              </p>
              @if(isset($viewmode) && $viewmode === 'listings')
              <p class="pull-right">
                <strong>
                  @if ($property->id)
                  {{ $property->cat_ownership_type->description }}
                  @endif
                </strong>
              </p>
              @endif
            </h6>

          </div>
          <div class="thumb-dept grid-details">
            <p class="text-muted property-location property-label ellipsis">
              <span class=""></span>

              @if ($property->id)
              {{ $property->dept_type->department_name }}
              @endif
              @if ($property->id)
              {{ $property->trans_listing_type->title }}
              @endif
              in
              @if ($property->id)
              {{ $property->loc_city->name }},
              @endif
              @if ($property->id)
              {{ $property->loc_province->name }}
              @endif

            </p>
          </div>
          <div class="thumb-details grid-details">
            <p class="text-muted ellipsis">

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
          <div class="thumb-footer">          
            
            {{-- @if ($view_code !== VIEW_CODE_LISTING_WIZARD)  --}}
            @include('main.dashboard.listings.partial.button')
            {{-- @endif --}}

          </div>
        </div>

      </div>
    </div>
  </div>
</div>
