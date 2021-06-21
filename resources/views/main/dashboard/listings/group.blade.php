<div class="row" style="padding-top: 20px;">
   <div class="col-md-12  listings-container" id="container_groups">
      <div id="post">
         {{-- */ $intab = 'groups' /* --}}
         {{-- */ $view_from = BLOWUP_FROM_GROUP /* --}}
         {{-- */ $tab = 'groups' /* --}}
         @foreach ($groups as $group)
            @foreach($group->properties as $property)
               {{-- */ $group_id = $group->id /* --}}
               @include('main.dashboard.listings.partial.property')
               <div class="pull-right">
                  <p class="text-muted" style="padding-right:15px;font-size:13px;font-weight:500;"><em>
                     posted to {{ $group->group_title }} , {{ $property->pivot->created_at->diffForHumans() }}</em>
                  </p>                               
               <div>
           @endforeach
           @endforeach
      </div>
   </div>
</div>