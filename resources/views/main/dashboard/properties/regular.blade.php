@extends('main.dashboard.properties.base')
@section('styles')
<style>
.ownership {
  display: none;
} 
.public-button {
  display: none;
}
.panel-body .thumb-price,.thumb-dept {
  padding: 0px 15px 0px;
}
.thumb-dept p {
  font-size: 14px;
  font-weight: 600;
  margin-bottom: 1px;
  color: #888
}
.thumb-price p i {
  color: #c6c6c6;
  padding: 0 8px;
}
.thumb-img {
  padding: 0px;  
}

.panel-body .thumb-content {
  padding: 15px 15px 0px;
}
.panel-body .thumb-price, .thumb-location {
  padding: 0px 15px 0px;
}
.panel-body .thumb-tag {
  padding: 15px 15px 0px;
}
.thumb-content h6 {
  margin: 0 0 5px;
  font-size: 14pt;
}

.thumb-price hr {
  margin: 10px 0 10px;
}
.thumb-price p {
  font-size: 15px;
  font-weight: 400;
  margin-bottom: 1px;
}
.thumb-location p {
  font-size: 13px;
  font-weight: 400;
  margin-bottom: 1px;
  color: #888;
}
.thumb-price .text-muted {
  color: #888;
}
.thumb-table td {
  padding: 15px 10px 15px !important;
  font-size: 12px;
}
.thumb-table {
  margin-bottom: 0px;
}
.thumb-img:hover,
.thumb-img:active, {
  background-color: rgba(0,0,0, 0.5);
}
.ratio {
  background-position: center center;
  background-repeat: no-repeat;
  background-size: cover;
  height: 0;
  padding-bottom: 75%;
  position: relative;
  width: 100%;
}
.property-attr:not(:last-child):after {
  content: "  ";
  margin-right: 5px;
  margin-left: 5px;
  padding: 3px;
  font-size: 13px;
  font-weight: bolder;
  color: rgb(136, 136, 136);
}
</style>
@endsection
@section('content.inner')
  
      @include('main.dashboard.properties.regular-sort')

<div class="row">
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-9">      
        <div class="row">
          @if(sizeof($regulars) > 0)
          @foreach($regulars as $property)
              @include('main.dashboard.listings.partial.gridview')
          @endforeach

          @foreach($regulars as $property)
              @include('main.dashboard.listings.partial.public-listview')
          @endforeach
            {!! $regulars->render() !!}
          @else

           <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-body text-center">                
                <h3>
                  <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                  No results found, please try another.
                </h3>
                <p>
                  There are no results matching your search filters! 
                </p>
              </div>
            </div>  
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>

@endsection


@section('scripts')
<script>
$(function() {
  $('.list_public').click(function (e) {
    $('.list_view').show();
    $('.grid_view').hide();
  });
  $('.grid_public').click(function (e) {
    $('.list_view').hide();
    $('.grid_view').show();
    $('.grid_view').removeClass('visible-xs');
  });
  $('.nav-properties').addClass('accented-btn');
  $('.list_view').show();
});
$(function () {

            $('.property-attr').tooltip('hide');
        });
</script>

@endsection