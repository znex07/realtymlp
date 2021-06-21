@extends('main.dashboard.account.base')

@section('styles')
<style>
.button-green {
    border:2px solid #1abc9c;
    padding: 8px 21px;
    color: #1abc9c;
    margin: 5px;
}
.button-green:hover,
.button-green:active {
    color: #fff;
    background: #1abc9c;
    border-color: #1abc9c;
}
.button-red {
    border:2px solid #e74c3c;
    padding: 8px 21px;
    color: #fff;
    background-color: #e74c3c;
    margin: 5px;
}
.button-red:hover,
.button-red:active {
    color: #fff;
    background: #C0392B;
    border-color: #C0392B;

}
.title-margin {
    margin-bottom: 30px;
}
.panel-padding {
    padding: 25px;
}
.panel-success > .panel-heading {
    color: #ffffff;
    background-color: #18bc9c;
    border-color: #18bc9c;
}
.panel-primary .panel-body p {
    font-size: 17px;
    font-weight: 500;
} 
.text-muted {
    color: #888;
}
.text-primary {
    color: #34495E;
}
.invoice-title h2, .invoice-title h3 {
    display: inline-block;
}

.table > tbody > tr > .no-line {
    border-top: none;
}

.table > thead > tr > .no-line {
    border-bottom: none;
}

.table > tbody > tr > .thick-line {
    border-top: 2px solid;
}
.invoice-detail {
    font-weight: 400;
    margin: 0 0 0px;
    line-height: 1.7;
    font-size: 13px;
}
.invoice-total {
    width: 100%;
}
.invoice-total > tbody > tr > td:last-child {
    border-bottom: 1px solid #DDDDDD;
    width: 15%;
}
.invoice-total > tbody > tr > td {
    text-align: right;
    border-top: none;
}

</style>   
@endsection
@section('content.inner')
<div class="panel panel-default">
    <div class="panel-body panel-padding">
        <h6>Invoice </h6>
        <ul class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li><a href="/dashboard/account/index">Profile</a></li>
          <li><a href="/dashboard/account/ledger">Transaction History</a></li>
          <li class="active">Transaction No: {{$id}}</li>
        </ul>
        <hr>
        <div class="panel panel-default" id="print">
            <div class="panel-heading"> Transaction No: {{$id}}</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12">

                        <div class="row">
                            <div class="col-md-6">

                                <p>From:</p>
                                <p class="invoice-detail"><strong> {{$user->full_name}}</strong></p>
                                <p class="invoice-detail">User Code: {{$user->user_code}}</p>
                                <p class="invoice-detail">Email: {{$user->email}}</p>
                            </div>
                            <div class="col-md-6 text-right">

                                <p>To:</p>
                                <p class="invoice-detail"><strong>RealtyMLP.finance@gmail.com </strong></p>
                                <p class="invoice-detail">Room 201, Heart Building</p>
                                <p class="invoice-detail">7461 Bagtikan St. Makati City 1203,</p>
                                <p class="invoice-detail">Metro Manila, Philippines</p>
                                <p class="invoice-detail" style="margin-top:20px"><strong>Payment Method:</strong> Paypal <i class="fa fa-cc-paypal" aria-hidden="true"></i></p>
                                <p><strong>Invoice Date:</strong>
                                    @foreach($transaction as $transact)
                                    {{$transact->created_at->toDateString()}}
                                    @endforeach 
                                </p>
                            </div>
                            
                        </div>
                        {{-- <div class="row">
                            <div class="col-md-6">

                                <h6>Payment Method:</h6>
                                <h3>PayPal</h3>

                            </div>
                            <div class="col-md-6 text-right">
                                <h6>Order Date:</h6>
                                @foreach($transaction as $transact)
                                <p class="invoice-detail">{{$transact->created_at->toDateString()}}</p>
                                @endforeach
                            </div>
                        </div> --}}
                    </div>
                </div>
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th>Plan</th>                           
                            <th class="text-center">Quantity</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Tax</th>
                            <th class="text-right">Totals</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- foreach ($order->lineItems as $line) or some such thing here -->
                        <tr>
                            <td>6 Months Plan</td>
                            @foreach($transaction as $trans)        
                            <td class="text-center">1</td>
                            <td class="text-center">₱ {{$trans->total_payment}}.00</td>
                            <td></td>
                            <td class="text-right">₱ {{$trans->total_payment}}.00</td>
                            @endforeach
                        </tr>                         

                    </tbody>
                </table>
                <table class="table invoice-total">
                    <tbody>
                        <tr>
                            <td><strong>Sub Total :</strong></td>
                            <td>₱ {{$trans->total_payment}}.00</td>
                        </tr>
                        <tr>
                            <td><strong>TAX :</strong></td>
                            <td>₱ 0.00</td>
                        </tr>
                        <tr>
                            <td><strong>TOTAL :</strong></td>
                            <td>₱ {{$trans->total_payment}}.00</td>
                        </tr>
                    </tbody>
                </table>
                
            </div>
        </div>         
        <button class="btn btn-primary btn-sm pull-right" type="button" onclick="printDiv('print')"><i class="fa fa-print" aria-hidden="true"></i> Print Invoice</button>
    </div>
</div>


@endsection

@section('scripts')

<script type='text/javascript'>
function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
}
</script>
@endsection

