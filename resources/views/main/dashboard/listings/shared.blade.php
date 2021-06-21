
<div class="row" style="padding-top: 20px;">
  <div class="col-md-12 listings-container" id="container_shared">
    {{-- */ $intab = 'shared' /* --}}
    {{-- */ $view_from = BLOWUP_FROM_AFFILIATE /* --}}
    {{-- */ $tab = 'shared' /* --}}
    @foreach($listings as $property)
        @include('main.dashboard.listings.partial.property')
    @endforeach
  </div>
</div>
