<div class="modal fade" id="adduser" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    <i class="fa fa-angle-right"></i> Add Users
                </h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal style-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Firstname</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Lastname</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Password</label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control">
                        </div>
                        <div class="col-sm-4">
                            <button class="btn btn-primary"><i class="fa fa-gear"></i> Generate Password</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal">
                    Close
                </button>
                <button type="button" class="btn btn-success">
                    <i class="fa fa-check"></i> Save
                </button>
            </div>
        </div>

    </div>

</div>



<!--footer end-->
</section>

<script src="/assets/adminjs/jquery.js"></script>
<script src="/assets/adminjs/jquery-1.8.3.min.js"></script>
<script src="/assets/adminjs/bootstrap.min.js"></script>
<script src="/assets/adminjs/Chart.min.js"></script>
<script class="include" type="text/javascript" src="/assets/adminjs/jquery.dcjqaccordion.2.7.js"></script>
<script src="/assets/adminjs/jquery.scrollTo.min.js"></script>
<script src="/assets/adminjs/jquery.nicescroll.js" type="text/javascript"></script>
<script src="/assets/adminjs/jquery.sparkline.js"></script>
<script src="/assets/adminjs/tcal.js"></script>


<!--common script for all pages-->
<script src="/assets/adminjs/common-scripts.js"></script>


<!--script for this page-->
<script src="/assets/adminjs/sparkline-chart.js"></script>
<script src="/assets/adminjs/zabuto_calendar.js"></script>

@yield('scripts')
<script type="application/javascript">
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


</body>
</html>
