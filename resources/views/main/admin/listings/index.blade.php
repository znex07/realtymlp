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
                <h4><i class="fa fa-angle-right"></i> Listings </h4>
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
                            <option>Property ID</option>
                            <option>Listing Type</option>
                            <option>Property Type</option>
                            <option>Address</option>
                            <option>Status</option>
                        </select>
                    </div>
                    <div class="col-lg-1"></div>
                </div>

                <hr>
                <table class="table table-hover ">
                    <thead>
                    <tr>
                        <th>Property ID</th>
                        <th>Listing Type</th>
                        <th>Property Type</th>
                        <th>Title</th>
                        <th>Address</th>
                        <th>Posted by</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>000123</td>
                        <td>SALE</td>
                        <td>Residential</td>
                        <td>One Bedroom Unit One Bedroom Unit One Bedroom Unit One Bedroom Unit One Bedroom Unit</td>
                        <td>San Antonio Vill., Makati City San Antonio Vill., Makati City San Antonio Vill., Makati City</td>
                        <td>Joram Salinas</td>
                        <td>
                            <span class="label label-success">
                                Approved
                            </span>
                        </td>
                        <td>
                            <button class="btn btn-success btn-xs">
                                <i class="fa fa-check"></i>
                            </button>
                            <button class="btn btn-primary btn-xs">
                                <i class="fa fa-pencil"></i>
                            </button>
                            <button class="btn btn-danger btn-xs">
                                <i class="fa fa-ban"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>000124</td>
                        <td>SALE</td>
                        <td>Residential</td>
                        <td>One Bedroom Unit</td>
                        <td>Makati City</td>
                        <td>Joram Salinas</td>
                        <td>
                            <span class="label label-primary">
                                Pending
                            </span>
                        </td>
                        <td>
                            <button class="btn btn-success btn-xs">
                                <i class="fa fa-check"></i>
                            </button>
                            <button class="btn btn-primary btn-xs">
                                <i class="fa fa-pencil"></i>
                            </button>
                            <button class="btn btn-danger btn-xs">
                                <i class="fa fa-ban"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>000125</td>
                        <td>SALE</td>
                        <td>Residential</td>
                        <td>One Bedroom Unit</td>
                        <td>Makati City</td>
                        <td>Joram Salinas</td>
                        <td>
                            <span class="label label-danger">
                                Declined
                            </span>
                        </td>
                        <td>
                            <button class="btn btn-success btn-xs">
                                <i class="fa fa-check"></i>
                            </button>
                            <button class="btn btn-primary btn-xs">
                                <i class="fa fa-pencil"></i>
                            </button>
                            <button class="btn btn-danger btn-xs">
                                <i class="fa fa-ban"></i>
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </section>
@endsection
