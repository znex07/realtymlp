@extends('main.mails.partials.base')
@section('content')
<h3>Good day!</h3>
<p>
	{{ $user->full_name }} wishes to connect with you as an affiliate.
</p>
<p>
	Create an account today to get connected with each other to share listings, click on the link below:
</p>
<p><a href='http://realtymlp.com/auth/register?code={{ $user->user_code }}'>RealtyMLP.com</a></p>
Thank you!
<br>
-RealtyMLP Admin


@endsection
