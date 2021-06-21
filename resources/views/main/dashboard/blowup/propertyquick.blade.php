<div class="panel panel-default blowup-property-parent">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">                
                <div class="thumb-title col-md-12" >
                    <h6 class='blowup-title'  style="font-size:20px !important;">
                        @if ($blowup_mode === BLOWUP_INDEX)
                        {{ $property->property_title  }}
                        @endif
                    </h6>
                    <p>
                        @if ($blowup_mode === BLOWUP_INDEX)
                        {{ $property->cat_condition_type->description }},
                        @endif
                        @if ($blowup_mode === BLOWUP_INDEX)
                        {{ $property->cat_availability_type->description }},
                        @endif
                        @if ($blowup_mode === BLOWUP_INDEX)
                        {{ $property->dept_classification->department_name }}
                        @endif
                        @if ($blowup_mode === BLOWUP_INDEX)
                        {{ $property->dept_type->department_name }}
                        @endif
                    </p>
                    <p class="text-muted">
                        <span class="fa fa-map-marker"></span>
                        <em class='blowup-address'>
                            @if ($blowup_mode === BLOWUP_INDEX)
                            <span class='blowup-province'>{{ $property->loc_province->name }},</span>
                            <span class='blowup-city'> {{ $property->loc_city->name }}</span>

                            <span class='blowup-brgy'>,  {{ $property->brgy }}</span>
                            <span class='blowup-street_address'>, {{ $property->street_address }}</span>
                            <span class='blowup-village'>, {{ $property->village }}</span>
                            @endif
                        </em>
                    </p>
                </div>
                <div class="col-md-12">
                    <hr>
                </div>
                <div class="col-md-12">
                    <div class="price-list">
                        <h5 class="text-primary" style="display:inline-flex;margin-top:20px !important; font-size:24px">
                            {{--SELLING--}}
                            @if ($property->id)
                            @if ($property->selling_stat)
                            @if($property->selling_price)
                            &#8369; {{$property->selling_price}}
                            @endif
                            @endif
                            @endif
                            {{--RENTAL--}}
                            {{--@if ($property->id)--}}
                            {{--@if($property->rental_stat)--}}
                            {{--@if($property->rental_price)--}}
                            {{--&#8369;{{$property->rental_price}}--}}
                            {{--@endif--}}
                            {{--@endif--}}
                            {{--@endif--}}
                            @if ($property->id)
                            @if($property->rental_price)
                            @if($property->rental_stat === 'rent_per_year')
                            &#8369; {{$property->rental_price}} <div> per year</div>
                            @endif
                            @endif
                            @endif
                            @if ($property->id)
                            @if($property->rental_price)
                            @if($property->rental_stat === 'rent_per_day')
                            &#8369; {{$property->rental_price}} <div> per day</div>
                            @endif
                            @endif
                            @endif
                            @if ($property->id)
                            @if($property->rental_price)
                            @if($property->rental_stat === 'per_month')
                            &#8369; {{$property->rental_price}} <div> per month</div>
                            @endif
                            @endif
                            @endif
                            @if ($property->id)
                            @if($property->rental_price)
                            @if($property->rental_stat === 'rent_per_quarter')
                            &#8369; {{$property->rental_price}} <div> per quarter</div>
                            @endif
                            @endif
                            @endif
                            @if ($property->id)
                            @if($property->rental_price)
                            @if($property->rental_stat === 'rent_per_week')
                            &#8369; {{$property->rental_price}} <div> per quarter</div>
                            @endif
                            @endif
                            @endif
                        </h5>

                        <p class="list-type text-muted text-uppercase">
                            @if ($blowup_mode === BLOWUP_INDEX)
                            @if ($property->selling_stat === 'gross')
                            {{ $property->trans_listing_type->title }}
                            @endif
                            @endif
                        </p>
                    </div>
                    <div class="property-id pull-right">               
                        <p>Property ID: <strong>{{ $property->property_code }}</strong>
                        </p>

                        <p>Created: <strong>{{ $property->created_at->format('Y-m-d H:i A') }} </strong>
                        </p>
                        @if ($property->updated_at->gt($property->created_at))
                        <p>Updated: <strong>{{ $property->updated_at->format('Y-m-d H:i A') }} </strong>
                        </p>
                        @endif                
                    </div>
                </div>
            </div>
        </div>
        <hr>
        @if($property->lot_area || $property->floor_area)
        <div class="panel panel-default">
            <div class="panel-heading">Details</div>
            <div class="panel-body">
                <table class="table table-detail secondary">
                    @if ($blowup_mode === BLOWUP_INDEX)
                    @if($property->lot_area)
                    <tr class='blowup-lot_area'>
                        <td class="b-detail">Lot Area</td>
                        <td>{{ $property->lot_area }} sqm</td>
                    </tr>
                    @endif
                    @endif
                    @if ($blowup_mode === BLOWUP_INDEX)
                    @if($property->floor_area)
                    <tr class='blowup-floor_area'>
                        <td class="b-detail">Floor Area</td>
                        <td>{{ $property->floor_area }} sqm</td>
                    </tr>
                    @endif
                    @endif
                </table>
            </div>
        </div>
        @endif
        @if($property->description)
        @if ($blowup_mode === BLOWUP_INDEX)
        <div class="panel blowup-description panel-default">
            <div class="panel-heading">Description</div>
            <div class="panel-body note">
                <p>{{ $property->description }}</p>
            </div>
        </div>
        @endif
        @endif
        @if ($blowup_mode === BLOWUP_INDEX)
        @if(auth()->user())
        @if (auth()->user()->id === $property->user->id && $property->personal_notes)
        <div class="panel panel-default">
            <div class="panel-heading">Personal Notes</div>
            <div class="panel-body note">
                <p>{{ $property->personal_notes }}</p>
            </div>
        </div>
        @endif
        @endif
        @endif
    </div>
</div>

