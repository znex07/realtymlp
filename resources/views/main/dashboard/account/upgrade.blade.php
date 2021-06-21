@extends('main.dashboard.account.base')

@section('styles')
<style>
.button-green {
    border: 2px solid #1abc9c;
    padding: 8px 21px;
    color: #1abc9c;
    margin: 5px;
}

.button-green:hover,
.button-green:active {
    color: #fff;
    background: #1abc9c;
    border-color: #1abc9c;
}

.button-red {
    border: 2px solid #e74c3c;
    padding: 8px 21px;
    color: #fff;
    background-color: #e74c3c;
    margin: 5px;
}

.button-red:hover,
.button-red:active {
    color: #fff;
    background: #C0392B;
    border-color: #C0392B;

}

.title-margin {
    margin-bottom: 30px;
}

.panel-padding {
    padding: 25px;
}

.regular {
    font-weight: normal;
}

.list-group-item {
    background-color: transparent;
    font-size: 14px;
}

.tile {
    text-align: justify;
    font-weight: 400;
}

.tile hr {
    border-top: 1px solid #bdc3c7;
}

.tile-title {
    padding: 10px;

}

.upgrade p {
    line-height: 1.4;
    font-size: 17px;
    margin: 0px 0px 35px;

    font-weight: lighter;
}

.upgrade p small {
    line-height: 1.4;
    font-size: 16px;
    margin: 0px 0px 35px;
    color: #77909b;
    font-weight: lighter;
}

.list-group .active {
    background-color: #1abc9c;
    border-color: #1abc9c;
}

.list-group-item.active, .list-group-item.active:hover, .list-group-item.active:focus {
    background-color: #1abc9c;
    border-color: #1abc9c;
}

.list-group-item {
    color: #aeaeae;
}
</style>
@endsection
@section('content.inner')
<div class="panel panel-default">
    <div class="panel-body panel-padding">
        <div class="row">
            <div class="col-md-12">
                <h2>
                    Upgrade
                    @include('main.dashboard.account.partials.subs-badge')
                </h2>

                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Profile</a></li>
                    <li class="active">Upgrade</li>
                </ul>
                <hr>
            </div>

                @foreach($subscription as $sub)

                    <div class="col-md-4">
                        <div class="list-group text-center">
                            <h3 class="list-group-item active"> {{ $sub->name }} </h3>
                            <li class="list-group-item"><strong class="text-primary">
                                &#8369; {{ $sub->price }}</strong> / month
                            </li>
                            <li class="list-group-item"><strong>{{ $sub->listings}}</strong>
                                Listings
                            </li>
                            <li class="list-group-item"><strong>{{ $sub->affiliates }}</strong>
                                Affiliates
                            </li>
                            <li class="list-group-item"><strong><!-- {{ $sub->shared_to_me }} --></strong>
                                Received listings from share
                                feature
                            </li>
                            @if($sub->single_msg == 'Yes')
                            <li class="list-group-item">Single Messaging</li>
                            @endif
                            @if($sub->group_msg == 'Yes')
                            <li class="list-group-item">Group Messaging</li>
                            @endif
                            @if($sub->library == 'Yes')
                            <li class="list-group-item">Real Estate Library</li>
                            @endif
                            <li class="list-group-item"><strong>{{ $sub->group }}</strong> Group
                                Subscription
                            </li>

                            @if( $sub->name == $subscription_name && $sub->name != 'Free')
                            <li class="list-group-item">
                                <form action="#" method="get">
                                    <a href="/dashboard/account/payment/pay/{{ $sub->name }}" class="btn btn-primary btn-xs">Subscribe</a>
                                </form>
                            </li>
                            @elseif( $sub->name == 'Free')
                            <li class="list-group-item">
                                <form action="#" method="get">
                                    <label class="btn btn-secondary btn-block btn-xs">Free</label>
                                </form>
                            </li>
                            @else
                            <li class="list-group-item">
                                <form action="#" method="get">
                                    <a href="/dashboard/account/payment/pay/{{ $sub->name }}" class="btn btn-primary btn-xs">Subscribe</a>


                                </form>
                            </li>
                            @endif

                        </div>
                    </div>
            @endforeach
        </div>
    </div>
</div>



                {{--<div class="row">--}}
                    {{--<div class="col-md-12">--}}
                        {{--<!-- Controls -->--}}
                        {{--<div class="hidden-xs text-center">--}}
                            {{--<a class="left fa fa-chevron-left btn btn-default" href="#carousel-example"--}}
                            {{--data-slide="prev"></a>--}}
                            {{--<a class="right fa fa-chevron-right btn btn-default" href="#carousel-example"--}}
                            {{--data-slide="next"></a>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                {{--</div>--}}

            @endsection


            @section('scripts')
            <script>
            $('#btnPremium').click(function (e) {
                window.location.href = '/dashboard/account/payment';
            })

            $('#btnPremiumPlus').click(function (e) {
                window.location.href = '/dashboard/account/payment';
            });

            $('.carousel').carousel({
                interval: false
            });
            </script>


            @endsection
