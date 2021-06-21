<div class="row">
    <div class="col-md-12">
        <form action="/dashboard/filter" method="get" style="margin:0px">
            <input type="hidden" value="{{ csrf_token() }}" name="_token">
            <div id="sort-listings" data-tab="sort-listings" class="panel-advanced-search panel-collapse collapse">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group-sm form-group">
                            <select id="listing_type" name="listing_type" data-filter-name="listing_type"
                                    class="advanced-filter form-control input-sm" onchange="listing_change()">
                                <option value="default" default selected hidden>What type of listing? </option>
                                @foreach($transact as $t)
                                    <option data-name="{{ $t->title }}" value="{{ $t->id }}">{{ $t->title }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group-sm form-group">
                            <select name="property_classifications" data-filter-name="property_classifications"
                                    class="advanced-filter form-control input-sm">
                                <option value="default" default selected hidden>What is it's current condition?</option>
                                @foreach($department as $d)
                                    <option value="{{$d->id}}">{{$d->department_name}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group-sm form-group">
                            <select name="property_types" data-filter-name="property_types"
                                    class="advanced-filter form-control input-sm">
                                <option value="default" default selected hidden>Choose Property Type?</option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="row">
                    {{--<div class="col-md-4">--}}
                        {{--<div class="form-group-sm form-group">--}}
                            {{--<input name="price" type="text" class="dont advanced-filter form-control input-sm"--}}
                                   {{--data-filter-name="price" placeholder="Maximum Price">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <div class="col-md-4">
                        <div class="form-group-sm form-group">
                            <select name="filter_province" data-filter-name="province"
                                    class="advanced-filter form-control input-sm">
                                <option value="default">Which province does it belong to?</option>
                                @foreach($locProvince as $l)
                                    <option value="{{$l->name}}">{{$l->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group-sm form-group">
                            <select name="city" data-filter-name="city"
                                    class="advanced-filter form-control input-sm">
                                <option value="">City / Municipality</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                    <div class="form-group-sm form-group">
                        <button class="btn btn-primary btn-sm btn-embossed" type="submit" name="filter" id="filter">Filter Search</button>
                    </div>
                </div>
                </div>
                
                {{-- see more --}}
                {{--<div class="see-more-orig text-center">--}}
                    {{--<!-- <div class="btn-group hidden-xs see-more-link" style="padding: 5px;">--}}
                      {{--<button class="btn-xs btn btn-primary btn-apply-filter"><span class="fa fa-search"></span> Apply Filter</button>--}}
                      {{--<a class="btn-xs btn btn-primary btn-see-more" data-toggle="collapse" href="#see-more"><span class="fa fa-eye"></span> See More</a>--}}
                    {{--</div> -->--}}

                {{--</div>--}}
                {{-- end see more --}}
                {{--<div id="see-more" data-tab="see-more" class="panel-advanced-search panel-collapse collapse">--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-md-4">--}}
                            {{--<div class="form-group-sm form-group">--}}
                                {{--<select name="condition_type" data-filter-name="condition_type"--}}
                                        {{--class="advanced-filter form-control input-sm">--}}
                                    {{--<option value="">Condition Type</option>--}}

                                {{--</select>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-4">--}}
                            {{--<div class="form-group-sm form-group">--}}
                                {{--<select name="availability_type" data-filter-name="availability_type"--}}
                                        {{--class="advanced-filter form-control input-sm">--}}
                                    {{--<option value="">Availability Type</option>--}}

                                {{--</select>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-4">--}}
                            {{--<div class="form-group-sm form-group">--}}
                                {{--<select name="ownership_type" data-filter-name="ownership_type"--}}
                                        {{--class="advanced-filter form-control input-sm">--}}
                                    {{--<option value="">Listing Ownership</option>--}}

                                {{--</select>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-md-4">--}}
                            {{--<div class="form-group-sm form-group">--}}
                                {{--<select name="parking" data-filter-name="parking"--}}
                                        {{--class="greater dont advanced-filter form-control input-sm">--}}
                                    {{--<option value="">Parking</option>--}}
                                    {{--<option value="1">1</option>--}}
                                    {{--<option value="2">2</option>--}}
                                    {{--<option value="3">3</option>--}}
                                    {{--<option value="3+">3+</option>--}}
                                {{--</select>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-4">--}}
                            {{--<div class="form-group-sm form-group">--}}
                                {{--<select name="bathrooms" data-filter-name="bathrooms" id="t1-city"--}}
                                        {{--class="greater dont advanced-filter form-control input-sm">--}}
                                    {{--<option value="">Bathrooms</option>--}}
                                    {{--<option value="1">1</option>--}}
                                    {{--<option value="2">2</option>--}}
                                    {{--<option value="3">3</option>--}}
                                    {{--<option value="3+">3+</option>--}}
                                {{--</select>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class='col-md-4'>--}}
                            {{--<div class="form-group-sm text-center form-group see-more-container">--}}

                            {{--</div>--}}
                        {{--</div>--}}

                    {{--</div>--}}

                {{--</div>--}}
            </div>
        </form>
    </div>
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-2">
                <a href="#" id="add-listing" class="btn btn-primary btn-sm btn-embossed disabled" data-toggle="modal"
                   data-target="#myModal" title="Add Listing"><i
                            class="fa fa-plus"></i> Add Listings</a>
            </div>
            <div class="col-md-5">
                <form method="get" action="/dashboard/search"><input type="text" name="location"
                                                                     class="form-control input-sm" id="inputSearch"
                                                                     placeholder="Search by location"></form>
            </div>
            <div class="col-md-5">
                <div class="row">
                    <div class="col-md-6">
                        <form method="post" action="/dashboard" id="form_view_form">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <select name="listing_view" data-filter-name="from" class="form-control input-sm" onchange="javascript:location.href = this.value;">
                                <option value="{{ LISTINGS_VIEW_6 }}" {{ $listing_view == LISTINGS_VIEW_6 ? 'selected': '' }}>
                                    My listings
                                </option>
                                {{-- <option value="{{ LISTINGS_VIEW_0 }}" {{ $listing_view == LISTINGS_VIEW_0 ? 'selected': '' }}>
                                    All Listings
                                </option> --}}

                                <option value="{{ LISTINGS_VIEW_1 }}" {{ $listing_view == LISTINGS_VIEW_1 ? 'selected': '' }}>
                                    My public listings
                                </option>
                                <option value="{{ LISTINGS_VIEW_2 }}" {{ $listing_view == LISTINGS_VIEW_2 ? 'selected': '' }}>
                                    My private listings
                                </option>
                                <option value="{{ LISTINGS_VIEW_3 }}" {{ $listing_view == LISTINGS_VIEW_3 ? 'selected': '' }}>
                                    Affiliate's shared listings
                                </option>
                                 <option value="{{ LISTINGS_VIEW_4 }}" {{ $listing_view == LISTINGS_VIEW_4 ? 'selected': '' }}>
                                    Group's Listings
                                </option>
                              {{--   <option value="/groups">
                                    Group's Listings
                                </option> --}}
                                {{-- <option value="{{ LISTINGS_VIEW_5 }}" {{ $listing_view == LISTINGS_VIEW_5 ? 'selected': '' }}>
                                    All Public listing of other users
                                </option>

                                <option value="{{ LISTINGS_VIEW_6 }}" {{ $listing_view == LISTINGS_VIEW_6 ? 'selected': '' }}>
                                    My listings
                                </option> --}}
                            </select>
                        </form>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="btn-group btn-listings" data-toggle="buttons">
                            <label class="changeview btn-embossed btn btn-primary" data-toggle="tooltip"
                                   data-placement="top" title="Grid View">
                                <input type="checkbox" autocomplete="off" data-value=".grid_view"
                                       data-command="template"> <i class="fui-list-numbered"></i>
                            </label>
                            <label class="oldnew btn-embossed btn btn-primary" data-toggle="tooltip"
                                   data-placement="top" title="Oldest to Newest" trigger="manual">
                                <input type="checkbox" autocomplete="off" data-value="asc" data-command="sorting">
                                @if($sorting == 'asc')
                                    <i id="sort_icon" class="fa fa-chevron-up"></i>
                                @else
                                    <i id="sort_icon" class="fa fa-chevron-down"></i>
                                @endif

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
    </div>
</div>
<hr>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3 class="modal-title"> </h3>
            </div>
            <div class="modal-body text-center">
                Would you like to post a regular listing, or would you want to make quick one for now?
            </div>
            <div class="modal-footer">
                <a class="btn btn-sm btn-primary" href="/dashboard/property/wizard">Regular Post</a>
                <a class="btn btn-sm btn-info" href="/dashboard/quick">Quick Post</a>
            </div>
        </div>
    </div>
</div>

<script>
   function listing_change()
   {
       alertify.alert($('#listing_type').val())
   }
    function list(e) {
       var values = $(this).val(),
               loader = $('#l_property_type'),
               c_property_type = $('#c_property_type'),
               property_type = $('#property_type');
       var start = function () {
                   c_property_type.show();
                   loader.fadeIn();
                   property_type.attr({
                       // disabled: true
                   });
                   var _ajx = $.post('/admin/post/postClassification', {
                       _token: csrf_token,
                       'classifications': values
                   });
                   _ajx.done(ajx);
               },
               ajx = function (_data) {
                   var d = $.map(_data, function (item) {
                       return {
                           id: item.id,
                           parent_id: item.parent_id,
                           text: item.department_name,
                       };
                   });

                   load(d);
               },
               load = function (_data) {
                   if(values == '')
                   {
                       var def = "<option value='default' default hidden >What's the type of the property?</option>";
                       def += '<option default disabled>Please choose property Classification to load property type</option>';
                       property_type.html(def).fadeIn(500);
                       // property_type.prepend(def);
                       loader.fadeOut();
                   }else{
                       property_type.show();
                       property_type.empty();
                       // var def = "<option value='default' default hidden >What's the type of the property?</option>";
                       if (!_data.length)
                           c_property_type.hide();

                       $.each(_data, function (i, v) {
                           var item = "<option  value=" + v.id + ">" + v.text + "</option>";
                           property_type.append(item);
                       });
                       property_type.prepend(def).attr({
                           disabled: false,
                       })


                       loader.fadeOut();
                   }

               };
       start();
   },
</script>
