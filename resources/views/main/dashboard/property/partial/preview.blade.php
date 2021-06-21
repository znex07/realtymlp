<style>
.grid_view {
    /*padding-right: 0px;
    padding-left: 0px;*/

}
.property-description{
    text-overflow:ellipsis;
  white-space:nowrap;
  overflow: hidden;
}
.property-label{
    text-overflow:ellipsis;
  white-space:nowrap;
  overflow: hidden;
}


.ratio {
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;
    height: 0;
    padding-bottom: 72%;
    position: relative;
    width: 100%;
}
.thumb-table td {
    font-size: 14px;
    font-weight: 700;
}

.label {
    font-size: 14px;
    font-weight: 500;
}
</style>

<div class="list_view portfolio-item">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="col-md-3 thumb-img">                
                <a href="#">
                    
                </a>
            </div>
            <div class="col-md-9">  
                <div class="thumb-content">                     
                    <h6 class="property-label">{{ $property->property_title }}</h6>
                    </div>
                    <div class="thumb-price">
                    <label class="pull-right">
                        <strong>Php {{ number_format($property->property_price) }}</p> </strong>
                    </label>
                    <p class="text-muted property-location"><span class="fa fa-map-marker"></span><em>{{ $property->published_address }}</em></p>
                    
                </div>

                    <div class="thumb-content">

                    <div class="primary">
                        <div class="btn-group pull-right dropup">
                            <button data-toggle="dropdown" type="button" class="btn btn-info btn-xs dropdown-toggle">More<span class="caret"></span></button>
                            <ul role="menu" class="dropdown-menu actions" style="border:1px solid #898989;" data-id="{{ $property->id }}">
                                <li class="cmd_view"><a href='/dashboard/blowup/{{ $property->id }}' target='_blank'><span class="fa fa-eye" style="padding-right: 10px"></span>View Published</a></li>
                                <li class="cmd_edit"><a href="/dashboard/edit/{{ str_slug($property->property_title) }}/{{ $property->id }}"><span class="fa fa-edit" style="padding-right: 10px"></span>Edit</a></li>
                                <li class="cmd_delete" data-id="{{ $property->id }}"><a href="#"><span class="fa fa-close" style="padding-right: 10px"></span>Delete</a></li>
                                <li class="cmd_create_poster"><a href="#"><span class="fa fa-file-image-o" style="padding-right: 10px"></span>Create Poster</a></li>
                                <li class="divider"></li>
                                <li class="cmd_share">
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
                                    </div>
                                    <a href="#share" data-toggle="modal" data-id='{{$property->id}}'><span class="fa fa-share" style="padding-right: 10px;"></span>Share</a>
                                </li>
                                <li class="cmd_move_to" data-to="{{ intval($property->property_status) === 1 ? 'private' : 'public' }}" data-id="{{$property->id}}">
                                    <a href="#">
                                        <span class="fa fa-arrows" style="padding-right: 10px;">
                                        </span>Move to {{ intval($property->property_status) === 1 ? 'Private' : 'Public' }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <p class="property-price weak-title">
                            @if($property->convert_listing_type)
                            @foreach($property->convert_listing_type as $l=>$val)
                             <span class="label label-default"><span class="fa fa-tag"></span>  {{ $val }}</span>
                            @endforeach
                            @endif
                        </p>

                        
                        <hr>
                        <div class="btn-group pull-right">
                            <a href="#" class="btn btn-link"> <i class="fa fa-share-alt"></i></a>
                            <a href="#" class="btn btn-link"><i class="fa fa-star-o"></i></a>

                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-4 grid_view" style="display:none">
    <div class="panel panel-default">
        <div class="panel-body thumb-img">                  
            <div class="ih-item square effect3 bottom_to_top">
                @if($property->images()->count())
                    @if ( !is_null ($property->thumbnail()) )
                    <div class="ratio img-responsive" style="background-image: url(/uploads/{{ $property->thumbnail()->file_path }});"></div>
                    @else
                    <div class="ratio img-responsive" style="background-image: url(/uploads/{{ $property->images()->first()->file_path }});"></div>
                    @endif
                @else
                <div class="ratio img-responsive" style="background-image: url(/img/img_placeholder.png);"></div>
                @endif
            </div>
            <div class="thumb-content">                 
                <h6 class="property-label">{{ $property->property_title }}</h6>
                <p class="text-muted property-location">
                <span class="fa fa-map-marker"></span><em> {{ $property->published_address }}</em></p>

                
                    <p class="property-description">{{ $property->description }}</p>

                    <div class="pull-left">
                        @if($property->convert_listing_type)
                        @foreach($property->convert_listing_type as $l)
                        <span class="label label-default"><span class="fa fa-tag"></span>  {{ $val }}</span>
                        @endforeach
                        @endif
                                      
                        <div class="btn-group dropup">
                        <button data-toggle="dropdown" type="button" class="btn btn-info btn-xs dropdown-toggle">More<span class="caret"></span></button>
                        <ul role="menu" class="dropdown-menu actions" style="border:1px solid #898989;" data-id="{{ $property->id }}">
                            <li class="cmd_view"><a href='/dashboard/blowup/{{ $property->id }}' target="_blank"><span class="fa fa-eye" style="padding-right: 10px"></span>View Published</a></li>
                            <li class="cmd_edit"><a href="/dashboard/blowup/{{ str_slug($property->property_title) }}/{{ $property->id }}"><span class="fa fa-edit" style="padding-right: 10px"></span>Edit</a></li>
                            <li class="cmd_delete" data-id="{{ $property->id }}"><a href="#"><span class="fa fa-close" style="padding-right: 10px"></span>Delete</a></li>
                            <li class="cmd_create_poster"><a href="#"><span class="fa fa-file-image-o" style="padding-right: 10px"></span>Create Poster</a></li>
                            <li class="divider"></li>
                            <li class="cmd_share">
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
                                </div>
                                <a href="#share" data-toggle="modal" data-id='{{$property->id}}'><span class="fa fa-share" style="padding-right: 10px;"></span>Share</a>
                            </li>
                            <li class="cmd_move_to" data-to="{{ intval($property->property_status) === 1 ? 'private' : 'public' }}" data-id="{{$property->id}}"><a href="#"><span class="fa fa-arrows" style="padding-right: 10px;"></span>Move to {{ intval($property->property_status) === 1 ? 'Private' : 'Public' }}</a></li>
                        </ul>
                    </div>
                    <div class="">
                        
                        
                    
                    </div>
                </div>
               
                    
                
                <table class="thumb-table table text-center table-bordered">                      
                    <tbody>
                        <tr>
                            <td><i class="fa fa-expand"></i> 2,000 Sq ft</td>
                            <td><i class="fa fa-bed"></i> 3 </td>
                            <td><i class="fa fa-tint"></i> 2 </td>
                            <td><i class="fa fa-car"></i> 2 </td>       
                            <td><i class="fa fa-home"></i> 1 </td>                  
                        </tr>
                    </tbody>
                </table>
                <hr>
                <label class="">
                        <strong>Php {{ number_format($property->property_price) }}</p> </strong>
                    </label>
                <div class="btn-group pull-right">
                    <a href="#" class="btn btn-link"><i class="fa fa-share-alt"></i></a>
                    <a href="#" class="btn btn-link"><i class="fa fa-star-o"></i></a>
                </div>
                
            </div>
        </div>
    </div>
</div>