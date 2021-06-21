@if($property->visibility == 1)
<div class="ownership">
    @if (!$property->pivot && auth()->check() && $property->owner->id == auth()->user()->id)

    <div class="well well-sm " style="position:absolute;top:0;right:0; margin-top:15px;margin-right:15px">
        {{--<div class="well well-sm" style="position:absolute;top:10px;right:10px; height:30px;width:100px">--}}
        <p class="text-muted"><strong>My Listing </strong></p>
    </div>
    @else
    <div class="well well-sm" style="position:absolute;top:0;right:0; margin-top:15px;margin-right:15px">
        <p class="text-muted"><strong>By {{ ($property->user->full_name) }} listing</strong></p>
    </div>
    @endif

@if (!$property->pivot && auth()->check() && $property->owner->id == auth()->user()->id)

<div class="well well-sm " style="position:absolute;top:0;right:0; margin-top:15px;margin-right:15px">
{{--<div class="well well-sm" style="position:absolute;top:10px;right:10px; height:30px;width:100px">--}}
    <p class="text-muted"><strong>My Listing </strong></p>
</div>
@else
    @if($view_from == 4)
            <div class="well well-sm" style="position:absolute;top:0;right:0; margin-top:15px;margin-right:15px">
                <p class="text-muted"><strong>Shared in {{ ($property->groups()->find($property->pivot->group_id)->group_title) }} Group</strong></p>
            </div>
        @elseif($view_from == 3)
        @if($property->pivot->ownership_type == '')
            <div class="well well-sm hidden-xs" style="height: 3em; overflow: hidden; width: 250px; position:absolute;top:0;right:0; margin-top:10px;margin-right:10px">
                <p class="text-muted" style="font-size: 12px !important; line-height: 1.3em"><strong>By {{ ($property->pivot->user_fullname)}} listing {{ $property->cat_ownership_type->description }}</strong></p>
            </div>
            @else
                    <div class="well well-sm hidden-xs" style="height: 3em; overflow: hidden; width: 250px; position:absolute;top:0;right:0; margin-top:10px;margin-right:10px">
                        <p class="text-muted" style="font-size: 12px !important; line-height: 1.3em"><strong>By {{ ($property->pivot->user_fullname)}} listing {{ $property->pivot->ownership_type}}</strong></p>
                    </div>
            @endif
        @else
                <div class="well well-sm hidden-xs" style="height: 3em; overflow: hidden; width: 250px; position:absolute;top:0;right:0; margin-top:10px;margin-right:10px">
                    {{--<p class="text-muted" style="font-size: 12px !important; line-height: 1.3em"><strong>By {{ ($property->cat_ownership_type->description )}} listing {{ $property->cat_ownership_type->description }}</strong></p>--}}
                </div>
        @endif

@endif

</div>

