@extends('main.admin.base')

@section('content')    
    <section id="main-content">
        <section class="wrapper">
            <div class="content-panel">                                    
                    <h4 class="mb"><i class="fa fa-angle-right"></i> Subscription Logs</h4>
                <hr>
                <div class="panel-body">
                <table id="example" class="table display" cellspacing="0" width="100%" style="font-size: 14px;">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>User ID</th>
                        <th>Subscription ID</th>
                        <th>Remaining days</th>
                        <th>Total Payment</th>
                        <th>Subscription Date</th>
                        <th>Expiration Date</th>


                    </tr>
                    </thead>
                    <tbody>                                               
                        @foreach($sub_log as $subs_log)
                        <tr style="cursor: pointer;"> 
                            <td>{{ $subs_log->id }}</td>
                            <td>{{ $subs_log->user_id }}</td>
                            <td>{{ $subs_log->subscription_id }}</td>
                            <td>{{ $subs_log->expires_at->diffInDays()}}</td>
                            <td>{{ $subs_log->total_payment }}</td>
                            <td>{{ $subs_log->created_at }}</td>
                            <td>{{ $subs_log->expires_at }}</td>
                        </tr> 
                        @endforeach
                    </tbody>       
                </table>
                </div>
            </div>
        </section>
    </section>
@endsection
@section('script')
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
@endsection