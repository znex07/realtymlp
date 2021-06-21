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
                        <h4><i class="fa fa-angle-right"></i> Mobile Database</h4>
                    </div>

                </div>

                <hr>
                <table class="table table-hover ">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Sender</th>
                        <th>Title</th>
                        <th>Listing Type</th>
                        <th>Condition Type</th>
                        <th>Description</th>
                        <th>Email</th>
                        <th>Mobile/Tel. no.</th>

                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>001A</td>
                        <td>Francis</td>
                        <td>Sample</td>
                        <td>For Rent</td>
                        <td>Brand new</td>
                        <td>Sample Description</td>
                        <td>sample@gmail.com</td>
                        <td>33333</td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </section>
    </section>
@endsection