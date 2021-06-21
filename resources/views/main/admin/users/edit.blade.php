@extends('main.admin.base')


@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="row">

        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="content-panel">
                    <div class="col-md-12">
                        <h4 class="mb"><i class="fa fa-angle-right"></i> Add Users</h4>
                    </div>
                    <div class="panel-body">
                        <form method="post" action="/admin/users/edit/update" id="edit_form">
                            <input type='hidden' name='_token' id="_token" value='{{ csrf_token() }}'/>
                            <input type='hidden' name='id' id="id" value='{{ $user->id }}'/>
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
                                <input type="text" name="user_fname" value="{{$user->user_fname}}" placeholder="Firstname"
                                class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Lastname</label>
                                <input type="text" name="user_lname" value="{{$user->user_lname}}" placeholder="Lastname"
                                class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="emil" value="{{$user->email}}" placeholder="email"
                                class="form-control">
                            </div>
                            <div class="form-group">
                                <label>User Type</label>
                                <select name="user_type" class="form-control">
                                    <option value="1">Member</option>
                                    <option value="2">Admin</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>User Subscription</label>
                                 <select name="subs" class="form-control">
                                    @foreach($subs as $subscriptions)
                                    <option value="{{ $subscriptions->id }}" {{ $subscriptions->id == $user->user_subscription ?'selected' : '' }}>{{ $subscriptions->name }}</option>
                                    @endforeach
                                </select>
                                <table class="table">
                                    <tbody>
                                    @foreach($sub_edit as $edit)
                                        <tr>
                                            <td>{{$edit->subscription_name}}</td>
                                            <td>
                                                <a class=" pull-right btn btn-sm btn-danger subscription_expire" data-id="{{ $edit->id }} " > Expire</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    
                                </table>

                                <br>
                                <div class="form-group">
                                    <button name="submit" type="submit" class="btn btn-info" id="btn-submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>

@endsection

