@extends('main.dashboard.requirement.base')
@section('content.inner')
<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-body">
<div class="col-md-12">
<ul class="breadcrumb">
<li><a href="/dashboard/overview">Overview</a></li>
<li><a href="/dashboard/requirement">Requirement</a></li>
<li class="active">Looking to Buy Apartment / Condominium For Sale</li>
</ul>
<hr>
<div class="panel panel-default panel-post">
<div class="panel-heading">
Want <strong class="text-primary">@if($requirement['listing_type'] == 2) to Buy @else
to {{ str_replace('For','',$location->getListingType($requirement['listing_type'])) }} @endif {{ $requirement->requirement_type }}
</strong>
@if($requirement->budget_min == '' && $requirement->budget_max == '')
that is <strong class="text-primary"> Open Budget</strong>
@else
@if($requirement->budget_min != '')with a budget of <strong class="text-primary"> &#8369; {{ $requirement->budget_min }} -
@endif {{ $requirement->budget_max }} </strong>
@endif
in:
</div>
<div class="panel-body">
<div class="row" style="width:600px">
@foreach($location->getRequirementLocations($requirement['id']) as $loc)
<div class="col-md-6">---{{ trim($loc,' ') }}</div>
@endforeach
</div>

<div class="" style="font-size:12px; ">
@if ($requirement->id)
@if ($requirement->lot_area)
<span class="requirement-attr" style="margin-right:10px">Lot Area: {{ pluralize($requirement->lot_area, 'sqm') }}</span>
@endif
@endif
@if ($requirement->id)
@if ($requirement->floor_area)
<span class="requirement-attr" style="margin-right:10px">Floor Area: {{ pluralize($requirement->floor_area, 'sqm') }}</span>
@endif
@endif

@if ($requirement->id)
@if ($requirement->bedrooms)
<span class="requirement-attr" style="margin-right:10px">  •  {{ pluralize($requirement->bedrooms, 'Room', true) }}</span>
@endif
@endif

@if ($requirement->id)
@if ($requirement->bathrooms)
<span class="requirement-attr" style="margin-right:10px">  •  {{ pluralize($requirement->bathrooms, 'Bathroom', true) }}</span>
@endif
@endif

@if ($requirement->id)
@if ($requirement->parking)
<span class="requirement-attr" style="margin-right:10px">  •  {{ pluralize($requirement->parking, 'Parking', true) }}</span>
@endif
@endif

@if ($requirement->id)
@if ($requirement->balcony)
<span class="requirement-attr" style="margin-right:10px">  •  {{ pluralize($requirement->balcony, 'balcony', true) }}</span>
@endif
@endif
</div>
</div>
</div>
<hr>
<div class="row">
<div class="col-md-12">
@if(sizeof($accurate_property) > 0)
<h2>{{ sizeof($accurate_property) }} listings matched:</h2><br>
@foreach($accurate_property as $accurate_listing)
<div class="list_view thumbnail-container">
<div class="panel panel-default">
<div class="panel-body thumb-img row-eq-height">

    <div class="col-sm-2 col-xs-3 thumb-img the3">
{{--                                                        @include('main.dashboard.listings.partial.thumbnail2')--}}
    </div>

    <div class="col-sm-10 col-xs-9 the9">
        <div class="thumb-content">
            <h6 class="property-label ellipsis listing-price-stat">
                @if ($accurate_listing->id)
                    {{ $accurate_listing->published_price->get('primary') }}
                @endif
                <p class="price-stat">
                    @if ($accurate_listing->id)
                        {{ $accurate_listing->published_price->get('secondary') }}
                    @endif
                </p>
                @if(isset($viewmode) && $viewmode === 'listings')
                    <p class="pull-right">
                        <strong>
                            @if ($accurate_listing->id)
                                {{ $accurate_listing->cat_ownership_type->description }}
                            @endif
                        </strong>
                    </p>
                @endif

            </h6>

        </div>
        <div class="thumb-dept grid-details">
            <p class="text-muted property-location property-label ellipsis">
                <span class=""></span>

                @if ($accurate_listing->id)
                    {{ $accurate_listing->dept_type->department_name }}
                @endif
                @if ($accurate_listing->id)
                    {{ $accurate_listing->trans_listing_type->title }}
                @endif
                in
                @if ($accurate_listing->id)
                    {{ $accurate_listing->loc_city->name }},
                @endif
                @if ($accurate_listing->id)
                    {{ $accurate_listing->loc_province->name }}
                @endif

            </p>
        </div>
        <div class="thumb-details grid-details">
            <p class="text-muted ellipsis">

                @if ($accurate_listing->id)
                    @if ($accurate_listing->lot_area)
                        <span class="property-attr">Lot Area: {{ pluralize($accurate_listing->lot_area, 'sqm') }}</span>
                    @endif
                @endif


                @if ($accurate_listing->id)
                    @if ($accurate_listing->floor_area)
                        <span class="property-attr">Floor Area: {{ pluralize($accurate_listing->floor_area, 'sqm') }}</span>
                    @endif
                @endif

                @if ($accurate_listing->id)
                    @if ($accurate_listing->bedrooms)
                        <span class="property-attr">{{ pluralize($accurate_listing->bedrooms, 'Room', true) }}</span>
                    @endif
                @endif

                @if ($accurate_listing->id)
                    @if ($accurate_listing->bathrooms)
                        <span class="property-attr">{{ pluralize($accurate_listing->bathrooms, 'Bathroom', true) }}</span>
                    @endif
                @endif

                @if ($accurate_listing->id)
                    @if ($accurate_listing->parking)
                        <span class="property-attr">{{ pluralize($accurate_listing->parking, 'Parking', true) }}</span>
                    @endif
                @endif

                @if ($accurate_listing->id)
                    @if ($accurate_listing->balcony)
                        <span class="property-attr">{{ pluralize($accurate_listing->balcony, 'balcony', true) }}</span>
                    @endif
                @endif
            </p>
        </div>
        <div class="thumb-footer">
{{--                                                            @if ($view_code !== VIEW_CODE_LISTING_WIZARD)--}}
            @include('main.dashboard.listings.partial.button2')
            {{--@endif--}}
        </div>
    </div>
</div>
</div>
</div>
@endforeach
@endif
<h2>{{ $listings_number }} related listings:</h2><br>
@foreach($property as $property)
<div class="list_view thumbnail-container">
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
                {{ $property->property_types }}   {{ $property->trans_listing_type->title }}
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
</div>
    <div class="thumb-dept grid-details">
        <p class="text-muted property-location property-label ellipsis">
            <span class=""></span>

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
        {{--@if ($view_code !== VIEW_CODE_LISTING_WIZARD)--}}
        @include('main.dashboard.listings.partial.button')
        {{--@endif--}}
    </div>
</div>
</div>
</div>
</div>
@endforeach
</div>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection
