@if (isset($viewmode) && $viewmode === 'listings')
<div class="pull-right adjust action-button">
    <div class="btn-group dropup">
        <button data-toggle="dropdown" type="button" class="btn btn-info btn-xs dropdown-toggle">More<span class="caret"></span></button>
        <ul role="menu" class="dropdown-menu dropdown-menu-right actions" style="border:1px solid #898989;" data-id="{{ $share->id }}">
            <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" id="property_code" value="{{ $share->property_code  }}">
            <li class="cmd_view"><a id="view_published" href='/dashboard/blowup/{{ $share->id }}' target="_blank"><span class="fa fa-eye" style="padding-right: 10px"></span>View Published</a></li>

            <li class="cmd_view"><a href='/dashboard/listings/reports/{{ $share->property_code }}' target="_blank"><span class="fa fa-bar-chart" style="padding-right: 10px"></span>View Report</a></li>
            @if(isset($mode) && $mode === 'aff-shares')
            <li class="cmd_edit_dataset"><a href="#"><span class="fa fa-edit" style="padding-right: 10px"></span>Edit Data-set</a></li>
            @else
            <li class="cmd_edit"><a href="/dashboard/edit/{{ str_slug($share->property_title) }}/{{ $share->id }}"><span class="fa fa-edit" style="padding-right: 10px"></span>Edit</a></li>
            @endif

            @if(isset($mode) && $mode === 'aff-shares')
            <li class="cmd_unshare"><a href="#"><span class="fa fa-close" style="padding-right: 10px"></span>Unshare</a></li>
            @else
            <li class="cmd_delete" data-id="{{ $share->id }}"><a href="#"><span class="fa fa-close" style="padding-right: 10px"></span>Delete</a></li>
            @endif

            {{-- <li class="cmd_create_poster"><a href="#"><span class="fa fa-file-image-o" style="padding-right: 10px"></span>Create Poster</a></li> --}}
            <li class="divider"></li>
            @if(isset($mode) && $mode !== 'aff-shares') {{-- change $mode to $view_code --}}
            <li class="cmd_share">
                
                <div class="hidden property-documents">
                    @if($share->files()->count())
                    @foreach($share->documents as $file)
                    <input type="hidden" class="documents" value="{{ $file }}">
                    @endforeach
                    @endif
                </div>
                {{--<div class="property-images hidden">--}}
                    {{--@if($share->files()->count())--}}
                    {{--@foreach($share->images as $file)--}}
                    {{--<input type="hidden" class="images" value="{{ $file }}">--}}
                    {{--@endforeach--}}
                    {{--@endif--}}
                {{--</div>--}}
                <input type="hidden" class='sharables' value="{{ $share->sharables }}">
                <input type="hidden" class='share-property' value="{{ $share }}"> 
                <a href="#share" data-toggle="modal" data-command='share' data-id='{{$share->id}}'><span class="fa fa-share" style="padding-right: 10px;"></span> Share</a>
            </li>
            @endif

            @if(!isset($mode)) 
            <li class="cmd_move_to" data-to="{{ intval($share->property_status) === 1 ? 'private' : 'public' }}" data-id="{{$share->id}}"><a href="#"><span class="fa fa-arrows" style="padding-right: 10px;"></span> Move to {{ intval($share->property_status) === 1 ? 'Private' : 'Public' }}</a></li>
            @endif

            <li class="cmd_view_shares">
                @if ($share->shares()->count())
                @foreach($share->shares as $share)
                <input type="hidden" class="shares" data-profile_image='{{ $share->profile_image }}' data-id='{{ $share->id }}' data-fullname='{{ $share->fullname }}' data-pivot='{{ $share->pivot }}'>
                @endforeach
                @endif
                <a href="#shared-users" data-toggle='modal' data-id='{{ $share->id }}'><span class="fa fa-share-alt" style="padding-right: 10px;"></span> View Shared users</a>
            </li>
            <li class="cmd_bookmark"><a href="#"><span class="fa fa-star-o" style="padding-right: 10px;"></span> Bookmark</a></li>

        </ul>
    </div>
    {{--  <div class="btn-group">
        <a href="#" class="btn btn-link"><i class="fa fa-share-alt"></i></a>
        <a href="#" class="btn btn-link"><i class="fa fa-star-o"></i></a>
        @if(isset($mode) && $mode === 'aff-shares')
        <a href="#" class="btn btn-link aff-show-option"><i class="fa fa-gear"></i></a>
        @endif
    </div> --}}
</div>
@elseif (isset($viewmode) && $viewmode === 'regular')
<a href="/dashboard/blowup/{{ $share->id }}" class="btn btn-link pull-right">VIEW DETAILS</a>
@endif
