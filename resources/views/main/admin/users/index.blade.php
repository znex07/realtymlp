@extends('main.admin.users.base')
@section('content.inner')
    <div class="row">
        <div class="col-md-12">
            <input type='hidden' name='_token' id="_token" value='{{ csrf_token() }}'/>


        </div>
    </div>
    <div class="content-panel">
        <a href="/admin/users/new" class="pull-right btn btn-theme" id="btnAddUser" style="margin-right:15px;"><i
                    class="fa fa-user-plus"></i> Add User
        </a>
        <h4 class="mb"><i class="fa fa-angle-right"></i> Users</h4>
        <hr>
        <div class="panel-body">
            <table id="example" class="table display" cellspacing="0" width="100%" style="font-size: 14px;">
                <thead>
                <th>Id</th>
                <th>Fullname</th>
                <th>User Type</th>
                <th>Date Registered</th>
                <th>Action</th>
                </thead>
                <tbody>
                @foreach($users as $u)
                    <tr style="cursor: pointer;">
                        <td>{{ $u->id }}</td>
                        <td>{{ $u->fullname }}</td>
                        <td><span class="label label-default">{{ $u->getSubscriptionTypeName($u->user_subscription) }}</span></td>
                        <td>{{ $u->created_at  }}</td>
                        <td>
                            <button class="btn btn-success btn-xs"
                                    onclick="window.open('/profile/admin-index/{{$u->id}}','window1','width=1500, height=1000')"
                                    title="View">
                                <i class="fa fa-eye"></i>
                            </button>
                            <button class="btn btn-primary btn-xs"
                                    onclick="window.open('/admin/users/edit/{{ $u->id }}/{{ str_slug($u->fullname) }}','window1','width=1000, height=700')"
                                    title="Edit">
                                <i class="fa fa-pencil-square-o"></i>
                            </button>
                            <button class="btn btn-danger btn-xs delete_user" data-id="{{ $u->id }} " title="Delete">
                                <i class="fa fa-trash-o"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        <!-- <div class="content-panel">
        <h4 class="mb"><i class="fa fa-angle-right"></i> Users</h4>
        <hr>
        <div class="panel-body">
            <table id="example" class="table display" cellspacing="0" width="100%" style="font-size: 14px;">
                <thead>
                    <th>Id</th>
                    <th>Fullname</th>
                    <th>User Type</th>
                    <ath>Date Registered</ath>
                    <th>Action</th>
                </thead>

                <tbody>
                  @foreach($users as $u)
            <tr style="cursor: pointer;">
                <td>{{ $u->id }}</td>
                          <td>{{ $u->fullname }}</td>
                          <td><span class="label label-default">Free</span></td>
                          <td>{{ $u->created_at  }}</td>

                          <td>
                              <button class="btn btn-success btn-xs" onclick="window.open('/admin/users/ledger/{{ $u->id }}','window1','width=1000, height=700')" title="View">
                                  <i class="fa fa-eye"></i>
                              </button>
                            <button class="btn btn-primary btn-xs" onclick="window.open('/admin/users/edit/{{ $u->id }}/{{ str_slug($u->fullname) }}','window1','width=1000, height=700')" title="Edit">
                                  <i class="fa fa-pencil-square-o"></i>
                              </button>
                              <button class="btn btn-danger btn-xs delete_user" data-id="{{ $u->id }} " title="Delete">
                                  <i class="fa fa-trash-o"></i>
                              </button>
                          </td>
                      </tr>
                  @endforeach
                </tbody>
            </table>
        </div> -->
        </div>
    </div>
@endsection
