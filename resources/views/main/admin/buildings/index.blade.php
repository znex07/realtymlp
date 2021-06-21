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
                        <button type="button" class="pull-right btn btn-theme" style="margin-right:50px;" data-toggle="modal" data-target="#addBuilding"><i class="fa fa-building"></i> Add Building</button>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-search"></i> </span>
                            <input type="text" name="txtSearch" class="form-control" placeholder="Search">
                        </div>
                    </div>

                    <div class="col-lg-1"></div>
                </div>

                <hr>
                <table class="table table-hover ">
                    <thead>
                    <tr>
                        <th>Building Name</th>
                        <th>Province</th>
                        <th>City/Municipality</th>
                        <th>Barangay</th>
                        <th>Street Address</th>
                        <th>Action</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($bldg as $bldgs)
                    <tr>
                        <td><strong style="color: #1F1F1F">{{$bldgs->bldg_name}}</strong></td>
                        <td>{{$bldgs->province_name}}</td>
                        <td>{{$bldgs->city_name}}</td>
                        <td>{{$bldgs->brgy}}</td>
                        <td>{{$bldgs->street_address}}</td>
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
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </section>
    <div class="modal fade" id="addBuilding" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addBuilding">Add Building</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="success-msg" class="hide">
                    <div class="alert alert-info alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <strong>Success!</strong> New Building added to database!!
                    </div>
                </div>
                <div class="modal-body">
                    <form method="POST" id="addDataBuilding">
                        {{csrf_field()}}
                    <div class="form-group" data-placement="top" data-trigger="hover focus" title="this is a required field" >
                        <label for="bldg_name">Building Name * (required)</label>
                        <input class="form-control" type="text" id="bldg_name" name="bldg_name" placeholder="Building Name" value=""  style="text-transform: capitalize" required />
                        <span class="text-danger">
                                <strong id="bldg_name-error"></strong>
                            </span>
                    </div>
                    <div class="form-group" data-placement="top" data-trigger="hover focus" title="this is a required field">
                        <label for="province">Province * (required)</label>
                        <select name="province" autocomplete="off" id="province" class="form-control"  required>
                            <option value="" hidden>Which province does it belong to?</option>
                            @foreach($locProvince as $l)
                                <option value="{{$l->id}}">{{$l->name}}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">
                                <strong id="province-error"></strong>
                            </span>
                    </div>
                    <div class="form-group" data-placement="top" data-trigger="hover focus" id="c_city" title="this is a required field" style="display:none;">
                        <label for="city" >City / Municipality * (required)</label>
                        <select name="city" autocomplete="off" id="city" class="form-control"  required>
                            <option value="" >Which city/municipality does it belong to?</option>
                        </select>
                        <span class="text-danger">
                                <strong id="city-error"></strong>
                            </span>
                    </div>
                    <div class="form-group" id="c_brgy" style="display: none">
                        <label for="brgy">Barangay</label>
                        <input type="text" autocomplete='off'  name="brgy" id="brgy" placeholder="What barangay is it in?" class="form-control enter" style="text-transform: capitalize">
                        <span class="text-danger">
                                <strong id="brgy-error"></strong>
                            </span>
                    </div>
                    <div class="form-group" id="c_street_address" style="display: none">
                        <label for="street_address">Street Address</label>
                        <input type="text" autocomplete='off'  class="form-control enter" name="street_address" id="street_address" placeholder="What's the street address?" style="text-transform: capitalize">
                        <span class="text-danger">
                                <strong id="street_address-error"></strong>
                            </span>
                    </div>
                        <div class="modal-footer">
                            <button type="button" id="addBuilding-submit" class="btn btn-primary">Add Buildings</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

