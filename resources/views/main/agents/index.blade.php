@extends('main.dashboard.base')

@section('content.inner')
@include('main.dashboard.partials.nav')
<input type="hidden" name="_token" value="{{ csrf_token() }}" />
<div class="col-xs-12 col-sm-9 content">
  <div class="panel panel-default">    
    <div class="panel-body">
      <h2>Agents</h2>
      <ul class="breadcrumb">      
        <li><a href="">Home</a></li>    
        <li class="active">Agents</li>
      </ul>
      <hr>
      @include('main.agents.partials.list')
    </div>
  </div>
</div>
@endsection


{{-- styles & scripts --}}
@section('styles')
<style>
.input-group {
  margin-bottom: 30px;
}
</style>
@endsection
@section('scripts')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src='/assets/js/agents.js'></script>
<script type='text/javascript'>
$('.nav-agents').addClass('accented-btn');
    // var csrf_token = $('[name=_token]').val();
    var length = $('.member-container').length;
    if (length) {
      agent.init();
    }
$(function () {
    var availableTags = [
        "caloocan",
        "albay",
        "agusan"
    ];
    $( "#navbarInput-01" ).autocomplete({
        source: availableTags,
        minLength: 4,
        autoFocus: true
    });
});

    </script>
    @endsection
