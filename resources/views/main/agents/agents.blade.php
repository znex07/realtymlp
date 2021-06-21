@extends('main.partials.base')
<div class="container">
  <div class="panel panel-default">
    <div class="panel-body">
      <div class="col-md-12">
        <h2>Agents</h2>
        <ul class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li class="active">Agents</li>
        </ul>
        <hr>        
      </div>      
      @include('main.agents.partials.list')
    </div>
  </div>
</div>
@section('scripts')
  <script>
    $('.nav-agents').addClass('accented-btn');
  </script>
@endsection
