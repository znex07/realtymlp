<div class="modal fade" id="share" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×
                </button>
                <h3 class="modal-title share_modal_title">Share Listing</h3>
            </div>

            <div class="modal-body">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="">
                                <div class="form-group">
                                    {{--<div class="btn-group" data-toggle="buttons" style="margin-bottom:10px">--}}

                                    <label class="btn btn-info active">
                                        <input type="radio" id="sh_affiliate" data-toggle="radio" class="custom-radio share_to"  data-target-select="#affiliate_id" name="sh_option" checked> New Sharing
                                    </label>
                                    <label class="btn btn-info">
                                        <input type="radio" id="sh_group" data-toggle="radio"  class="custom-radio share_to" data-sharing-type="group" data-target-select="#group_id" name="sh_option"> Recent Share
                                    </label>

                                    {{--</div>--}}
                                    {{--<div class="btn-group" data-toggle="buttons" style="margin-bottom:10px">--}}
                                    <label class="btn btn-info">
                                        <input type="radio" id="sh_unshare" data-toggle="radio" class="custom-radio share_to" data-sharing-type="unshare" data-target-select="#unshare_id" name="sh_option"> Unshare Listing
                                    </label>
                                    {{--</div>--}}
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
                                    {{-- <div class="form-group">         
                                        <select id="affiliate_id" class="form-control multiselect multiselect-primary" multiple="multiple" data-placeholder="Select affiliates">
                                            <option></option>                                    
                                            @foreach($affiliates as $affiliate)
                                            <option value="{{ $affiliate->id }}">{{ $affiliate->full_name }}</option>
                                            @endforeach
                                         
                                        </select>
                                    </div>    --}}   


                                    {{--<select name="affiliate_id" autofocus="false" onautocomplete="false" id="affiliate_id" class="form-control slc2">--}}
                                    {{--<option selected hidden>Select Affiliate</option>--}}
                                    {{--@if (isset($affiliates))--}}
                                    {{--@foreach($affiliates as $affiliate)--}}
                                    {{--<option value="{{ $affiliate->id }}">{{ $affiliate->full_name }}</option>--}}
                                    {{--@endforeach--}}
                                    {{--@endif--}}
                                    {{--</select>--}}
                                    <form  class="form-horizontal">

                                        <div id="radio1" class="form-group">
                                            <label class="radio radio-inline"> <input type="radio" name="sharetype_cb" id="sharetype_cb1" value="affiliate" > Affiliate </label>
                                            <label class="radio radio-inline"> <input type="radio" name="sharetype_cb" id="sharetype_cb2" value="group"> Group </label>             
                                        </div>

                                    </form>
                                    {{-- <label>
                                        <input type="radio" id="sharetype_cb1" name="sharetype_cb" value="affiliate">Affiliate
                                    </label> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                    <label>
                                        <input type="radio" id="sharetype_cb2" name="sharetype_cb" value="group">Group
                                    </label> --}}
                                    <div name="affiliate_id" autofocus="false"  onautocomplete="false" id="affiliate_id" class="slc2">
                                        <input type="hidden" value="affiliate" name="sharing_type" id="sharing_type" />

                                        <label><strong>Who do you want to share ? </strong></label> <br>


                                        <div id="aff_div" class="well well-sm" style="display: none">

                                        </div>

                                        <div id="group_div" class="well well-sm" style="display: none">
                                            {{--@foreach($groups as $group)--}}
                                            {{--<input type="checkbox"  class="custom-checkbox source" id="cbcb" value="{{ $group->id }}">&nbsp&nbsp{{ $group->group_title }} <br>--}}
                                            {{--@endforeach--}}
                                        </div>
                                    </div>

                                    <div  class=" col-md-12 form-group">
                                        <select name="group_id" autofocus="false" onautocomplete="false" id="group_id" class="form-control slc2" style="display:none">
                                        </select>
                                    </div>
                                    <div  class="form-group col-md-12">
                                        <select name="unshare_id" autofocus="false" onautocomplete="false" id="unshare_id" class="form-control slc2" style="display:none">
                                            <option selected hidden>Unshare To</option>
                                        </select>
                                    </div>


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
                                        @include('main.dashboard.profile.checkbox')
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
                <button type="button" class="btn btn-xs btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-xs btn-primary" data-url="/dashboard/postSharings" id="submit_share" disabled><i class="fa fa-share"></i> <span>Share</span></button>
                <button type="button" class="btn btn-primary btn-xs" id="submit_unshare">Unshare</button>
            </div>

        </div>
    </div>
    <!-- documents template -->
    <div style="display: none;" id="template">
        <div class="template_wrapper col-md-3 col-xs-3 col-sm-3">
            <div>
                <p>
                    <img src="" class="template_img cb_checked">
                    <label class="checkbox template_label pull-right" data-id="" style="position: absolute; bottom:5px; right:5px; z-index: 10000;" for="">
                        <input data-id="" type="checkbox" data-toggle="checkbox" class="template_input" value="" id="" checked>
                    </label>
                </p>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="preview" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background: #2869A0;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×
                </button>
                <h3 class="modal-title share_modal_title">Preview</h3>
            </div>
            <template class='row share-loader text-center' style='display: none;'>
                <span class='fa fa-spin fa-circle-o-notch'></span>
            </template>
            <div class="modal-body">


            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="shareaff" tabindex="-1" role="dialog"
aria-labelledby="myModalLabel3" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3 class="modal-title">Share this listing to affiliates</h3>
        </div>
        <div class="modal-body">
            <div class="row">

                <div class="col-md-12">
                    <div class="btn-group" role="group" aria-label="Basic example" style="margin-bottom:10px">
                        {{--<a type="button" class="btn btn-info" href="#affiliate1" data-toggle="tab" aria-expanded="true">To an Affiliate</a>--}}
                        {{--<a type="button" class="btn btn-info" href="#group1" data-toggle="tab" aria-expanded="false">To a Group</a>--}}
                    </div>
                </div>

                <div class="col-lg-12">
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane fade active in" id="affiliate1">
                         <select class="form-control" id="select">
                             {{--@foreach($affiliates as $aff)--}}
                             {{--<option id="selectShareaff" value={{$aff->id}}>{{$aff->full_name}}</option>--}}
                             {{--@endforeach--}}
                         </select>
                     </div>
                </div>

            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default btn-xs" data-dismiss="modal" >Close </button>
        <button type="button" class="btn btn-primary btn-xs" id="submit_shareaff" >Share</button>
    </div>
</div>
</div>
</div>
</div>
