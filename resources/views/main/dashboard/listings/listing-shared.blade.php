@section('styles')
<link rel="stylesheet" href="/assets/admincss/select2.min.css">
<link rel="stylesheet" href="/assets/css/dashboard/dashboard.css" >
<link rel="stylesheet" href="/assets/ionSlider/css/ion.rangeSlider.css" >
<link rel="stylesheet" href="/assets/ionSlider/css/ion.rangeSlider.skinFlat.css" >
<style>

  </style>
  @endsection

  <input type='hidden' id="_token" name='_token' value='{{ csrf_token() }}' />
  <section>
   <div class="tabs tabs-style-tzoid">
      <nav class="tab-mob">
        <ul>
          <li><a href="/dashboard" class="tab-fa fa fa-globe"><span>My Listings</span></a></li>
          <li class="tab-current"><a href="/dashboard/listing-shared" class="tab-fa fa fa-share-alt"><span>Shared To Me</span></a></li>
          <li><a href="/dashboard/listing-quick" class="tab-fa fa fa-bolt"><span>Quick Post</span></a></li>
          <li><a href="/dashboard/listing-group" class="tab-fa fa fa-users"><span>Groups</span></a></li>
        </ul>
      </nav>
      <section class="withfilter" style="background-color: #fff">
        @include('main.dashboard.listings.searches.sort-listings')
        @include('main.dashboard.listings.shared')
      </section>
  </div>
</section>

@include('main.dashboard.share')


@section('scripts')
<script src="/assets/js/cbpFWTabs.js"></script>
<script type='text/javascript' src='/assets/js/affiliates.js'></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.10/js/dataTables.bootstrap.min.js"></script>

{{-- wag papakialaman pls lang --}}
<script src="/assets/js/moment.js"></script>
<script src='/assets/js/helper/jq-extend.js'></script>
<script src='/assets/js/datum/affiliates.js'></script>
<script src='/assets/adminjs/select2.min.js'></script>
<script src='/assets/js/shared-users.js'></script>
<script src='/assets/js/property-sharing.js'></script>
<script src='/assets/js/dashboard.js'></script>
<script src='/assets/js/global.js'></script>

<script src="http://maps.googleapis.com/maps/api/js?v=3.21" type="text/javascript"></script>
<script type='text/javascript' src='/assets/js/gmaps.js'></script>
<script type='text/javascript' src='/assets/js/mapa.js'></script>
<script type='text/javascript' src='/assets/ionSlider/js/ion-rangeSlider/ion.rangeSlider.js'></script>
<script type='text/javascript' src='/assets/js/jquery.mixitup.js'></script>
<script type='text/javascript' src='/assets/js/isotope.min.js'></script>
<script>
$(function() {
  dashboard.init();
  sharing.init();
  shared.init();   
});
</script>
{{-- wag pakialaman ^ --}}

{{-- joram's script --}}
<script>
    $('#view_published').click(function (e) {
        var token = $('#_token').val();
        var property_code = $('#property_code').val();

        $.ajax (
            {
                url:'/dashboard/blowup/save_log',
                type: 'post',
                data: {"_token": token,"property_code": property_code, "action": "view_published"},
                success: function (success) {
                    console.log(success);
                },
                error: function (error) {
                    console.log(error);
                }
            }
        );
    });
    $('#sm-tab').on('change', function(e) {
      var val = $(this).find('option:selected').val();
      console.log(val)
      $('a[href=#'+val+']').parent().click()
    });

</script>
{{-- end joram's script --}}

{{-- francis scripts --}}

  <script type='text/javascript'>
  $.getScript('//cdn.jsdelivr.net/isotope/1.5.25/jquery.isotope.min.js',function(){

  /* activate jquery isotope */
  $('#posts').imagesLoaded( function(){
    $('#posts').isotope({
      itemSelector : '.item'
    });
  });

});
  $('#example').dataTable({
    "aoColumnDefs": [{
      'bSortable': false,
      'aTargets': [ 4 ]
    }]
  });
/*data tables*/

  // oTable = $('#AttributesList-table').dataTable({
  //   "aoColumnDefs": [
  //   {
  //     "aTargets": [ '_all' ],
  //     "mRender": function ( data, type, full ) {
  //       if(data!=null)
  //       {
  //         return '<div class="test" style="text-overflow:ellipsis;">'+data+'</div>';
  //       }
  //       else
  //       {
  //         return '';
  //       }
  //     }
  //   }
  //   ]
  // });
  $(function(){
$('.profile-usertitle-name').on('mouseover', function(e) {
  $('#user-edit').removeClass('hidden');
}).on('mouseout', function(e) {
  $('#user-edit').addClass('hidden');
});

    $('.alert-dismissible').fadeTo(4000,500, function() {
      $(this).alert('close');
    });

    alertify.set('notifier','position', 'top-right');

    var _token = $('input#_token').val();

    $(".cmd_move_to").click(function(e){
      var $this = $(this),
      to = $this.data('to'),
      id = $this.data('id'),
      $parent = $this.parents('div.panel').last().parent();
      alertify.confirm("RealtyMLP","Are you sure you want to move this to "+to+" ?",
        function(){
          $.ajax({
            url:"/dashboard/listings/action",
            type:"post",
            data:{"_token":_token,"to":to,"id":id},
            success: function(data) {
              if(data.response){
                alertify.success('Property Moved!',3);
                $parent.fadeOut(700);
                location.reload();
              }
            },
            error: function(err) {

            }
          });
        },
        function(){

        }
        );
    });

    $('.cmd_delete').click(function(e){
      var $this = $(this),
      id = $this.data('id'),
      $parent = $this.parents('div.panel').last().parent(),
      currTabpane = $('.tab-pane.active').attr('id');
      alertify.confirm("RealtyMLP","Are you sure you want to delete this property ?",
        function(){
          $.post('/dashboard/listings/delete',{"_token":_token,"id":id,'type' : currTabpane}).done(function(data){
            console.log(data);
            location.reload();
            $('#public').removeClass('content-current');
            $('a[href=#public]').parent().removeClass('tab-current');
            $('#'+type).addClass('content-current');
            $('a[href=#'+type+']').parent().addClass('tab-current');
          });
        },
        function(){

        }
        );
    });
    // $('.list_public').click(function (e) {
    //   $('.list_view').show();
    //   $('.grid_view').hide();
    // });
    // $('.grid_public').click(function (e) {
    //   $('.list_view').hide();
    //   $('.grid_view').show();
    // });
    // $('.poptab').width($('#poptab-container').parent().outerWidth() + 'px' );
  });
</script>
{{-- end francis' script --}}

{{-- dashboard sessions --}}
@if(session()->get('post.type'))
<script>


$(function(e) {
  var type = '{{ session()->get('post.type') }}';
  console.log(type);
  $('#listings').removeClass('content-current');
  $('a[href=#listings]').parent().removeClass('tab-current');
  $('#'+type).addClass('content-current');
  $('a[href=#'+type+']').parent().addClass('tab-current');

  $('.tab-fa:not(a[href=#'+type+'])').click(function(e) {
    $('a[href=#'+type+']').parent().removeClass('tab-current');
    $('#'+type).removeClass('content-current');
  });
});



</script>
@endif
{{-- end dashboard alerts --}}
@endsection
