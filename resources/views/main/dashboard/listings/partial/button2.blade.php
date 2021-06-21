@if($accurate_listing->visibility == 1)
<div class="ownership">
@if (!$accurate_listing->pivot && auth()->check() && $accurate_listing->owner->id == auth()->user()->id)

<div class="well well-sm " style="position:absolute;top:0;right:0; margin-top:15px;margin-right:15px">
{{--<div class="well well-sm" style="position:absolute;top:10px;right:10px; height:30px;width:100px">--}}
    <p class="text-muted"><strong>My Listing </strong></p>
</div>
@else
<div class="well well-sm" style="position:absolute;top:0;right:0; margin-top:15px;margin-right:15px">
    <p class="text-muted"><strong>By {{ ($accurate_listing->user->full_name) }} listing</strong></p>
</div>
@endif
</div>
<div class="public-button">

    @if ($accurate_listing->property_status == 2)
    <span class="label label-default label-status pull-right">
        <i class="fa fa-ban"></i> Private
    </span>
    @elseif($accurate_listing->property_status == 1)
    <span class="label label-default label-status pull-right">
        <i class="fa fa-globe"></i> Public
    </span>
    @elseif($accurate_listing->property_status == 3)
    <span class="label label-default label-status pull-right">
        <i class="fa fa-clock-o" aria-hidden="true"></i> Quick
    </span>
    @endif

    <div class="pull-right adjust action-button">
        <div class="btn-group dropup">
            <button data-toggle="dropdown" type="button" class="btnoption btn-embossed btn btn-info btn-xs dropdown-toggle" title="option" data-placement="right"><i class="fa fa-gear"></i></button>
            <ul role="menu" class="dropdown-menu dropdown-menu-right actions cmd-parent" data-id="{{ $accurate_listing->id }}" data-to="{{ $accurate_listing->move_to }}">
                <input type="hidden" class="property_code" value="{{ $accurate_listing->property_code  }}">


                <li class="cmd_view_published" id="btn_view_published ">
                    <a class="view_published" href='/blowup/{{ $accurate_listing->id.'?view_from=1'}}{{ (isset($intab) && $intab == 'group') || (isset($group_id)) ? '&group_id='.$group_id : ''}}' target="_blank" data-command="view_published">
                        <i class="fa fa-eye"></i>View Published
                    </a>
                </li>

                @if (!$accurate_listing->pivot && auth()->check() && $accurate_listing->owner->id == auth()->user()->id)
                <li>

                    <a data-toggle="modal" data-target="#unshare"  data-command="unshare">

                        @foreach($accurate_listing->shares as $affshare)
                        <input type="hidden" class="prop_share" value="{{$affshare}}">
                        @endforeach
                        <i class="fa fa-close"></i>Unshare
                    </a>
                </li>
                @endif


                @if (!$accurate_listing->pivot && auth()->check() && $accurate_listing->owner->id == auth()->user()->id)
                <li class="cmd_view_reports" id="btn_view_report ">
                    <a href='/dashboard/listings/reports/{{ $accurate_listing->property_code }}' target="_blank" data-command="view_report">
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
            @if (!$accurate_listing->pivot && auth()->check() && $accurate_listing->owner->id == auth()->user()->id)
            <li class="cmd_edit" id="btn_edit ">
                @if($accurate_listing->property_status == '3')
                <a href="/dashboard/property/quickpost/edit/{{ str_slug('asd  ') }}/{{ $accurate_listing->id }}" data-command="edit">
                  <i class="fa fa-edit"></i>Edit
              </a>
              @else
              <a href="/dashboard/edit/{{ str_slug($accurate_listing->property_title) }}/{{ $accurate_listing->id }}" data-command="edit">
                  <i class="fa fa-edit"></i>Edit
              </a>
              @endif
          </li>

          @endif
            @if (!$accurate_listing->pivot && auth()->check() && $accurate_listing->owner->id == auth()->user()->id)
            <li class="cmd_delete">
                <a href="#" data-command="delete">
                    <i class="fa fa-close"></i>Delete
                </a>
            </li>

            @endif

            {{--<!-- <li class="divider"></li> -->--}}
             {{--@if(isset($mode) && $mode !== 'aff-shares' && $intab !== 'shared')--}}
             @if (!$accurate_listing->pivot && auth()->check() && $accurate_listing->owner->id == auth()->user()->id)
            <li class="cmd_share">

                <div class="hidden property-documents">
                    @if($accurate_listing->files()->count())
                    @foreach($accurate_listing->documents as $file)
                    <input type="hidden" class="documents" value="{{ $file }}">
                    @endforeach
                    @endif
                </div>
                <div class="property-images hidden">
                    @if($accurate_listing->files()->count())
                    @foreach($accurate_listing->images as $file)
                    <input type="hidden" class="images" value="{{ $file }}">
                    @endforeach
                    @endif
                </div>
                <input type="hidden" class='sharables' value="{{ $accurate_listing->sharables }}">
                <input type="hidden" class='share-property' value="{{ $accurate_listing }}">

                <a href="#share" id="btn_share" data-toggle="modal" data-command='share' data-id="{{ $accurate_listing->id  }}">
                    <i class="fa fa-share"></i>Share
                </a>
            </li>

            @endif
            {{-- @endif --}}

            @if (!$accurate_listing->pivot && auth()->check() && $accurate_listing->owner->id == auth()->user()->id)
            @if($accurate_listing->property_status == '1' || $accurate_listing->property_status == '2')
            <li class="cmd_move_to" id="btn_move ">
                <a href="#" data-command='move_to' data-to="{{ $accurate_listing->move_to }}" data-id="{{ $accurate_listing->id }}">
                    <i class="fa fa-arrows"></i>Move to {{ $accurate_listing->move_to }}
                </a>
            </li>
            @endif

            @if($accurate_listing->property_status == '3')
            <li>
                <a href="/dashboard/edit/{{ str_slug($accurate_listing->property_title) }}/{{ $accurate_listing->id }}" data-command="edit">
                    <i class="fa fa-level-up" aria-hidden="true"></i> Upgrade Post
                </a>
            </li>
            @endif
            @endif

            {{----}}
            {{--@if (isset($view_code) && $view_code == VIEW_CODE_LISTING_SHARE)--}}
            {{--<li class="cmd_view_shares">--}}
                {{--@if ($accurate_listing->shares()->count())--}}
                {{--@foreach($accurate_listing->shares as $share)--}}
                {{--<input type="hidden" class="shares" data-profile_image='{{ $share->profile_image }}' data-id='{{ $share->id }}' data-fullname='{{ $share->fullname }}' data-pivot='{{ $share->pivot }}'>--}}
                {{--@endforeach--}}
                {{--@endif--}}
                {{--<a href="#shared-users" data-toggle='modal' data-id='{{ $accurate_listing->id }}'><span class="fa fa-share-alt" style="padding-right: 10px;"></span> View Shared users</a>--}}
            {{--</li>--}}
            {{--@endif--}}
            {{----}}

            {{--<!-- <li class="cmd_bookmark"><a href="#"><span class="fa fa-star-o" style="padding-right: 10px;"></span>Bookmark</a></li> -->--}}
        </ul>
    </div>
