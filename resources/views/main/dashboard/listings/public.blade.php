<div class="row" style="padding-top: 20px;">
    <div id="container_my_listing" class="col-md-12 listings-container">
        <div class="row">
            <?php $cntr = 0 ?>
            @foreach($listings as $property)
                @include('main.dashboard.listings.partial.listview')
            @endforeach
            @foreach($listings as $property)
                @include('main.dashboard.listings.partial.gridview')
            @endforeach
        </div>
    </div>
</div>
