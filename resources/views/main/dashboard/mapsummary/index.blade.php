@extends('main.dashboard.mapsummary.base')
@section('styles')
@endsection
@section('og')
    <meta property="og:url"           content="http://www.your-domain.com/your-page.html" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="Your Website Title" />
    <meta property="og:description"   content="Your description" />
    <meta property="og:image"         content="http://realtymlp.com/{{$user->profile_image}}" />
@endsection
@section('content.inner')
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="col-md-12"> 
          <ul class="breadcrumb">      
            <li><a href="">Home</a></li>
            <li class="active">Map Summary</li>

          </ul>
          <hr>
          <div id="map" style="height:400px; background-color:#f6f6f6;"></div>

            <div class="fb-share-button" data-href="http://realtymlp.com/blowup/96?view_from=2" data-layout="button_count">

            </div>
            <div id="fb-root"></div>

        </div>
      </div>    
    </div>   
  </div>
</div>
@endsection

@section('scripts')

  <script language="javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBQrH-QxLK9hv9e_6GOzOHyKpyn74urg5k&v=3&libraries=drawing+geometry"　async defer></script>
  <script type='text/javascript' src='/assets/js/gmaps.js'></script>
  <script type='text/javascript' src='/assets/js/mapa.js'></script>
  <script>
      function initMap() {
          var myLatLng = {lat: 14.756578400000008, lng: 121.04497679999997};
        var  map = new google.maps.Map(document.getElementById('map'), {
              center: myLatLng,
              zoom: 15
          });
          var marker = new google.maps.Marker({
              position: myLatLng,
              map: map,
              title: 'Hello World!'
          });
      }
  </script>
  <script>
      $(function () {
          initMap();
      });


  </script>

  <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=1225751264207504";
          fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>


@endsection
