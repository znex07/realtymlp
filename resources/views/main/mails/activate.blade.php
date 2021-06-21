@extends('main.mails.partials.base')



@section('content')
        <div class="container-fluid text-center">
            <div class="row">
                <div class="col-md-12">
                    <label>Hello {{ $fullname }}</label>
                    <label>Thank you for joining RealtyMLP, the Philippine's unique real estate multi-listing portal. To start using your account,
                    kindly use your email {{ $email }} and this password {{ $password }}, this is a system generated password.
                    you can access RealtyMLP thru this link ..</label> 
                    <label>http://realtymlp.com</label>
                    <label>Thank You !</label>
                    <label>- RealtyMLP</label>
                </div>    
            </div>
        </div>

@endsection