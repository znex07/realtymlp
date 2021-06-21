@extends('main.admin.base')
@section('styles')
  <link rel="stylesheet" href="/assets/admincss/select2.min.css">
  <style>

  </style>
@endsection

@section('content')

<section id="main-content">
       <section class="wrapper">
            <div class="content-panel">                                    
                    <h4 class="mb"><i class="fa fa-angle-right"></i> Groups</h4>
                <hr>
                <div class="panel-body">
                <table id="example" class="table display" cellspacing="0" width="100%" style="font-size: 14px;">
                    <thead>
                    <tr>                        
                        <th>Group ID</th>
                        <th>Group Owner</th>
                        <th>Group Title</th>
                        <th>Group Member</th>
                        <th>Group Description</th>
                        <th>Date Created</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($group as $groups)
                    <tr>
                            <td>{{ $groups->id }}</td>
                            <td>{{ $groups->moderator->full_name }}</td>
                            <td>{{ $groups->group_title }}</td>
                            <td></td>
                            <td>{{ $groups->group_description }}</td>
                            <td>{{ $groups->created_at }}</td>
                            <td>
                            <a href="/admin/group/edit/{{ $groups->id }}" class="btn btn-sm btn-success">Edit</a>
                            <a href="" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                    </tr>
                    @endforeach

                    </tbody>       
                </table>
                </div>
            </div>
        </section>
    </section>
@endsection
@section('script')
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
@endsection