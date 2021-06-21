@extends('main.admin.base')

@section('content')
<section id="main-content">
        <section class="wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12">
                <h1>Send Invitation</h1>
            </div>
        </div>
    </div>
    <form method="post" action="/admin/invitation/send_invitation">
    <input type='hidden' name='_token' value='{{ csrf_token() }}' />

    <div class="row">
      <div class="col-md-12">
        <div class="col-md-4">
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope"></i> </span>
                    <input type="text" name="email" class="form-control" placeholder="Enter email address">
                </div>
            </div>
            <div class="form-group">
                    <input type="submit" name="send_email" class="btn btn-info form-control" value="Send Email" />
            </div>
        </div>
      </div>
    </div>
    </form>
</section>
    </section>
@endsection