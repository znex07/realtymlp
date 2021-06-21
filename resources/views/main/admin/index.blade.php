@extends('main.admin.base')

@section('content')
    <section id="main-content">
        <section class="wrapper">

            <div class="row">
                <div class="col-lg-9 main-chart">
                    <div class="row mtbox">
                        <div class="col-md-2 col-sm-2 col-md-offset-1 box0">
                            <a href="/admin/users/">
                            <div class="box1" style="cursor: pointer;">
                               <span class="li_user"></span>
                                    <h3>{{ $count  }}</h3>

                            </div>
                            </a>
                            <p>{{ $count }} people registered on our website.</p>
                        </div>
                        <div class="col-md-2 col-sm-2 box0">
                            <a href="/admin/listings/">
                            <div class="box1" style="cursor: pointer;">
                                <span class="li_vallet"></span>
                                <h3>3</h3>
                            </div>
                            </a>
                            <p>people posted listings on our website </p>
                        </div>
                        <div class="col-md-2 col-sm-2 box0">
                            <div class="box1" style="cursor: pointer;">
                                <span class="li_lock"></span>
                                <h3>23</h3>
                            </div>
                            <p>You have 23 pending approval for posting property</p>
                        </div>
                        <div class="col-md-2 col-sm-2 box0">
                            <div class="box1" style="cursor: pointer;">
                                <span class="li_news"></span>
                                <h3>+10</h3>
                            </div>
                            <p>There are 10 people subscribe on our newsletter</p>
                        </div>
                        <div class="col-md-2 col-sm-2 box0">
                            <div class="box1" style="cursor: pointer;">
                                <span class="li_data"></span>
                                <h3>OK!</h3>
                            </div>
                            <p>Your database is working properly.</p>
                        </div>

                    </div><!-- /row mt -->


                    <div class="row mt">
                        <!--CUSTOM CHART START -->
                        <div class="border-head">
                            <h3>VISITS</h3>
                        </div>
                        <div class="custom-bar-chart">
                            <ul class="y-axis">
                                <li><span>10.000</span></li>
                                <li><span>8.000</span></li>
                                <li><span>6.000</span></li>
                                <li><span>4.000</span></li>
                                <li><span>2.000</span></li>
                                <li><span>0</span></li>
                            </ul>
                            <div class="bar">
                                <div class="title">JAN</div>

                                <div class="value tooltips" data-original-title="8.500" data-toggle="tooltip" data-placement="top">85%</div>
                            </div>
                            <div class="bar ">
                                <div class="title">FEB</div>
                                <div class="value tooltips" data-original-title="5.000" data-toggle="tooltip" data-placement="top">50%</div>
                            </div>
                            <div class="bar ">
                                <div class="title">MAR</div>
                                <div class="value tooltips" data-original-title="6.000" data-toggle="tooltip" data-placement="top">60%</div>
                            </div>
                            <div class="bar ">
                                <div class="title">APR</div>
                                <div class="value tooltips" data-original-title="4.500" data-toggle="tooltip" data-placement="top">45%</div>
                            </div>
                            <div class="bar">
                                <div class="title">MAY</div>
                                <div class="value tooltips" data-original-title="3.200" data-toggle="tooltip" data-placement="top">32%</div>
                            </div>
                            <div class="bar">
                                <div class="title">JUN</div>
                                <div class="value tooltips" data-original-title="6.200" data-toggle="tooltip" data-placement="top">62%</div>
                            </div>
                            <div class="bar">
                                <div class="title">JUL</div>
                                <div class="value tooltips" data-original-title="7.500" data-toggle="tooltip" data-placement="top">75%</div>
                            </div>
                        </div>
                        <!--custom chart end-->
                    </div><!-- /row -->


                    <div class="row mt">
                        <!--CUSTOM CHART START -->
                        <div class="border-head">
                            <h3>User</h3>

                        </div>
                        <div class="myChartWrapper">
                            <canvas id="myChart" width="800" height="400"></canvas>
                        </div><!--custom chart end-->
                    </div><!-- /row -->

                </div><!-- /col-lg-9 END SECTION MIDDLE -->




                <div class="col-lg-3 ds">
                    <!--COMPLETED ACTIONS DONUTS CHART-->
                    <h3>NOTIFICATIONS</h3>

                    <!-- First Action -->
                    <div class="desc">
                        <div class="thumb">
                            <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                        </div>
                        <div class="details">
                            <p><muted>2 Minutes Ago</muted><br/>
                                <a href="#">James Brown</a> subscribed to your newsletter.<br/>
                            </p>
                        </div>
                    </div>
                    <!-- Second Action -->
                    <div class="desc">
                        <div class="thumb">
                            <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                        </div>
                        <div class="details">
                            <p><muted>3 Hours Ago</muted><br/>
                                <a href="#">Diana Kennedy</a> purchased premium subscription.<br/>
                            </p>
                        </div>
                    </div>
                    <!-- Third Action -->
                    <div class="desc">
                        <div class="thumb">
                            <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                        </div>
                        <div class="details">
                            <p><muted>7 Hours Ago</muted><br/>
                                <a href="#">Brandon Page</a> purchased premium subscription.<br/>
                            </p>
                        </div>
                    </div>
                    <!-- Fourth Action -->
                    <div class="desc">
                        <div class="thumb">
                            <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                        </div>
                        <div class="details">
                            <p><muted>11 Hours Ago</muted><br/>
                                <a href="#">Mark Twain</a> Follow us on twitter.<br/>
                            </p>
                        </div>
                    </div>
                    <!-- Fifth Action -->
                    <div class="desc">
                        <div class="thumb">
                            <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                        </div>
                        <div class="details">
                            <p><muted>18 Hours Ago</muted><br/>
                                <a href="#">Daniel Pratt</a> purchased premium subscription.<br/>
                            </p>
                        </div>
                    </div>

                    <!-- USERS ONLINE SECTION -->
                    <h3>New Users</h3>
                    <!-- First Member -->
                    <div class="desc">
                        <div class="thumb">
                            <img class="img-circle" src="../img/2.jpg" width="35px" height="35px" align="">
                        </div>
                        <div class="details">
                            <p><a href="#">Ron Brian</a><br/>
                                <muted>Broker</muted>
                            </p>
                        </div>
                    </div>
                    <!-- Second Member -->
                    <div class="desc">
                        <div class="thumb">
                            <img class="img-circle" src="../img/1.jpg" width="35px" height="35px" align="">
                        </div>
                        <div class="details">
                            <p><a href="#">Joram Salinas</a><br/>
                                <muted>Buyer</muted>
                            </p>
                        </div>
                    </div>
                    <!-- Third Member -->
                    <div class="desc">
                        <div class="thumb">
                            <img class="img-circle" src="../img/3.jpg" width="35px" height="35px" align="">
                        </div>
                        <div class="details">
                            <p><a href="#">Eric Jun Locop</a><br/>
                                <muted>Broker</muted>
                            </p>
                        </div>
                    </div>
                    <!-- Fourth Member -->
                    <div class="desc">
                        <div class="thumb">
                            <img class="img-circle" src="../img/4.jpg" width="35px" height="35px" align="">
                        </div>
                        <div class="details">
                            <p><a href="#">Francis Neil Codinera</a><br/>
                                <muted>Buyer</muted>
                            </p>
                        </div>
                    </div>
                    <!-- Fifth Member -->
                    <div class="desc">
                        <div class="thumb">
                            <img class="img-circle" src="../img/5.jpg" width="35px" height="35px" align="">
                        </div>
                        <div class="details">
                            <p><a href="#">Mark Perdon</a><br/>
                                <muted>Buyer</muted>
                            </p>
                        </div>
                    </div>

                    <!-- CALENDAR-->
                    <div id="calendar" class="mb">
                        <div class="panel green-panel no-margin">
                            <div class="panel-body">
                                <div id="date-popover" class="popover top" style="cursor: pointer; disadding: block; margin-left: 33%; margin-top: -50px; width: 175px;">
                                    <div class="arrow"></div>
                                    <h3 class="popover-title" style="disadding: none;"></h3>
                                    <div id="date-popover-content" class="popover-content"></div>
                                </div>
                                <div id="my-calendar"></div>
                            </div>
                        </div>
                    </div><!-- / calendar -->

                </div><!-- /col-lg-3 -->
            </div><!--/row -->
        </section>
    </section>