<div class="public-button">
    @if ($property->property_status == 2)
    <span class="label label-default label-status pull-right">
        <i class="fa fa-ban"></i> Private
    </span>
    @elseif($property->property_status == 1)
    <span class="label label-default label-status pull-right">
        <i class="fa fa-globe"></i> Public
    </span>
    @elseif($property->property_status == 3 || $property->property_status == '4')
    <span class="label label-default label-status pull-right">
        <i class="fa fa-clock-o" aria-hidden="true"></i> Quick
    </span>
    @endif
    <div class="pull-right adjust action-button">
        <div class="btn-group dropup">
            <button data-toggle="dropdown" type="button" class="btnoption btn-embossed btn btn-info btn-xs dropdown-toggle" title="option" data-placement="right"><i class="fa fa-gear"></i></button>
            <ul role="menu" class="dropdown-menu dropdown-menu-right actions cmd-parent" data-id="{{ $property->id }}" data-to="{{ $property->move_to }}">
                <input type="hidden" class="property_code" value="{{ $property->property_code  }}">



                <li class="cmd_view_published" id="btn_view_published ">
                    <a class="view_published" href='/blowup/{{ $property->id.'?view_from='.$view_from}}{{ (isset($intab) && $intab == 'group') || (isset($property->pivot->group_id)) ? '&group_id='.$property->pivot->group_id : ''}}' target="_blank" data-command="view_published">
                        <i class="fa fa-eye"></i>View Published
                    </a>
                </li>
                @if($view_from == 3)
                    <input type="hidden" class='sharables'  value="{{ $property->pivot->sharables }}">
                <li class="cmd_share">

                    {{--<div class="hidden property-documents">--}}
                        {{--@if($property->files()->count())--}}
                            {{--@foreach($property->documents as $file)--}}
                                {{--<input type="hidden" class="documents" value="{{ $file }}">--}}
                            {{--@endforeach--}}
                        {{--@endif--}}
                    {{--</div>--}}
                    {{--<div class="property-images hidden">--}}
                        {{--@if($property->files()->count())--}}
                            {{--@foreach($property->images as $file)--}}
                                {{--<input type="hidden" class="images" value="{{ $file }}">--}}
                            {{--@endforeach--}}
                        {{--@endif--}}
                    {{--</div>--}}
                    <input type="hidden" class='sharables'  value="{{ $property->sharables }}">
                    <input type="hidden" class='categories'  value="{{ $property->cat_ownership_type->category_id }}">
                    <input type="hidden" class='owner'  value="{{ $property->owner->full_name}}">
                    {{--<input type="hidden" class='share-property' value="{{ $property }}">--}}
                    <a href="#shareaff" id="btn_share" data-toggle="modal" data-command='share' data-id="{{ $property->id  }}">
                        <i class="fa fa-share"></i>Share
                        @foreach($property->shares as $affshare)
                            <input type="hidden" class="prop_share" value="{{$affshare}}">
                        @endforeach
                        {{--unshared affiliates--}}
                        {{--@foreach($property->unshared as $unshares)--}}
                            {{--<input type="hidden" class="prop_sharess" value="{{$unshares}}">--}}
                        {{--@endforeach--}}
                        {{--unshared groups--}}
                        {{--@foreach($property->unshared_group as $unshares_group)--}}
                            {{--<input type="hidden" class="unshares_group" value="{{$unshares_group}}">--}}
                        {{--@endforeach--}}
                        {{--@foreach($property->groups as $groupshare)--}}
                            {{--<input type="hidden" class="prop_shares" value="{{$groupshare}}">--}}
                        {{--@endforeach--}}

                    </a>
                </li>
                @endif

                {{--@if (!$property->pivot && auth()->check() && $property->owner->id == auth()->user()->id)--}}
                {{--<li>--}}

                    {{--<a data-toggle="modal" data-target="#unshare"  data-command="unshare">--}}
                        {{--@foreach($property->shares as $affshare)--}}
                        {{--<input type="hidden" class="prop_share" value="{{$affshare}}">--}}
                        {{--@endforeach--}}
                        {{--<i class="fa fa-close"></i>Unshare--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--@endif--}}
                @if (!$property->pivot && auth()->check() && $property->owner->id == auth()->user()->id)
                <li class="cmd_view_reports" id="btn_view_report ">
                    <a href='/dashboard/listings/reports/{{ $property->property_code }}' target="_blank" data-command="view_report">
                        <i class="fa fa-bar-chart"></i>View Report
                    </a>
                </li>

                @endif

                {{-- @if(isset($mode) && $mode === 'aff-shares') --}}
                {{--
                <li class="cmd_edit_dataset">
                    <a href="#">
                        <i class="fa fa-edit"></i>Edit Data-set
                    </a>
                </li>
                --}}
                {{-- @else --}}
                @if (!$property->pivot && auth()->check() && $property->owner->id == auth()->user()->id)
                <li class="cmd_edit" id="btn_edit ">
                    @if($property->property_status == '3' || $property->property_status == '4')
                    <a href="/dashboard/property/quickpost/edit/{{ str_slug('asd  ') }}/{{ $property->id }}" data-command="edit">
                    <i class="fa fa-edit"></i>Edit
                    </a>
                    @else
                    <a href="/dashboard/edit/{{ str_slug($property->property_title) }}/{{ $property->id }}" data-command="edit">
                        <i class="fa fa-edit"></i>Edit
                    </a>
                    @endif
                </li>
                @endif
                @if (!$property->pivot && auth()->check() && $property->owner->id == auth()->user()->id)
                <li class="cmd_delete">
                    <a href="#" data-command="delete">
                        <i class="fa fa-close"></i>Delete
                    </a>
                </li>
                @endif

                {{--<!-- <li class="divider"></li> -->--}}
                {{--@if(isset($mode) && $mode !== 'aff-shares' && $intab !== 'shared')--}}
                @if (!$property->pivot && auth()->check() && $property->owner->id == auth()->user()->id)
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
                    <input type="hidden" class='sharables' value="{{ $property->sharables }}">
                    <input type="hidden" class='share-property' value="{{ $property }}">
                    <a href="#share" id="btn_share" data-toggle="modal" data-command='share' data-id="{{ $property->id  }}">
                        <i class="fa fa-share"></i>Share
                        @foreach($property->shares as $affshare)
                            <input type="hidden" class="prop_share" value="{{$affshare}}">
                        @endforeach
                        {{--unshared affiliates--}}
                        @foreach($property->unshared as $unshares)
                            <input type="hidden" class="prop_sharess" value="{{$unshares}}">
                        @endforeach
                        {{--unshared groups--}}
                        @foreach($property->unshared_group as $unshares_group)
                            <input type="hidden" class="unshares_group" value="{{$unshares_group}}">
                        @endforeach
                        @foreach($property->groups as $groupshare)
                            <input type="hidden" class="prop_shares" value="{{$groupshare}}">
                        @endforeach

                    </a>
                </li>

                @endif
                {{-- @endif --}}

                @if (!$property->pivot && auth()->check() && $property->owner->id == auth()->user()->id)
                @if($property->property_status == '1' || $property->property_status == '2')
                <li class="cmd_move_to" id="btn_move ">
                    <a href="#" data-command='move_to' data-to="{{ $property->move_to }}" data-id="{{ $property->id }}">
                        <i class="fa fa-arrows"></i>Move to {{ $property->move_to }}
                    </a>
                </li>
                @endif

                @if($property->property_status == '3')
                <li>
                    <a href="/dashboard/edit/{{ str_slug($property->property_title) }}/{{ $property->id }}" data-command="edit">
                        <i class="fa fa-level-up" aria-hidden="true"></i> Upgrade Post
                    </a>
                </li>
                @endif
                @endif

            {{----}}
            {{--@if (isset($view_code) && $view_code == VIEW_CODE_LISTING_SHARE)--}}
            {{--<li class="cmd_view_shares">--}}
            {{--@if ($property->shares()->count())--}}
            {{--@foreach($property->shares as $share)--}}
            {{--<input type="hidden" class="shares" data-profile_image='{{ $share->profile_image }}' data-id='{{ $share->id }}' data-fullname='{{ $share->fullname }}' data-pivot='{{ $share->pivot }}'>--}}
            {{--@endforeach--}}
            {{--@endif--}}
            {{--<a href="#shared-users" data-toggle='modal' data-id='{{ $property->id }}'><span class="fa fa-share-alt" style="padding-right: 10px;"></span> View Shared users</a>--}}
            {{--</li>--}}
            {{--@endif--}}
            {{----}}

            {{--<!-- <li class="cmd_bookmark"><a href="#"><span class="fa fa-star-o" style="padding-right: 10px;"></span>Bookmark</a></li> -->--}}
            </ul>
        </div>
    </div>
