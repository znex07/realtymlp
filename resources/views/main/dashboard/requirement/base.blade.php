@extends('main.dashboard.base')
@section('content')
    <div class='container' style='margin-top: 70px ;'>
    	<div class="row row-offcanvas row-offcanvas-left">
	        @include('main.dashboard.requirement.sidebar')
	        <div class="col-xs-12 col-sm-9 content">
	    		@yield('content.inner')
	    	</div>
	    </div>	
    </div>
@endsection
@section('styles')
    <link rel="stylesheet" href="/assets/css/dashboard/dashboard.css">
    <style>
        .nav-landing {
            display: none;
        }

        #sortable > div {
            border-top: 1px solid transparent;
        }

        .panel-post {
            border-left: 3px solid #1abc9c;
            background: #FAFAFB;
        }
        .font-bold {
            font-weight: bold;
        }
        .well p {
            margin: 0px;
        }
    </style>

@endsection
<div class="modal fade bd-example-modal-lg" id="newModal" tabindex="-1" role="dialog" aria-labelledby="Modallabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
      	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h6 class="modal-title" id="exampleModal3Label">New Listing Match</h6>
        
      </div>
      <div class="modal-body">
          <div class="panel panel-default">
              <div class="panel-body">
                  <div class="col-md-12">
                      <div class="panel panel-default">
                          <div class="panel-body thumb-img row-eq-height">

                          </div>
                      </div>
                  </div>
                  </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onclick="">See all matches</button>
      </div>
    </div>
  </div>
</div>