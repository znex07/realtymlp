@extends('main.admin.base')


@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="col-md-6">
            <div class="content-panel">
                              
                    <h4 class="mb"><i class="fa fa-angle-right"></i> Add new User</h4>
                
                <hr>
                <div class="panel-body">                    
                    <form method="post" action="/admin/users/new/create">
                        <input type='hidden' name='_token' value='{{ csrf_token() }}' />
                        @if(session()->get('success'))
                        <div class="alert alert-success">
                            <h1>User added successfully</h1>
                        </div>
                        @elseif(session()->get('exist'))
                        <div class="alert alert-danger">
                            <h1>Email already exist</h1>
                        </div>
                        @endif
                        <div class="form-group">
                            <label>Firstname</label>
                            <input type="text" name="user_fname" placeholder="Firstname" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Lastname</label>
                            <input type="text" name="user_lname" placeholder="Lastname" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" placeholder="Email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Confirm Email</label>
                            <input type="email" name="confirm_email" placeholder="Confirm Email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Subscription Type</label>
                            <select name="subscription" class="form-control">
                                <option value="default"></option>

                                @foreach($subscription as $subscriptions)
                                <option value="{{ $subscriptions->code }}">{{ $subscriptions->description }}</option>
                                @endforeach
                            </select>
                            <!--<input type="email" name="confirm_email" placeholder="Confirm Email" class="form-control"> -->
                        </div>
                        <div class="form-group">
                            <button name="submit" type="submit" class="btn btn-info">Submit</button>
                        </div>
                    </form>                    
                </div>
            </div>
        </div>
    </section>
</section>

@endsection


@section('script')
<script>
console.log('hello world');
</script>
@endsection
