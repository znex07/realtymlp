@extends('main.partials.base')
@section('styles')
<style>
    .modal-button {
        padding: 14px 24px;
        border: 0 none;
        font-weight: 700;
        letter-spacing: 1px;
        text-transform: uppercase;  padding: 14px 24px;
        color:white;
    }
    .navbar-brand {
        margin-left: 0px;
        font-weight: normal;
    }
    .topnav {
        background: transparent;
    }
    body {
        background-color: #FFF;
    }
    table {
        border-radius: 5px;
        color: #77909b;
    }
    tr {
        border: 3px solid #e0e6ed;
        border-radius: 5px;
    }
    td {
        text-align: center;
        vertical-align: middle !important;
    }
    td p {
        margin: 0px !important;
    }

    .container {
        height: auto;
    }
    .reason h4 {
        font-size: 25px;
        margin:5px 0px 60px;
        color: #4d6069;
    }
    .reason h6 {
        margin:0px 0px 10px;
        color: #4d6069;
        font-size: 20px;
    }
    .reason h6 i{
        margin-right: 10px;
    }
    .reason .lead {
        margin-bottom: 0px;
        color: #455963;
        font-weight: 500;
        font-size: 20px;
    }
    .reason p small,
    .upgrade p small {
        font-weight: lighter;
    }
    .reason p,
    .upgrade p {
        line-height: 1.4;
        font-size: 17px;
        margin: 0px 0px 35px;
        color: #77909b;
    }
    .reason hr {
        margin-top: 100px;
        margin-bottom: 100px;
        border-top: 2px solid #eee;
    }
    .disable-padding {
        padding-right: 0px !important;
        margin-top: 100px;
    }
    .intro {
        margin-bottom: 50px;
    }
    .button-green {
        border:2px solid #1abc9c;
        padding: 8px 21px;
        color: #1abc9c;
    }
    .button-green:hover,
    .button-green:active {
        color: #fff;
        background: #1abc9c;
        border-color: #1abc9c;
    }
    footer {
        padding: 40px 0 10px 0 !important;
        margin-top: 230px;
        color: #fff !important;
        background-color: #363636 !important;
        -webkit-box-shadow: 0px -5px 5px 0px rgba(50, 50, 50, 0.25);
        -moz-box-shadow:  0px -5px 5px 0px rgba(50, 50, 50, 0.25);
        box-shadow: 0px -5px 5px 0px rgba(50, 50, 50, 0.25);
        padding-bottom: 10px;
    }
    footer h4, h4 strong {
        font-weight: 900;
    }

    .btn-xl {
    border-radius: 15px;
    font-size: 42px;
}
.container {
	margin-top: 70px;
    height: auto !important;
}
.input-group {
    margin-bottom: 30px;
}

.list-group-item {
    background: transparent !important;
}
a.list-group-item:hover,
a.list-group-item:focus {
    background-color: transparent !important;
}
.list-group-item-text {
    color: #fff;
    font-weight: lighter;
}
.list-group-item-text:hover,
.list-group-item-text:focus {
    color: #BDC3C7;
}
footer .container {
    margin-top: 0px;
}
.input-group {
    margin-bottom: 30px;
}
p {
  font-size: 14px;
  font-weight: 500
}
.profile h6 {
  font-size: 18px;
}
.profile span {
  margin-left: 20px;
  font-size: 12px;
}
.profile p {
  font-size: 16px;
  font-weight: 700;
}
em {
  font-weight: 400;
}
</style>

<div class="container">
        <div class='col-md-8'>
            <div class="panel panel-default">
              <div class="panel-body">
               <div class="col-md-12">
                <h6>Agent Detail</h6>
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque condimentum molestie diam quis congue. Duis rutrum metus vitae lorem ornare, ac ullamcorper sem ullamcorper. Sed vehicula imperdiet egestas. Interdum et malesuada fames ac ante ipsum primis in faucibus. Phasellus volutpat fringilla massa, eget tempus nunc. Ut posuere sodales eros, bibendum luctus nunc facilisis quis. Fusce hendrerit sodales auctor.</p>

                <div class="panel panel-default profile">
                  <div class="panel-body">
                    <div class="col-md-4">
                      <img src='/img/default-picture.jpg' width="200px" class='img-responsive img-circle' style="margin-bottom:10px"/>
                      <a href="#" class="btn btn-sm btn-primary btn-block"><i class="fa fa-user-plus"></i> Add as Affiliate</a>
                    </div>
                    <div class="col-md-8">
                      <h6>Francis Niel Codinera / <strong class="text-primary">Broker</strong> <span class="label label-warning">Premium</span></h6>
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
                  </div>
                </div>
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
      <div class="col-md-4">
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

@section('scripts')
<script>
$('.nav-agents').addClass('accented-btn');
</script>
@endsection
