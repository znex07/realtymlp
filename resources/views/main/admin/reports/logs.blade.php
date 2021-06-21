@extends('main.admin.reports.calendar_base')

@section('content')
    <section class="wrapper">
        <h4 class="mb"><i class="fa fa-angle-right"></i> Logs</h4>
        <div class="col-lg-4 col-sm-4">
            <form class="form-horizontal style-form" method="post">
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">From</label>
                    <div class="col-sm-10">
                        <input type="text" class="tcal form-control" name="txtFrom" placeholder="From">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">To</label>
                    <div class="col-sm-10">
                        <input type="text" class="tcal form-control" name="txtFrom" placeholder="To">
                    </div>
                </div>
            </form>
            <div class="row text-center">
                <button class="btn btn-default">
                    <i class="fa fa-print"></i> Print
                </button>
                <button class="btn btn-default" value="Close" onClick="self.close()">
                    <i class="fa fa-close"></i> Close
                </button>
            </div>
        </div>
        <div class="col-lg-8 col-sm-8">
            <div class="content-panel">
                <table class="table table-responsive">
                    <thead>
                    <tr>
                        <th>User Code</th>
                        <th>Fullname</th>
                        <th>Activity</th>
                        <th>Date and Time</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>01123</td>
                        <td>Francis Codinera</td>
                        <td>Login</td>
                        <td>01/09/2015 18:03</td>

                    </tr>
                    <tr>
                        <td>01123</td>
                        <td>Francis Codinera</td>
                        <td></td>
                        <td>01/09/2015 19:23</td>

                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
@endsection