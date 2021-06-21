@extends('main.admin.base')

@section('content')
    <style>
        .table {
            table-layout:fixed;
        }

        .table td {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
    <section id="main-content">
        <section class="wrapper">
            <div class="content-panel">
                <div class="row">
                    <div class="col-lg-2">
                        <h4><i class="fa fa-angle-right"></i> Logs</h4>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-search"></i> </span>
                            <input type="text" name="txtSearch" class="form-control" placeholder="Search">
                        </div>
                    </div>
                    <label class="col-lg-1">Sort by:</label>
                    <div class="col-lg-2">

                        <select class="form-control">
                            <option>User Code</option>
                            <option>Name</option>
                            <option>Date and Time</option>
                            <option>IP Address</option>
                            <option>Activity</option>
                        </select>
                    </div>
                    <div class="col-lg-1"></div>
                </div>

                <hr>
                <table class="table table-hover ">
                    <thead>
                    <tr>
                        <th>User Code</th>
                        <th>Name</th>
                        <th>Date and Time</th>
                        <th>IP Address</th>
                        <th>Activity</th>

                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>000123</td>
                        <td>Eric Jun Locop</td>
                        <td>8/26/2015 15:05</td>
                        <td>192.168.1.1</td>
                        <td> </td>

                    </tr>
                    <tr>
                        <td>000124</td>
                        <td>Brian Inson</td>
                        <td>8/27/2015 20:05</td>
                        <td>192.168.1.2</td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td>000124</td>
                        <td>Joram Salinas</td>
                        <td>8/31/2015 04:05</td>
                        <td>192.168.1.3</td>
                        <td> </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </section>
@endsection