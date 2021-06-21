@extends('main.dashboard.account.base')


@section('content.inner')
<div class="panel panel-default">
    <div class="panel-body panel-padding">
        <div class="row title">
            <div class="col-md-12">
                <h2>Transaction History </h2>
                <ul class="breadcrumb">
                  <li><a href="#">Home</a></li>
                  <li><a href="/dashboard/account/index">Profile</a></li>
                  <li class="active">Transaction History</li>
              </ul>
            </div>            
        </div>
        <hr>
        <div class="panel panel-default">
            <div class="panel-heading">Payment History</div>
            <div class="panel-body">
                <table id="example" class=" table display" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Transaction ID</th>
                            <th>Subscription Type</th>
                            <th>Added</th>
                            <th>Amount</th>
                            <th>Transaction Date</th>
                            <th>Expiration Date</th>
                        </tr>
                    </thead>

                    <tbody>
                    @foreach($sub_log as $sub)
                        <tr>

                                <td><a href="/dashboard/account/blowup/{{$sub->id}}">{{$sub->id}}</a></td>
                                <td>{{$sub->subscription_id}}</td>
                                <td>{{$sub->balance}}</td>
                                <td>{{$sub->total_payment}}</td>
                                <td>{{$sub->created_at}}</td>
                                <td>{{$sub->expires_at}}</td>

                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>                
        <hr>
    </div>
</div>

@endsection

@section('scripts')

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.10/js/dataTables.bootstrap.min.js"></script>
<script type='text/javascript'>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
@endsection