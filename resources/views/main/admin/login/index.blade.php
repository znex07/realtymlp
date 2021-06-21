@extends('main.admin.users.ledger.base')

@section('content')
    <div id="login-page">
        <div class="container">
            <form class="form-login" action="/admin/auth/login" method='post'>
                <input type='hidden' name='_token' value='{{ csrf_token() }}' />
                <h2 class="form-login-heading">Welcome to RealtyMLP Admin</h2>
                <div class="login-wrap">
                    <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" class="form-control" name="user_fname" placeholder="Username" autofocus>
                        </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                    <hr>
                    <button class="btn btn-theme btn-block" href="index.html" type="submit"> SIGN IN</button>
                </div>
            </form>
        </div>
    </div>
    <script src="/assets/adminjs/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("/img/login-bg2.jpg", {speed: 500});
    </script>

@endsection