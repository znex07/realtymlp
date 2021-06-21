@extends('main.mails.partials.base')
@section('content')
		<h1>RealtyMLP</h1>
		  Dear {{ $to }},
			<br>
			{{ $sender }} wishes to connect with you as an affiliate. To get connected with each other to share listings, click on the link below:
			<br>
			<a href="http:/realtymlp.com/dashboard/affiliates/new" target="_blank">Let's Get Connected!</a>
			<br><br>
			Thank you!
			<br>
			-RealtyMLP Admin


@endsection
