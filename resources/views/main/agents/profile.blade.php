@extends('main.dashboard.base')

@section('content.inner')
        <div class='col-md-6'>
            <div class="panel panel-default">
              <div class="panel-body">
               <div class="col-md-12">
                <h6>Agent Detail</h6>
                <hr> 
                </div>               
                    <div class="col-md-4">
                      <img src='/img/default-picture.jpg' width="200px" class='img-responsive' style="margin-bottom:10px"/>
                      <a href="#" class="btn btn-sm btn-primary btn-block disabled"><i class="fa fa-user-plus"></i> Add as Affiliate</a>
                    </div>
                    <div class="col-md-8 detail">
                      <h6>Francis Niel Codinera / <strong class="text-primary">Broker</strong> <span class="label label-warning">Premium</span></h6>
                      <p>Managing Partner in a Digital Agency, Real Estate Broker and Appraiser</p>
                      <hr>
                      <div class="col-md-4">
                        <p><i class="fa fa-map-marker"></i> Location</p>
                          <p><i class="fa fa-envelope"></i> Email</p>
                            <p><i class="fa fa-phone"></i> Mobile</p>
                      </div>
                      <div class="col-md-8">
                       <p class="pull-left"><em>Caloocan, Metro Manila</em></p>
                       <p class="pull-left" > <em>fncodinera@gmail.com</em></p>
                       <p class="pull-left"><em>+49 123 456 789</em></p>
                       </div>
                    </div>
                
                <div class="col-md-12">
                  <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque condimentum molestie diam quis congue. Duis rutrum metus vitae lorem ornare, ac ullamcorper sem ullamcorper. Sed vehicula imperdiet egestas. Interdum et malesuada fames ac ante ipsum primis in faucibus. Phasellus volutpat fringilla massa, eget tempus nunc. Ut posuere sodales eros, bibendum luctus nunc facilisis quis. Fusce hendrerit sodales auctor.</p>
                </div>
              
                             
            </div>
                   
               
        </div>
        <div class="panel panel-default">
              <div class="panel-body">
               <div class="col-md-12">
                <h6>Properties</h6>
                <hr>
                             
            </div>
        </div>             
               
        </div>
      </div>
      <div class="col-md-3">
        <div class="panel panel-default">
          <div class="panel-heading">Contact Agent</div>
          <div class="panel-body">
            <div class="form-group">              
              <input type="text" class="form-control" id="inputDefault" placeholder="Email">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="inputDefault" placeholder="Subject">
            </div>
            <div class="form-group">
             <textarea class="form-control" rows="3" id="textArea" placeholder="Message"></textarea>
           </div>
           <a href="#" class="btn btn-sm btn-block btn-primary">Submit</a>
         </div>
        </div>
      </div>
@endsection

@section('styles')
<style>
.input-group {
    margin-bottom: 30px;
}
p {
  font-size: 14px;
  font-weight: 500
}
.detail h6 {
  font-size: 18px;
}
.detail span {
  margin-left: 20px;
  font-size: 12px;
}
.detail p {
  font-size: 16px;
  font-weight: 500;
}
em {
  font-weight: 400;
}
</style>
@endsection