@section('styles')
    <link rel="stylesheet" href="/assets/admincss/select2.min.css">
    <link rel="stylesheet" href="/assets/css/dashboard/dashboard.css">
    <link rel="stylesheet" href="/assets/ionSlider/css/ion.rangeSlider.css">
    <link rel="stylesheet" href="/assets/ionSlider/css/ion.rangeSlider.skinFlat.css">
    <style>
    .select2-container {
        width: 100% !important;
    } 
    .box {
        display: none;
    }   
    </style>
@endsection
<input type='hidden' id="_token" name='_token' value='{{ csrf_token() }}'/>
<section>
    <div class="tabs tabs-style-tzoid">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="/dashboard/overview">Overview</a></li>
                        <li class="active">Listings</li>
                        <div class="pull-right"><strong id='listings_counter'>{{ $available_listings }}
                                / {{ $total_listings }} My Listings</strong></div>
                    </ul>
                    <hr>
                
                    @include('main.dashboard.listings.searches.sort-listings')
                    @include('main.dashboard.listings.public')
                    @if($listing_view != LISTINGS_VIEW_4)
                    <ul class="pagination pull-right">
                        @if($sorting == 'desc')
                            {!! $listings->appends(['sort'=>'desc'])->render() !!}
                        @endif
                        @if($sorting == 'asc')
                            {!! $listings->appends(['sort'=>'asc'])->render() !!}
                        @endif
                    </ul>
                    @endif
            </div>
        </div>
    </div>
        </div>
</section>

@include('main.dashboard.share')


@section('scripts')
    <script src="/assets/js/cbpFWTabs.js"></script>
    <script type='text/javascript' src='/assets/js/affiliates.js'></script>
    <script type="text/javascript" charset="utf8"
            src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8"
            src="https://cdn.datatables.net/1.10.10/js/dataTables.bootstrap.min.js"></script>
    <script src="/assets/js/moment.js"></script>
    <script src='/assets/js/helper/jq-extend.js'></script>
    <script src='/assets/js/datum/affiliates.js'></script>
    <script src='/assets/adminjs/select2.min.js'></script>
    <script src='/assets/js/shared-users.js'></script>
    <script src='/assets/js/property-sharing.js'></script>
    {{--<script src='/assets/js/affiliate-share.js'></script>--}}
    <script src='/assets/js/affiliate-share.js'></script>
    <script src='/assets/js/dashboard.js'></script>
    <script src='/assets/js/listings.js'></script>
    <script src='/assets/js/global.js'></script>

    {{--<script src="http://maps.googleapis.com/maps/api/js?v=3.21" type="text/javascript"></script>--}}
    <script type='text/javascript' src='/assets/js/gmaps.js'></script>
    <script type='text/javascript' src='/assets/js/mapa.js'></script>
    <script type='text/javascript' src='/assets/ionSlider/js/ion-rangeSlider/ion.rangeSlider.js'></script>
    <script type='text/javascript' src='/assets/js/jquery.mixitup.js'></script>
    <script type='text/javascript' src='/assets/js/isotope.min.js'></script>    

    <script>
    
    
        //        MarkPerdon's Script july 13, 2016
        //        disable add listings
        var available_listings = {{ $available_listings }};
        var total_listings = {{ $total_listings }};

        if (available_listings >= total_listings) {
            $('#listings_counter').addClass('text-danger');
            var message = "You have already used your "
                    + total_listings
                    + " listings as free user, Do you want to upgrade your account to add more listings?"
            alertify.confirm("Attention", message, function (e) {
                window.location.href = '/dashboard/account/upgrade';
            }, function () {
            }).set('labels', {ok:'Yes', cancel:'Later'});
        }
        else {
            $('#add-listing').removeClass('disabled');
            $('#listings_counter').removeClass('text-danger');

        }


        $(function () {
            dashboard.init();
            listings.init();
            affshare.init();
            sharing.init();
            shared.init();
            $('[data-toggle="tooltip"]').tooltip("show");
            $(".tooltip.fade.top").remove();
        });
        $(".cmd_unshare").click(function (e) {
            // sharing.detachListing();
        });

    </script>

    {{-- joram's script --}}
    <script>
        $('#view_published').click(function (e) {
            var token = $('#_token').val();
            var property_code = $('#property_code').val();
            $.ajax({
                url: '/dashboard/blowup/save_log',
                type: 'post',
                data: {
                    "_token": token,
                    "property_code": property_code,
                    "action": "view_published"
                },
                success: function (success) {
                    console.log(success);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });
        $('#sm-tab').on('change', function (e) {
            var val = $(this).find('option:selected').val();
            console.log(val)
            $('a[href=#' + val + ']').parent().click()
        });
    </script>
    {{-- end joram's script --}}


    {{--perdon script june/24/2016--}}

    <script>
        $(function () {
            var show = 0;
            var sort = '{{ $sorting }}';
            $('.changeview').click(function (e) {
                if (show == 0) {
                    $('.list_view').hide();
                    $('.grid_view').show();
                    show = 1;
                } else {
                    $('.list_view').show();
                    $('.grid_view').hide();
                    show = 0;
                }
            });
            $('.oldnew').click(function (e) {
                console.log('sort:' + sort);
                if (sort == 'asc') {
                    window.location.replace('/dashboard?sort=desc&page=1');
                } else {
                    window.location.replace('/dashboard?sort=asc&page=1');
                }
            })
        });
        
        </script>
       <script>
       $(':radio').radiocheck();
       $(':checkbox').radiocheck();
       </script>
    

    {{-- end dashboard alerts --}}
@endsection
