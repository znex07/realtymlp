<div class="item col-md-4 col-sm-6 {{ $property->property_title }}">
    <div class="panel panel-default">
        <div class="panel-body">
            <p class="text-center text-uppercase">
                <strong>
                    {{$property->property_title }}
                </strong>              
            </p>       
            <div class="quick-label">
            <span class="label label-primary">{{ $property->trans_listing_type->title }}</span>     
            </div>
            <div class="quick"> 
                <p class="text-muted location">
                  --{{ $property->brgy }}--}}
                    {{ $property->street_address }}
                    {{ $property->village }}
                    {{ $property->loc_city-> name}},
                    {{ $property->loc_province->name }}
                </p>
                <div class="quick-type">
                    <p>{{ $property->cat_condition_type->description }}</p>
                    <p>{{ $property->cat_availability_type->description }}</p>
                    <p>{{ $property->dept_classification->department_name }}</p>
                </div>
                <p class="quick-desc">{{ $property->description }}</p>               

                <p class="quick-price"> 
                    @if ($property->id)
                    @if ($property->formatted_priceStat)
                    Php {{ $property->formatted_priceStat }}
                    @endif
                    @endif 
                </p>
            </div>
            <div class="btn-group dropup pull-right">
                <button data-toggle="dropdown" type="button" class="btn btn-info btn-xs dropdown-toggle">
                    <i class="fa fa-gear"></i>
                </button>
                <ul role="menu" class="dropdown-menu actions" data-id="{{ $property->id }}">
                    <li>
                        <a href="/dashboard/property/quickpost/edit/{{str_slug($property->property_title)}}/{{ $property->id }}"><span class="fa fa-edit" style="padding-right: 10px"></span>Edit</a>
                    </li>
                    <li>
                        <a href="/dashboard/edit/{{str_slug($property->property_title)}}/{{ $property->id }}"><span class="fa fa-edit" style="padding-right: 10px"></span>Upgrade to Advance Post</a>
                    </li>
                    <li class="cmd_delete" data-id="{{ $property->id }}">
                        <a href="#"><span class="fa fa-close" style="padding-right: 10px"></span>Delete</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>