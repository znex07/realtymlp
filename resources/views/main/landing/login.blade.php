@extends('main.partials.base')

@section('content')
<div class="container">
    <div class="col-md-4 col-md-offset-4" style="margin-top:100px">
        <form method="post" action='/auth/login'>
            <input type='hidden' name='_token' value='{{ csrf_token() }}' />
            <div class="panel panel-default" >
                <div class="panel-heading">
                    Sign in
                </div>
                <div class="panel-body">
                    @if($errors->all())
                        <div class='alert alert-danger'>
                            @foreach($errors->all() as $error)
                                    {{ $error }}
                            @endforeach
                        </div>
                    @elseif(session()->get('update.success'))
                    <div class='alert alert-success'>
                        {{ session()->get('update.success') }}
                    </div>
                    @elseif(session()->get('email.success'))
                    <div class='alert alert-success'>
                        {{ session()->get('email.success') }}
                    </div>
                    @elseif(session()->get('register.success'))
                    <div class='alert alert-success'>
                        {{ session()->get('register.success') }}
                    </div>
                    @elseif(session()->get('email.success'))
                    <div class='alert alert-success'>
                        {{ session()->get('email.success') }}
                    </div>
                    @elseif(session()->get('error'))
                    <div class='alert alert-danger'>
                        {{ session()->get('error') }}
                    </div>
                    @endif
                    <div class="media">
                        <div class="media-body">
                            <div class="form-group" style="padding-top: 10px;">
                                <input type="email" class="form-control" placeholder="Email" value="" id="txtEmail" name="user_email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password" id="txtPass" name="user_password">
                            </div>
                            <div class="form-group">
                                <a href="/auth/forgot_password">Forgot Password?</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class=" clearfix">
                        <button type="submit" name="btnLoginU" id="btnLoginU" class="btn btn-primary pull-right ladda-button" data-style="slide-left">
                            <span class="ladda-label">Sign in</span>
                            <span class="ladda-spinner"></span>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')
<script>
$(function() {
  $('.nav-login').addClass('accented-btn');
});
</script>
@endsection
