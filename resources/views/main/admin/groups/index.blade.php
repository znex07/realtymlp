@extends('main.admin.base')
@section('styles')
  <link rel="stylesheet" href="/assets/admincss/select2.min.css">
  <style>
  
  </style>
@endsection

@section('content')
<input type='hidden' id="_token" name='_token' value='{{ csrf_token() }}' />

@endsection

@section('scripts')


@endsection
