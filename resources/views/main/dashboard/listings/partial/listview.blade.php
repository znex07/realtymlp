<div class="list_view thumbnail-container mix hidden-xs">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body thumb-img row-eq-height">

                <div class="col-sm-2 col-xs-3 thumb-img the3">
                    @include('main.dashboard.listings.partial.thumbnail')
                </div>

                <div class="col-sm-10 col-xs-9 the9">
                    <div class="thumb-content">
                        <h6 class="property-label ellipsis listing-price-stat">
                            <div class="dept-name">
                                <a class="link" href='/blowup/{{ $property->id.'?view_from='.$view_from}}{{ (isset($intab) && $intab == 'group') || (isset($property->pivot->group_id)) ? '&group_id='.$property->pivot->group_id : ''}}' target="_blank" data-command="view_published">
                                    {{ $property->trans_listing_type->title }}   {{ $property->cat_availability_type->description }}
                                    {{--{{ $property->dept_type->department_name }}   {{ $property->trans_listing_type->title }}--}}
                                    <strong style="color:#777;font-weight:bold; font-size:15px">
                                    at
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
                                        &#8369; {{$property->rental_price}} per year
                                        @endif
                                        @endif
                                        @endif
                                        @if ($property->id)
                                        @if($property->rental_price)
                                        @if($property->rental_stat === 'rent_per_day')
                                        &#8369; {{$property->rental_price}} per day
                                        @endif
                                        @endif
                                        @endif
                                        @if ($property->id)
                                        @if($property->rental_price)
                                        @if($property->rental_stat === 'per_month')
                                        &#8369; {{$property->rental_price}} per month
                                        @endif
                                        @endif
                                        @endif
                                        @if ($property->id)
                                        @if($property->rental_price)
                                        @if($property->rental_stat === 'rent_per_quarter')
                                        &#8369; {{$property->rental_price}} per quarter
                                        @endif
                                        @endif
                                        @endif
                                        @if ($property->id)
                                        @if($property->rental_price)
                                        @if($property->rental_stat === 'rent_per_week')
                                        &#8369; {{$property->rental_price}} per quarter
                                        @endif
                                        @endif
                                        @endif
                                    </strong>
                                </a>
                            </div>


                        </h6>

                        <p class="text-muted">
                            in
                            @if ($property->id)
                            {{ $property->loc_city->name }},
                            @endif
                            @if ($property->id)
                            {{ $property->loc_province->name }}
                            @endif
                        </p>
                        {{--SELLING--}}
                        

                        {{--@if ($property->id)--}}
                        {{--@if($property->rental_price > 0 || $property->selling_price > 0)--}}
                        {{--<p class="price-stat">--}}
                        {{--{{ $property->published_price->get('secondary') }}--}}
                        {{--</p>--}}
                        {{--@endif--}}
                        {{--@endif--}}
                        @if(isset($viewmode) && $viewmode === 'listings')
                        <p class="pull-right">
                            <strong>
                                @if ($property->id)
                                {{ $property->cat_ownership_type->description }}
                                @endif
                            </strong>
                        </p>

                        @endif

                        {{--@if ($property->id)--}}
                        {{--@if($property->rental_price > 0 || $property->selling_price > 0)--}}
                        {{--<p class="price-stat">--}}
                        {{--{{ $property->published_price->get('secondary') }}--}}
                        {{--</p>--}}
                        {{--@endif--}}
                        {{--@endif--}}

                    </div>

                    <div class="thumb-details grid-details">
                        <p class="text-muted ellipsis">
{{-- 
                            @if ($property->id)
                                @if ($property->lot_area)
                                    <span class="property-attr" data-toggle="tooltip" data-placement="bottom" title="Lot Area"><i class="fa fa-arrows-alt" aria-hidden="true"></i> {{ pluralize($property->lot_area, 'sqm') }}</span>
                                @endif
                            @endif


                            @if ($property->id)
                                @if ($property->floor_area)
                                    <span class="property-attr" data-toggle="tooltip" data-placement="bottom" title="Floor Area"><i class="fa fa-th-large" aria-hidden="true"></i> {{ pluralize($property->floor_area, 'sqm') }}</span>
                                @endif
                            @endif

                            @if ($property->id)
                                @if ($property->bedrooms)
                                    <span class="property-attr" data-toggle="tooltip" data-placement="bottom" title="Rooms"><i class="fa fa-bed" aria-hidden="true"></i> {{ $property->bedrooms}}</span>
                                @endif
                            @endif

                            @if ($property->id)
                                @if ($property->bathrooms)
                                    <span class="property-attr" data-toggle="tooltip" data-placement="bottom" title="Bathrooms"><i class="fa fa-bath" aria-hidden="true"></i> {{ $property->bathrooms }}</span>
                                @endif
                            @endif

                            @if ($property->id)
                                @if ($property->parking)
                                    <span class="property-attr"  data-toggle="tooltip" data-placement="bottom" title="Parking"><i class="fa fa-car" aria-hidden="true"></i> {{ $property->parking}}</span>
                                @endif
                            @endif
                            @if ($property->id)
                                @if ($property->balcony)
                                    <span class="property-attr"  data-toggle="tooltip" data-placement="bottom" title="Balcony"><i class="fa fa-university" aria-hidden="true"></i> {{ $property->balcony}}</span>
                                @endif
                                @endif --}}

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
                           <div class="row">
                            <p class="grid-details">
                                <span class="col-md-4" style="font-size:12px">
                                    ID: <strong>{{ $property->property_code }}</strong>
                                </span>
                                <span class="col-md-3" style="font-size:12px">    
                                Created: <strong>{{ $property->created_at->format('d/m/Y') }} </strong>
                                </span>
                                <span class="col-md-3" style="font-size:12px">
                                @if ($property->updated_at->gt($property->created_at))
                                Updated: <strong>{{ $property->updated_at->format('d/m/Y') }} </strong>
                                
                                @endif
                            </span>
                            </p>
                            </div>
                            
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
