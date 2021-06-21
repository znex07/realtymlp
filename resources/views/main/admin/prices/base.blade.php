@extends('main.admin.base')

@section('styles')
    <link href='/assets/css/tabstyles.css' rel='stylesheet' />    
  	<link rel="stylesheet" href="/assets/css/alertify.css">
    <link rel="stylesheet" href="/assets/css/themes/default.css">
@endsection


@section('content')
<section id="main-content">
		<section class="wrapper">
			<div class="row">
				<div class="col-md-10">
					@yield('content.inner')
				</div>
			</div>
		</section>
</section>
@endsection


@section('script')
    <script>
    
        $('#example').DataTable();
        oTable = $('#AttributesList-table').dataTable({
    "aoColumnDefs": [
    {
        "aTargets": [ '_all' ],
        "mRender": function ( data, type, full ) {
            if(data!=null)
            {
                return '<div class="test" style="text-overflow:ellipsis;">'+data+'</div>';
            }
            else
            {
            return '';
            }
        }
    }
    ]
});

	$('.delete').click(function(e) {
        var id = $(this).data('id');
        var _token = $('#_token').val();
        console.log(id);
        alertify
		  .confirm("RealtyMLP" ,"Are you sure you want to delete?",
            function() {
                console.log(id);
                $.ajax ({
                    url: '/admin/prices/delete',
                    type: 'post',
                    data:{'_token': _token, 'id': id},
                    success: function(success) {
                         console.log(success + "success");
                        location.reload();
                    },
                    error: function(error) {
                        console.log(error + "error");
                    }
                });
		  },
            function() {
                console.log('cancel');
            }
          );
	});

    $('#add').click(function(e) {
        window.open('/admin/prices/new','mywindow','menubar=0,location=1,status=1,scrollbars=1,width=1000,height=500,left=0,top=0,screenX=50,screenY=100');
    });

    $('.edit').click(function (e) {
        var id = $(this).data('id');
        var name = $(this).data('name');

        window.open('/admin/prices/edit/{{ str_slug(' + name + ')}}/' + id,'mywindow1','menubar=0,location=1,status=1,scrollbars=1,width=1000,height=500,left=0,top=0,screenX=50,screenY=100');
    });
</script>

<script>
$(function() {
  $('.form-group').on('keydown', '.numbers_only', function(e){-1!==$.inArray(e.keyCode,[46,8,9,27,13,110,190])||/65|67|86|88/.test(e.keyCode)&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault()});
})
</script>
@endsection
