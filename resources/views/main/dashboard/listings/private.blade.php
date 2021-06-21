<div class="row" style="padding-top: 20px;">
  <div class="col-md-12">
  	{{-- */ $intab = 'private' /* --}}
  	{{-- */ $tab = 'my_listings' /* --}}
    @foreach($private as $property)
      @include('main.dashboard.listings.partial.property')
    @endforeach
  </div>
</div>
