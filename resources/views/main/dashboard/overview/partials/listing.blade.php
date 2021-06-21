<form method="post" action="/dashboard" id="form_view_form">
  <div class="panel panel-default">
    <div class="panel-heading">
      Listings
      <span class="label label-warning pull-right"></span>
    </div>
    <div class="panel-body">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#my" data-toggle="tab" aria-expanded="true">My Listings</a></li>
        <li class=""><a href="#aff" data-toggle="tab" aria-expanded="true">Affiliates</a></li>
        <li class=""><a href="#group" data-toggle="tab" aria-expanded="false">Group</a></li>
      </ul>
      <div id="myTabContent" class="tab-content" style="margin-top:20px">
        <div class="tab-pane fade active in" style="overflow-y:scroll;height: 292px" id="my">
          @foreach($my_listing as $my)
            <div class="media">
              <a href="" class="pull-left"><img width="50px" height="50px" src="/avatars/{{$my->owner->profile_image}}" class="img-circle media-object" /></a>
              <div class="media-body">

                <small class="pull-right">{{$my->created_at->diffForHumans()}}</small>
                <small>
                <strong> You </strong> Created a listing. :
                
                </small>
                <br>
                <small>Property Code:<strong>{{$my->property_code}}</strong>.
                  </small>
              </div>
            </div>
            <hr>
          @endforeach
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" id="listing_view" name="listing_view" value="LISTINGS_VIEW_6 ">
            <div class="form-group-sm form-group">
              <button class="btn btn-primary btn-sm btn-embossed btn-block" type="submit" name="filter" id="filter">View More</button>
            </div>
        </div>
        <div class="tab-pane fade" style="overflow-y:scroll;height: 292px" id="aff">
          @foreach($aff_list as $aff)
            <div class="media">
              <a href="/blowup/{{ $aff->id}}?view_from=3" class="pull-left"><img width="50px" height="50px" src="/avatars/{{$aff->owner->profile_image}}" class="img-circle media-object" /></a>
              <div class="media-body">
                <p class="message">
                  <small class="pull-right">{{$aff->pivot->created_at->diffForHumans()}}</small>
                  <small>
                  <strong> {{$aff->owner->full_name}} </strong> shared listing to you. <br>Property Code:<strong>{{$aff->property_code}}</strong>.</small>
                </p>
                <small></small>

              </div>
            </div>
            <hr>
          @endforeach
          <a href="/dashboard" class="btn-embossed btn-primary btn btn-block btn-sm">View more</a>
        </div>

        <div class="tab-pane fade" style="overflow-y:scroll;height: 292px" id="group">
          @foreach($group as $property)
            @foreach($property->properties as $prop)

              <div class="media">
                <a href="/groups/{{ $property->id }}/{{ str_slug($property->group_title)}}" class="pull-left"><img width="50px" height="50px" src="/avatars/{{$prop->owner->profile_image}}" class="img-circle media-object" /></a>
                <div class="media-body">
                  <small class="pull-right"></small>
                  <strong>{{$prop->owner->full_name}}</strong> shared listing to <strong>{{$property->group_title}}</strong> group.
                  <p class="message">
                  </p>
                </div>
              </div>
              <hr>
            @endforeach
          @endforeach
          <a href="/dashboard" class="btn-primary btn btn-block btn-embossed btn-sm">View more</a>
        </div>
      </div>


    </div>
  </div>
</form>
