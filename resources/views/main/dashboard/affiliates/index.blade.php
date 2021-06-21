@extends('main.dashboard.affiliates.base')
@section('styles')
    <link href='/assets/css/affiliates.css'  rel='stylesheet' />
@endsection

@section('content.inner')
    @if(!auth()->user()->affiliates()->count())
       @include('main.dashboard.affiliates.partials.getting_started')
    @else
        @include('main.dashboard.affiliates.partials.list')
    @endif
    <div class='modal fade aff-modal' id='aff-modal'>
        <div class='modal-dialog modal-lg'>
            <div class='modal-content'>
                <div class='modal-body'>
                    <h3>Add An Affiliate
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </h3>

                    <div class='form-group'>
                        <input type='text' class='form-control' id='search-user' placeholder='Search a user to add' />
                    </div>
                    <div class='aff-loader text-center' style='display: none;'>
                        <span class='fa fa-spin fa-circle-o-notch'></span>
                    </div>
                    <div class='aff-card-container' style='display:none;'>
                        <div class='aff-card row'>
                            <div class='col-xs-2'>
                                <img src='/avatars/basic.jpg' class='img-circle img-responsive aff-image' />
                            </div>
                            <div class='col-xs-10'>
                                <h3 class='aff-name'>Mark Perdon</h3>
                                <div class='text-right'>
                                    <button class='btn btn-primary' data-affiliate-id='' id='add_as_affiliate' onclick="affiliate.add_affiliate(this)">Add as Affiliate</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
@endsection

@section('scripts')
    <script type='text/javascript' src='/assets/js/datum/nonaffiliates.js'></script>
    <script type='text/javascript' src='/assets/js/affiliates.js'></script>
    <script type='text/javascript' src='/assets/js/helper/jq-extend.js'></script>
    
    <script type='text/javascript'>
        var length = $('.affiliates-container').length;

    // if(length) {
            affiliate.init();
        console.log(length);
        // }
        
        var sort = $.getUrlVar('sortby') || 'user_fname',
            order = $.getUrlVar('orderby');
        if (order) {
            $('a.sort').removeClass('active');
            $('a.sort .orderer').removeClass('active');
            $('a.sort[data-sort='+sort+']').addClass('active');
            $('a.sort[data-sort='+sort+']').find('.orderer').find('.'+order).parent().addClass('active');
            $('a.sort[data-sort='+sort+']').find('.orderer i').removeClass('hidden');
            $('a.sort[data-sort='+sort+']').find('.orderer i.'+order).addClass('hidden');
            if (order === 'desc') {
                $('a.sort[data-sort='+sort+']').attr({
                    href: '?sortby='+sort+'&orderby=asc'
                });
            }
            else if (order === 'asc') {
                $('a.sort[data-sort='+sort+']').attr({
                    href: '?sortby='+sort+'&orderby=desc'
                });
            }
        }







    </script>

<script type="text/javascript">
var $tableIndex = $('#tableAff').DataTable( {
  "columns": [
    { "orderable": false },
    null,
    null,
    null,
    null,
    { "orderable": false }
  ]
} );

$('.dataTables_filter').find('input').attr({
    placeholder: 'Search'
}).addClass('form-control input-sm');
// $('.dataTables_filter').find('label').remove();
// $('.dataTables_filter').html(
//     '<div class="form-group">'+
//         '<div class="input-group ">'+
//             '<input class="form-control" id="navbarInput-01" type="search" placeholder="Search">'+
//             '<span class="input-group-btn" style="width: auto;">'+
//             '<button type="submit" class="btn"><span class="fui-search"></span></button>'+
//             '</span>'+
//         '</div>'+
//     '</div>'
// );
$('.dataTables_filter').find('#navbarInput-01').on('input', function(e) {
    $tableIndex.search($(this).val()).draw() ;
});
$('.dataTables_length').find('select').addClass('form-control');
$('.dataTables_paginate').find('select').addClass('form-control');
// (function () {
//     $('#').dataTable({
//         "paging": false,
//         "filter": false,
//         "order": [
//         [0, "desc"]
//     ]
// });

</script>
@endsection
