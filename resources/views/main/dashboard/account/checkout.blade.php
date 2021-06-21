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
</style>
@endsection   
@section('content.inner')
<div class="panel panel-default">
    <div class="panel-body panel-padding">
        <h6>Billing Address</h6>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" name="user_fname" class="form-control" placeholder="Firstname">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" name="user_lname" class="form-control" placeholder="Lastname">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" name="email" class="form-control" placeholder="Email">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" name="user_mobile" class="form-control" placeholder="Contact No.">
                </div>
            </div>
        </div>
        <div class="form-group">
            <textarea type="text" name="current_address" style="height: 100px; resize: none;" class="form-control" placeholder="Current Address"></textarea>
        </div>

        <hr>
        <div class="row">
          <div class="col-md-6">  
              <h6>Payment Method</h6>                  
              <div class="form-group">
                <label for="inputcardno" class="control-label col-md-12">Card Number</label>
                <div class="col-md-8">
                  <div class="input-group">
                      <input class="form-control" id="navbarInput-01" type="search" placeholder="1111 2222 3333 4444">
                      <span class="input-group-btn">
                        <button class="btn"><span class="fa fa-lock"></span></button>
                    </span>
                </div>
            </div>
            <div class="col-md-4">
              <i class="fa fa-cc-amex"></i> <i class="fa fa-cc-visa"></i> <i class="fa fa-cc-mastercard"></i> <i class="fa fa-credit-card"></i>
          </div>
      </div>                  
      <div class="form-group">
        <label for="sel1" class="col-md-12">Expiry date:</label>
        <div class="col-md-6">
          <select class="form-control col-md-6" id="sel1">
            <option>Month</option>
            <option>01</option>
            <option>02</option>
            <option>03</option>
            <option>04</option>
            <option>05</option>
            <option>06</option>
            <option>07</option>
            <option>08</option>
            <option>09</option>
            <option>10</option>
            <option>11</option>
            <option>12</option>
        </select>
    </div>
    <div class="col-md-6">
      <select class="form-control col-md-6" id="sel1">
        <option>Year</option>
        <option>01</option>
        <option>02</option>
        <option>03</option>
        <option>04</option>
        <option>05</option>
        <option>06</option>
        <option>07</option>
        <option>08</option>
        <option>09</option>
        <option>10</option>
        <option>11</option>
        <option>12</option>
    </select>
</div>
</div>
<div class="form-group">
    <label for="inputcardno" class="control-label col-md-12">CV Code :</label>
    <div class="col-md-12">
      <div class="input-group">
          <input class="form-control" id="navbarInput-01" type="search" placeholder="1234">
          <span class="input-group-btn">
            <button class="btn"><span class="fa fa-lock"></span></button>
        </span>
    </div>
</div>
</div>
</div>
<div class="col-md-6">
    <div class="panel panel-default">
      <div class="panel-heading">Review Order</div>
      <div class="panel-body">
         <div class="table-responsive">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <td><strong>Plan</strong></td>

                        <td class="text-center"><strong>Qty.</strong></td>
                        <td class="text-center"><strong>Price</strong></td>
                    </tr>
                </thead>
                <tbody>
                    <!-- foreach ($order->lineItems as $line) or some such thing here -->
                    <tr>
                        <td>3 Months Plan</td>

                        <td class="text-center">1</td>
                        <td class="text-right">Php 1,500.00</td>
                    </tr>


                </tbody>
            </table>
        </div>
    </div>
</div>    
</div>

</div>
<hr>
<div class="form-group pull-right">                            
    <button type="submit" class="btn btn-primary btn-lg">Checkout</button>
</div>
</div>
</div>
@endsection

