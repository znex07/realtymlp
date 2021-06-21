@extends('main.mails.partials.base')

@section('content')
		<h1>RealtyMLP</h1>
		<label>Property has been shared to your account on Realtymlp.</label>

		<br>

		Good day!
		<br><br>
		<span style="text-transform:capitalize;">{{ $property->user->full_name }}</span> has shared a listing to you as an affiliate!
		<br><br>
		You can readily view the listing <a href='{{ $url }}' target='_blank'><span style="text-transform:capitalize;">{{ $property->property_title }}</span></a> in your dashboard.
		<br><br>
		Thank you!
		-RealtyMLP Admin

@endsection