</div>
</div>



@if (isset($viewmode) && ($viewmode === 'regular' ||  $viewmode === 'group'))
<a href="/blowup/{{ $accurate_listing->id.'?view_from='.$view_from }}{{ (isset($intab) && $intab == 'group') || (isset($group_id)) ? '&group_id='.$group_id : ''}}" class="btn btn-primary btn-xs pull-right" style="">VIEW DETAILS </a>
@endif


@else
@if (!$accurate_listing->pivot && auth()->check() && $accurate_listing->owner->id == auth()->user()->id)

<div class="well well-sm" style="position:absolute;top:0;right:0; margin-top:15px;margin-right:15px">
    <p class="text-muted"><strong>My Listing </strong></p>
</div>
@else
<div class="well well-sm" style="position:absolute;top:0;right:0; margin-top:15px;margin-right:15px">
    <p class="text-muted"><strong>By {{ ($accurate_listing->user->full_name) }} listing</strong></p>
</div>

@endif
<div class="public-button">

    @if ($accurate_listing->property_status == 2)
    <span class="label label-default label-status pull-right">
        <i class="fa fa-ban"></i> Private
    </span>
    @elseif($accurate_listing->property_status == 1)
    <span class="label label-default label-status pull-right">
        <i class="fa fa-globe"></i> Public
    </span>
    @elseif($accurate_listing->property_status == 3)
    <span class="label label-default label-status pull-right">
        <i class="fa fa-clock-o" aria-hidden="true"></i> Quick
    </span>
    @endif


    <div class="pull-right adjust action-button">
        <div class="btn-group dropup">

<button data-toggle="dropdown" type="button" class="btn-embossed btn btn-danger btn-xs dropdown-toggle"><i class="fa fa-gear"></i></button>
            <ul role="menu" class="dropdown-menu dropdown-menu-right actions cmd-parent" data-id="{{ $accurate_listing->id }}">
                <input type="hidden" id="property_code" value="{{ $accurate_listing->property_code  }}">
            @if (!$accurate_listing->pivot && auth()->check() && $accurate_listing->owner->id == auth()->user()->id)
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

