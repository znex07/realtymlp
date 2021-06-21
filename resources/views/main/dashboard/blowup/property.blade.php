<div class="panel panel-default blowup-property-parent">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">                
                <div class="thumb-title col-md-12" style="margin-bottom:10px;">
                    <h6 class='blowup-title' style="font-size:20px !important;">
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
                        {{ $property->property_type }}
                        @endif
                    </p>

                    <p class="text-muted">
                        <span class="fa fa-map-marker"></span>
                        <em class='blowup-address'>
                            @if ($blowup_mode === BLOWUP_INDEX)
                            <span class='blowup-province'>{{ $property->loc_province->name }},</span>
                            <span class='blowup-city'> {{ $property->loc_city->name }}</span>
                            @endif
                            @if ($property->brgy && cansee($sharable, $is_owner,'locations.brgy', $viewed_from_affiliate ))
{{--                            @if ($property->converted_jason->locations->brgy)--}}
                            <span class='blowup-brgy'>, {{ $property->brgy }}</span>
                            {{--@endif--}}
                            @endif
                            @if ($property->street_address && cansee($sharable, $is_owner,'locations.street_address', $viewed_from_affiliate ))
{{--                            @if ($property->converted_jason->locations->street_address)--}}
                            <span class='blowup-street_address'>, {{ $property->street_address }}</span>
                            {{--@endif--}}
                            @endif
                            @if ($property->village && cansee($sharable, $is_owner,'locations.village', $viewed_from_affiliate ))
                            @if ($property->converted_jason->locations->village)
                            <span class='blowup-village'>, {{ $property->village }}</span>
                            @endif
                            @endif
                        </em>
                    </p>
                </div>
                <div class="col-md-12">
                <hr style="margin-top:0px;">
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
                            &#8369; {{$property->rental_price}} <div class="pp"> per year</div>
                            @endif
                            @endif
                            @endif
                            @if ($property->id)
                            @if($property->rental_price)
                            @if($property->rental_stat === 'rent_per_day')
                            &#8369; {{$property->rental_price}} <div class="pp"> per day</div>
                            @endif
                            @endif
                            @endif
                            @if ($property->id)
                            @if($property->rental_price)
                            @if($property->rental_stat === 'per_month')
                             {{$property->rental_price}} <div class="pp"> per month</div>
                            @endif
                            @endif
                            @endif
                            @if ($property->id)
                            @if($property->rental_price)
                            @if($property->rental_stat === 'rent_per_quarter')
                            &#8369; {{$property->rental_price}} <div class="pp"> per quarter</div>
                            @endif
                            @endif
                            @endif
                            @if ($property->id)
                            @if($property->rental_price)
                            @if($property->rental_stat === 'rent_per_week')
                            &#8369; {{$property->rental_price}} <div class="pp"> per quarter</div>
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
               
                    <p><strong>Property ID: </strong>{{ $property->property_code }}
                    </p>
                
                    <p><strong>Created: </strong>{{ $property->created_at->format('Y-m-d H:i A') }} 
                    </p>
                
                    @if ($property->updated_at->gt($property->created_at))
                    <p><strong>Updated: </strong>{{ $property->updated_at->format('Y-m-d H:i A') }} 
                    </p>
                    @endif
                
            </div>
                </div>
            </div>
        </div>        ​
        <hr style="margin-top:0px;">
        <div class="col-md-12">
            <input type="hidden" id="map_options" value="{{ $property->map_options }}">
            
            <div class="fotorama-container">
                <div class="fotorama text-center blowup-images" id="dImg" data-transition="crossfade" data-fit="contain" data-width="100%" data-height="300" data-ratio="800/600" data-stopautoplayontouch="false" data-autoplay="true" data-nav="thumbs">
                    @if($property->files()->count())
                    {{-- */ $index = 0 /* --}}
                    @foreach($property->images as $img)
                    @if ( canseeimg($sharable, $is_owner, 'attachments.images.'.$index++) )
                    @if($property->converted_jason->attachments->images[0]->checked)
                    <img src="/uploads/{{ $img->file_path }}">
                    @endif
                    @endif
                    @endforeach
                    @endif
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Details</div>
                <div class="panel-body">
                    <table class="table table-detail secondary"> ​
                        @if ($property->lot_area  &&  cansee($sharable, $is_owner,'details.lot_area', $viewed_from_affiliate) )
                        @if ($property->converted_jason->details->lot_area)
                        <tr class='blowup-lot_area'>
                            <td class="b-detail">Lot Area</td>
                            <td>{{ $property->lot_area }} sqm</td>
                        </tr>
                        @endif
                        @endif
                        @if ($property->floor_area  && cansee($sharable, $is_owner,'details.floor_area', $viewed_from_affiliate) )
                        @if ($property->converted_jason->details->floor_area)
                        <tr class='blowup-floor_area'>
                            <td class="b-detail">Floor Area</td>
                            <td>{{ $property->floor_area }} sqm</td>
                        </tr>
                        @endif
                        @endif ​
                        @if ($property->bedrooms  && cansee($sharable, $is_owner,'details.rooms', $viewed_from_affiliate) )
                        @if ($property->converted_jason->details->rooms)
                        <tr class='blowup-rooms'>
                            <td class="b-detail">Rooms</td>
                            <td>{{ $property->bedrooms }} </td>
                        </tr>
                        @endif
                        @endif
                        @if ($property->bathrooms  && cansee($sharable, $is_owner,'details.bathrooms', $viewed_from_affiliate) )
                        @if ($property->converted_jason->details->bathrooms)
                        <tr class='blowup-bathrooms'>
                            <td class="b-detail">Bathroom</td>
                            <td>{{ $property->bathrooms }} </td>
                        </tr>
                        @endif
                        @endif
                        @if ($property->maid_room  && cansee($sharable, $is_owner,'details.maid_room', $viewed_from_affiliate) )
                        @if ($property->converted_jason->details->maid_room)
                        <tr class='blowup-maid_room'>
                            <td class="b-detail">Maid's Room</td>
                            <td>{{ $property->maid_room }} </td>
                        </tr>
                        @endif
                        @endif
                        @if ($property->parking  && cansee($sharable, $is_owner,'details.parking', $viewed_from_affiliate) )
                        @if ($property->converted_jason->details->parking)
                        <tr class='blowup-rooms'>
                            <td class="b-detail">Parking</td>
                            <td>{{ $property->parking }} </td>
                        </tr>
                        @endif
                        @endif
                        @if ($property->balcony  && cansee($sharable, $is_owner,'details.balcony', $viewed_from_affiliate) )
                        @if ($property->converted_jason->details->balcony)
                        <tr class='blowup-rooms'>
                            <td class="b-detail">Balcony</td>
                            <td>{{ $property->balcony }} </td>
                        </tr>
                        @endif
                        @endif
                    </table>
                </div>
            </div>
            @if ($property->description && cansee($sharable, $is_owner, 'details.description', $viewed_from_affiliate))
            @if ($property->converted_jason->details->description)
            <div class="panel blowup-description panel-default">
                <div class="panel-heading">Description</div>
                <div class="panel-body note">
                    <p>{{ $property->description }}</p>
                </div>
            </div>
            @endif
            @endif
            @if ($property->map_options && cansee($sharable, $is_owner, 'locations.maps', $viewed_from_affiliate))
            @if ($property->converted_jason->locations->maps)
            <div class="panel blowup-location panel-default">
                <div class="panel-heading">Location</div>
                <div cla ss="panel-body">
                    <input id="address" type="text" value="" class="hidden">

                    <div id="map" style="height:400px; background-color:#f6f6f6;"></div>
                </div>
            </div>
            @endif
            @endif
            @if($property->files()->count())
            {{--*/ $index = 0 /*--}}
            <div class="panel blowup-location panel-default">
                <div class="panel-heading">Attachments</div>
                @foreach($property->documents as $doc)
                @if ( canseedoc($sharable, $is_owner, 'attachments.documents.'.$index++) )
                @if($property->converted_jason->attachments->documents[0]->checked)
                <div class="panel-body">
                    <div class="well well-sm">
                        <a href="/uploads/{{$doc -> file_path}}">
                            <i class="fa fa-download" aria-hidden="true"></i> {{"      ".$doc->orig_name}}
                        </a>
                    </div>
                </div>
                @endif
                @endif
                @endforeach                
            </div>     
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
</div>