</div>



@if (isset($viewmode) && ($viewmode === 'regular' ||  $viewmode === 'group'))
<a href="/blowup/{{ $property->id.'?view_from='.$view_from }}{{ (isset($intab) && $intab == 'group') || (isset($group_id)) ? '&group_id='.$group_id : ''}}" class="btn btn-primary btn-xs pull-right" style="">VIEW DETAILS </a>
@endif


@else
@if (!$property->pivot && auth()->check() && $property->owner->id == auth()->user()->id)

<div class="well well-sm" style="position:absolute;top:0;right:0; margin-top:15px;margin-right:15px">
    <p class="text-muted"><strong>My Listing </strong></p>
</div>
@else
    @if($view_from == 4)
        <div class="well well-sm" style="position:absolute;top:0;right:0; margin-top:15px;margin-right:15px">
            <p class="text-muted"><strong>Shared in {{ ($property->groups()->find($property->pivot->group_id)->group_title) }} Group</strong></p>
        </div>
    @else
        <div class="well well-sm" style="position:absolute;top:0;right:0; margin-top:15px;margin-right:15px">
            <p class="text-muted"><strong>By {{ ($property->user->full_name) }} listing</strong></p>
        </div>
    @endif
@endif
<div class="public-button">

    @if ($property->property_status == 2)
    <span class="label label-default label-status pull-right">
        <i class="fa fa-ban"></i> Private
    </span>
    @elseif($property->property_status == 1)
    <span class="label label-default label-status pull-right">
        <i class="fa fa-globe"></i> Public
    </span>
    @elseif($property->property_status == 3)
    <span class="label label-default label-status pull-right">
        <i class="fa fa-clock-o" aria-hidden="true"></i> Quick
    </span>
    @endif


    <div class="pull-right adjust action-button">
        <div class="btn-group dropup">

            <button data-toggle="dropdown" type="button" class="btn-embossed btn btn-danger btn-xs dropdown-toggle"><i class="fa fa-gear"></i></button>
            <ul role="menu" class="dropdown-menu dropdown-menu-right actions cmd-parent" data-id="{{ $property->id }}">
                <input type="hidden" id="property_code" value="{{ $property->property_code  }}">
                @if (!$property->pivot && auth()->check() && $property->owner->id == auth()->user()->id)
                <li class="cmd_delete">
                    <a href="#" data-command="delete">
                        <i class="fa fa-close"></i>Delete
                    </a>
                </li>

                @endif
            </ul>
        </div>
    </div>
</div>
@endif
