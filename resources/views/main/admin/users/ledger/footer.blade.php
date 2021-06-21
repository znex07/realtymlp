<footer class="site-footer">
    <div class="text-center">
    </div>
</footer>
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


<!--common script for all pages-->
<script src="/assets/adminjs/common-scripts.js"></script>
<script src="/assets/adminjs/tcal.js"></script>


<!--script for this page-->
<script src="/assets/adminjs/sparkline-chart.js"></script>
<script src="/assets/adminjs/zabuto_calendar.js"></script>


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
<script src="/assets/adminjs/jquery.backstretch.min.js"></script>
<script>
    $.backstretch("public/img/login-bg2.jpg", {speed: 500});
</script>

</body>
</html>
