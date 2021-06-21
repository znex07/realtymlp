@extends('main.admin.prices.base')

@section('content.inner')
	<div class="row" style="padding-bottom: 20px;">
        <input type='hidden' name='_token' id="_token" value='{{ csrf_token() }}' />

        <div class="col-md-12">
            <button class="btn btn-danger" name="add" id="add"><i class="fa fa-plus"></i> Add New Subscription</button>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3>Subscription Type</h3>
        </div>
        <div class="panel-body">
                <table id="example" class="table display" cellspacing="0" width="100%" style="font-size: 14px">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Timespan</th>
                        <th>Listings</th>
                        <th>Affiliates</th>
                        <th>Shared to me</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                    <tbody>

                        @foreach($subscriptions as $subscription)
                            <tr style="cursor: pointer;">
                                <td>{{ $subscription->name }}</td>
                                <td>{{ $subscription->price }}</td>
                                <td>{{ $subscription->lifespan }}</td>
                                <td>{{ $subscription->listings }}</td>
                                <td>{{ $subscription->affiliates }}</td>
                                <td>{{ $subscription->shared_to_me }}</td>
                                <td>
                                    <button data-id="{{ $subscription->id }}" data-name="{{ $subscription->name }}" name="edit"  class="edit btn btn-success">Edit</button>
                                    <button data-id="{{ $subscription->id }}" name="delete" class="delete btn btn-danger">Delete</button>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
            </table>
        </div>
    </div>

@endsection
