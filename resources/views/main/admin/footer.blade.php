{{-- <div class="modal fade" id="adduser" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form class="form-horizontal style-form" method="post" action="/admin/users/create">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    <i class="fa fa-angle-right"></i>  Add Users
                </h4>
            </div>
            <div class="modal-body">
                       <div class="form-group">
                           <label class="col-sm-2 col-sm-2 control-label">Firstname</label>
                           <div class="col-sm-10">
                               <input type="text" name="user_fname" class="form-control">
                           </div>
                       </div>
                       <div class="form-group">
                           <label class="col-sm-2 col-sm-2 control-label">Lastname</label>
                           <div class="col-sm-10">
                               <input type="text" name="user_lname" class="form-control">
                           </div>
                       </div>
                       <div class="form-group">
                           <label class="col-sm-2 col-sm-2 control-label">Email</label>
                           <div class="col-sm-10">
                               <input type="email" name="email" class="form-control">
                           </div>
                       </div>
                       <div class="form-group">
                           <div class="col-sm-10">
                               <input type="text" name="password" id="password" class="form-control hidden">
                           </div>
                       </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    Cancel
                </button>
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-check"></i> Save
                </button>
            </div>
        </div>

    </div>
    </form>
</div>

 --}}

<!--footer end-->
</section>

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
<script src="/assets/adminjs/addbuilding.js"></script>

<!--script for this page-->
<script src="/assets/adminjs/sparkline-chart.js"></script>
<script src="/assets/adminjs/zabuto_calendar.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.10/js/dataTables.bootstrap.min.js"></script>
<script src="/assets/js/alertify.js"></script>
<script>
    $('.subscription_expire').click(function (e) {
        var id = $(this).data('id');
        var _token = $('#_token').val();

        alertify
                .confirm("RealtyMLP", "Are you sure you want to expire?",
                        function () {
                            $.ajax({
                                url: '/admin/users/edit/expire',
                                type: 'post',
                                data: {'_token': _token, 'id' :id},


                                success: function (success) {

                                    console.log('success ' + success);
                                    alertify.alert('success');
                                    location.reload();
                                },
                                error: function (error) {
                                    console.log('error' + error);
//                                    location.reload();
//                                    alertify.alert('error');
                                }
                            });
                        },
                        function () {
                            console.log('cancel');
//                            preventDefault();
                        }
                );
    });

</script>

{{--<script src="/assets/adminjs/helperfunc.js"></script>--}}
@yield('script')




</body>
</html>
