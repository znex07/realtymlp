@extends('main.admin.base')

@section('content')
    <section id="main-content">
        <section class="wrapper">
            <h3>
                <i class="fa fa-angle-right"></i> Reports
            </h3>
            <div class="container">
            <div class="row">
            <div class="col-lg-6 mb">
                <button class="btn-block btn-theme btn-lg boom" onclick="window.open('/admin/reports/users','window1','width=1000, height=700')"><i class="fa fa-users"></i> USERS</button>
            </div>
            <div class="col-lg-6 mb">
                <button class="btn-block btn-theme02 btn-lg boom" onclick="window.open('/admin/reports/ledger','window1','width=1000, height=700')"><i class="fa fa-table"></i> LEDGER</button>
            </div>
            <div class="col-lg-6 mb">
                <button class="btn-block btn-theme03 btn-lg boom" onclick="window.open('/admin/reports/logs','window1','width=1000, height=700')"><i class="fa fa-clock-o"></i> LOGS</button>
            </div>
            <div class="col-lg-6 mb">
                <button class="btn-block btn-theme04 btn-lg boom" onclick="window.open('/admin/reports/properties','window1','width=1000, height=700')"><i class="fa fa-home"></i> PROPERTIES</button>
            </div>
            </div>

        </section>
    </section>

@endsection