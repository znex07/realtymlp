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
    <h6>Billing</h6>
    <table class="table table-striped table-hover ">
      <thead>
        <tr>

          <th>Transaction No.</th>
          <th>Description</th>
          <th>Ammount</th>
          <th>Invoice</th>
        </tr>
      </thead>
      <tbody>
        <tr>                     
          <td>00011</td>
          <td>Lorem ipsum</td>
          <td>Php 33,999.00</td>
          <td><a type="submit" class="btn btn-sm btn-default btn-lg"><i class="fa fa-file-pdf-o"></i> Download file as PDF</a></td>
        </tr>
        <tr>
          <td>00012</td>
          <td>Lorem ipsum</td>
          <td>Php 33,999.00</td>
          <td><a type="submit" class="btn btn-sm btn-default btn-lg"><i class="fa fa-file-pdf-o"></i> Download file as PDF</a></td>
        </tr>

      </tbody>
    </table>
    <hr>




    <div class="form-group pull-right">
      <a type="submit" class="btn btn-default btn-lg">Back</a>
      <button type="submit" class="btn btn-primary btn-lg">Print</button>

    </div>
    @include('main.dashboard.account.invoice')
  </div>
</div>
@endsection