@endsection
@section('script')
<script type="application/javascript">
    {{--var lowercase = 'abcdefghijklmnopqrstuvwxyz';--}}
    {{--var uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';--}}
    {{--var numbers = '0123456789';--}}

    {{--var all = lowercase + uppercase + numbers;--}}

    {{--String.prototype.pick = function(min, max) {--}}
        {{--var n, chars = '';--}}

        {{--if (typeof max === 'undefined') {--}}
            {{--n = min;--}}
        {{--} else {--}}
            {{--n = min + Math.floor(Math.random() * (max - min));--}}
        {{--}--}}

        {{--for (var i = 0; i < n; i++) {--}}
            {{--chars += this.charAt(Math.floor(Math.random() * this.length));--}}
        {{--}--}}

        {{--return chars;--}}
    {{--};--}}


    {{--// Credit to @Christoph: http://stackoverflow.com/a/962890/464744--}}
    {{--String.prototype.shuffle = function() {--}}
        {{--var array = this.split('');--}}
        {{--var tmp, current, top = array.length;--}}

        {{--if (top) while (--top) {--}}
            {{--current = Math.floor(Math.random() * (top + 1));--}}
            {{--tmp = array[current];--}}
            {{--array[current] = array[top];--}}
            {{--array[top] = tmp;--}}
        {{--}--}}

        {{--return array.join('');--}}
    {{--};--}}

        {{--var password = (lowercase.pick(1) + uppercase.pick(1) + all.pick(3, 10)).shuffle();--}}
        {{--$('#password').val(password);--}}


    $(document).ready(function () {
        $("#date-popover").popover({html: true, trigger: "manual"});
        $("#date-popover").hide();
        $("#date-popover").click(function (e) {
            $(this).hide();
        });

        $("#my-calendar").zabuto_calendar({
            action: function () {
                return myDateFunction(this.id, false);
            },
            action_nav: function () {
                return myNavFunction(this.id);
            },
            ajax: {
                url: "show_data.php?action=1",
                modal: true
            },
            legend: [
                {type: "text", label: "Special event", badge: "00"},
                {type: "block", label: "Regular event", }
            ]
        });
    });


    function myNavFunction(id) {
        $("#date-popover").hide();
        var nav = $("#" + id).data("navigation");
        var to = $("#" + id).data("to");
        console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
</script>

<script type="application/javascript">
    var data = {
        labels: ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL"],
        datasets: [{
            label: "My First dataset",
            fillColor: "rgba(254, 133, 92, 1)",
            highlightFill: "rgba(100,100,100,1)",
            data: [8000, 5000, 3000, 5000, 9000, 8000, 6000]
        },{
            label: "My Second dataset",
            fillColor: "rgba(92, 254, 133, 1)",
            highlightFill: "rgba(100,100,100,1)",
            data: [5000, 3000, 5000, 9000, 8000, 6000, 8000]
        }]
    };

    var ctx = document.getElementById("myChart").getContext("2d");
    var myNewChart = new Chart(ctx).Bar(data, {
        scaleOverride: true,
        barValueSpacing : 30,
        scaleSteps: 5,
        scaleStepWidth: 2000,
        scaleStartValue: 0,
    });
</script>
@endsection
