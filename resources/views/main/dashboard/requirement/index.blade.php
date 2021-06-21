@extends('main.dashboard.requirement.base')
@section('styles')
<style>
.nav-landing {
    display: none;
}

#sortable > div {
    border-top: 1px solid transparent;
}

.panel-post {
    border-left: 3px solid #1abc9c;
    background: #FAFAFB;
}
.panel-body {
    background: #FFFFFF;
}

.font-bold {
    font-weight: bold;
}
</style>
@endsection
@section('content.inner')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="/dashboard/overview">Overview</a></li>
                        <li class="active">Requirement</li>
                        <div class="pull-right"><strong id="requirement_counter">{{ $avail_requirements }} / {{ $total_requirements }}
                            Requirements</strong></div>
                        </ul>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <a href="/dashboard/requirement/post" id="add-requirement" class="btn-block btn btn-primary btn-embossed btn-sm disabled">
                                    Post Requirement</a>
                                </div>
                                <div class="col-md-4">
                                    <form method="get" action="/dashboard/requirement/search">
                                        <input type="text" name="location" class="form-control input-sm"  onpaste="return false" id="inputSearch"
                                        placeholder="Search by Location">
                                    </form>
                                </div>
                                <div class="col-md-5">
                                <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select class="form-control input-sm" id="select">
                                            <option>My requirements</option>
                                            {{--<option>My private requirements</option>--}}
                                            <option>My affiliates shared requirements</option>
                                            {{--<option>My groups requirements</option>--}}
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="btn-group btn-listings" data-toggle="buttons">
                                        <label class="changeview btn-embossed btn btn-primary" data-toggle="tooltip"
                                               data-placement="top" title="Grid View">
                                            <input type="checkbox" autocomplete="off" data-value=".grid_view"
                                                   data-command="template"> <i class="fui-list-numbered"></i>
                                        </label>
                                        <label class="oldnew btn-embossed btn btn-primary" data-toggle="tooltip"
                                               data-placement="top" title="Oldest to Newest" trigger="manual">
                                            <input type="checkbox" autocomplete="off" data-value="asc" data-command="sorting">
                                    <i id="sort_icon" class="fa fa-chevron-up"></i>
                                        </label>
                                        <label class="filter btn-embossed btn btn-primary" data-toggle="collapse"
                                               data-target="#sort-listings" data-placement="top" title="Filter">
                                            <input type="checkbox" autocomplete="off" data-value="" data-command="filtering"> <i
                                                    class="fa fa-filter"></i>
                                        </label>
                                    </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            @foreach($requirements as $requirement)
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

                                        <div class="btn-group pull-right">
                                            <button type="button" onclick="location.href='/dashboard/requirement/match/{{ $requirement['id'] }}/{{ $requirement['listing_type'] }}'" class="btn btn-xs btn-primary grid-details" >
                                                <span class='glyphicon glyphicon-search'></span>Find Match
                                            </button>
                                            <button type="button" class="btn btn-primary btn-xs dropdown-toggle" style="height:26px"data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="caret"></span>
                                                <span class="sr-only" >Toggle Dropdown</span>

                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a data-toggle="modal" id="dropdownshare" data-target="#myModal" data-id="{{ $requirement->id }}">Share</a></li>
                                                <li><a href="/dashboard/requirement/edit/{{ $requirement['id'] }}">Edit</a></li>
                                                <li><a href="/dashboard/requirement/delete/{{ $requirement['id'] }}">Delete</a></li>
                                            </ul>
                                        </div>

                                    </div>
                                <div class="panel-body panel-default">
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
                                <div class="panel-footer">
                                <!-- <span> -->
                                    <div class="text-muted">                                    
                                        <!-- <p class="grid-details text-muted"> -->
                                            <span style="font-size:11px;">    
                                                Created: <strong >{{ $requirement->created_at->format('d/m/Y') }} </strong>
                                            </span>
                                            <span style="font-size:11px; margin-left:40px">
                                            @if ($requirement->updated_at->gt($requirement->created_at))
                                                Updated: <strong>{{ $requirement->updated_at->format('d/m/Y') }} </strong>                                                          
                                            @endif
                                            </span>

                                    <!-- </span> -->
                                        <!-- </p> -->
                                        <a data-toggle="modal" data-target="#newModal">
                                            <span style="cursor:pointer" class="label label-warning label-status pull-right">3 new</span>
                                        </a>
                                        
                                    </div>



                                    <!-- <div class="pull-right"> -->

                                </div>
                                </div>
                                <!-- </div> -->
                            @endforeach
                            {!! $requirements->render() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="myModalLabel">Share Requirements</h3>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
<!--                                     <div class="btn-group" data-toggle="buttons" style="margin-bottom:10px">
                                        <label class="btn btn-info active">
                                            <input type="radio" id="sh_affiliate" data-toggle="radio" class="custom-radio share_to" data-sharing-type="affiliate" data-target-select="#affiliate_id" name="sh_option" checked> To an Affiliate
                                        </label>
                                        <label class="btn btn-info">
                                            <input type="radio" id="sh_group" data-toggle="radio" class="custom-radio share_to" data-sharing-type="group" data-target-select="#group_id" name="sh_option"> To a Group
                                        </label>
                                    </div>
 -->
                                    <div class="btn-group" data-toggle="buttons" style="margin-bottom:10px">
                                    <label class="btn btn-info active">
                                        <input type="radio" id="sh_affiliate" data-toggle="radio" class="custom-radio share_to" data-sharing-type="affiliate" data-target-select="#affiliate_id" name="sh_option" checked> New Sharing
                                    </label>
                                    <label class="btn btn-info">
                                        <input type="radio" id="sh_group" data-toggle="radio" class="custom-radio share_to" data-sharing-type="group" data-target-select="#group_id" name="sh_option"> Unshare Listing
                                    </label>
                                    <label class="btn btn-info">
                                        <input type="radio" id="sh_recent" data-toggle="radio" class="custom-radio share_to" data-sharing-type="recent" data-target-select="#recent_id" name="sh_option"> Recent Share
                                    </label>
                                </div>
                                 </div>
                                {{-- <div class="col-md-3">
                                    <label class="radio" for="sh_affiliate">
                                        <input type="radio" id="sh_affiliate" data-toggle="radio" class="custom-radio share_to" data-sharing-type="affiliate" data-target-select="#affiliate_id" name="sh_option" checked>
                                        To An Affiliate
                                    </label>
                                </div>
                                <div class="col-md-3">
                                    <label class="radio" for="sh_group">
                                        <input type="radio" id="sh_group" data-toggle="radio" class="custom-radio share_to" data-sharing-type="group" data-target-select="#group_id" name="sh_option">
                                        To A Group
                                    </label>
                                </div> --}}
                            </div>
                            <div class="row">
                                <div class="col-md-12 input-affiliate form-group">
                                    <input type="hidden" value="" id="aff_id" />
<!--                                     <select name="user_id" autofocus="true" onautocomplete="false" id="affiliate_id" class="form-control slc2">
                                        <option selected hidden>Select Affiliate</option>
                                        @if (sizeof($affiliates) > 0)
                                            @foreach($affiliates as $affiliate)
                                               <option value="{{ $affiliate->id }}">{{ $affiliate->full_name }}</option>
                                            @endforeach
                                        @else
                                               <option disabled>You have no affiliates .</option>
                                        @endif
                                    </select>
 -->
                                    <div name="affiliate_id" autofocus="false"  onautocomplete="false" id="affiliate_id" class="slc2">
                                        <div class="well well-sm">
                                            @if (isset($affiliates))
                                                @foreach($affiliates as $affiliate)
                                                    <input type="checkbox"  class="source cbAff" id="cbcb{{ $affiliate->id }}" value="{{ $affiliate->id }}">{{ $affiliate->full_name }} <br>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    <select name="group_id" autofocus="false" onautocomplete="false" id="group_id" class="form-control slc2" style="display:none">
                                        <option selected hidden>Select Group</option>

                                        @if (isset($groups))
                                            @foreach($groups as $group)
                                                <option value="{{ $group->id }}">{{ $group->group_title }}</option>
                                            @endforeach
                                        @endif

                                    </select>
                                </div>
                            </div>
                            <div class="panel">
                                <div class="panel-body">
                                    <div class='row share-loader text-center' style='display: none;'>
                                        <span class='fa fa-spin fa-circle-o-notch'></span>
                                    </div>
                                    <div class="row share-sharables-container" style="display:none;">
                                        <span>Last Shared: <span class="label" style="background-color:#1abc9c;" id="last-shared"></span></span>
                                        <span class="pull-right">Last Updated: <span class="label" style="background-color:#1abc9c;" id="last-updated"></span></span>
                                        <p class="small">Sharing Options</p>
                                        {{--@include('main.dashboard.profile.checkbox')--}}
                                    </div>
                                </div>
                            </div>
                            {{-- <hr />
                            <div class="row">
                                <div class="col-md-12">
                                    Preview
                                    <div class="btn-group pull-right" style="margin-bottom: 5px;">
                                        <a class="share_list_public share-thumbnail-btn btn-sm btn btn-primary" href="#" data-target='.share_list_view'>
                                            <span class="fui-list-numbered"></span>
                                        </a>
                                        <a class="share_grid_public share-thumbnail-btn btn-sm btn btn-primary active" href="#" data-target='.share_grid_view'>
                                            <span class="fui-list-small-thumbnails"></span>
                                        </a>
                                    </div>
                                </div>
                                <div class='share-thumbnail-container'></div>
                            </div> --}}
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-sm btn-primary" data-url="/dashboard/requirement/share" id="btnShare" disabled><i class="fa fa-share"></i> <span>Share</button>
            </div>
        </div>
    </div>
</div>
@endsection
    

@section('scripts')
    <script type='text/javascript' src='/assets/js/wizard-step.js'></script>
    <script type='text/javascript' src='/assets/js/wiz_requirements.js'></script>
    <script type='text/javascript' src='/assets/js/global.js'></script>
        <script type="text/javascript">
        $(document).ready(function(){
            var available_requirement = {{ $avail_requirements }};
            var total_requirement = {{ $total_requirements }};
            var requirement_id;
            $('[data-toggle="tooltip"]').tooltip("show");
            $(".tooltip.fade.top").remove();
            if (available_requirement >= total_requirement) {
                $('#requirement_counter').addClass('text-danger');
                var message = "You have already used your "
                + total_requirement
                + " requirements as free user, Do you want to upgrade your account to add more requirements?"
                alertify.confirm("Attention", message, function (e) {
                    window.location.href = '/dashboard/account/upgrade';
                }, function () {
                }).set('labels', {ok:'Yes', cancel:'Later'});
            }
            else {
                $('#add-requirement').removeClass('disabled');
                $('#requirement_counter').removeClass('text-danger');

            }

            $(document).ready(function () {
                var btnShare = $('#btnShare');
                $('#affiliate_id').on('change',function () {
                    btnShare.prop('disabled',false);
                });
            });

            $(".modal").on("hidden.bs.modal", function(){
                $(this).find('form')[0].reset();
            });
            $('#dropdownshare').on('click',function(){
                requirement_id = $(this).data('id');
                console.log(requirement_id);
            });
            $('#btnShare').on('click', function(){
                wiz_requirements.shareReq(requirement_id);
            });
            $('#affiliate_id').on('change',function(){
                $('#aff_id').val($(this).val());
            });
            $('.cbAff').on('click', function(){
                console.log('hcllo' + $(this).val());
            });
        });
        </script>
@endsection