@extends('main.admin.reports.calendar_base')

@section('content')
    <section class="wrapper">
        <h4 class="mb"><i class="fa fa-angle-right"></i> Ledgers</h4>
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
                        <th>Date Registered</th>
                        <th>Type</th>
                        <th>Debit</th>
                        <th>Credit</th>
                        <th>Balance</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>08/31/2015</td>
                        <td>Free</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>09/01/2015</td>
                        <td>Premium</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
@endsection