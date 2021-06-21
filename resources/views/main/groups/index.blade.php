@extends('main.dashboard.base')
@section('styles')
<link rel="stylesheet" href="/assets/css/group.css"/>
@endsection
@section('content')
@include('main.dashboard.partials.nav')
<div class='container' style='margin-top: 70px ;'>
    <div class="row row-offcanvas row-offcanvas-left">
    	@include('main.dashboard.affiliates.sidebar')
    	@yield('content.inner')
    	<div class="col-xs-12 col-sm-9 content">  
    		<div class="panel panel-default">
    			<div class="panel-body">
            		<div class="row">
            			<div class="col-md-12">                            
                            <ul class="breadcrumb">
                                <li><a href="/dashboard/overview">Overview</a></li>
                                <li><a href="#">Affiliates</a></li>
                                <li class="active">Groups</li>
                            </ul>
            			     <hr>        				
            				<p class="text-muted group-title">GROUPS YOU'RE IN</p>

            				<ul class="list-group groups">
                                @foreach($user->joinedgroups as $group)
            					<li class="list-group-item">
            						<div class="btn-group pull-right">
            							<button type="button" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            								<i class="fa fa-cog"></i>
            							</button>
            							<ul class="dropdown-menu">
            								<li><a href="/groups/{{ $group->id }}/{{ str_slug($group->group_title) }}">View</a></li>
            								<li><a href="#">Leave Group</a></li>     								
            							</ul>
            						</div>
            						<a href="/groups/{{ $group->id }}/{{ str_slug($group->group_title) }}">
            							{{ $group->group_title }}
            						</a>
            					</li>
                                @endforeach
            				</ul>
            			</div>
            		</div>
            	</div>
            </div>
        </div>
	</div>
</div>
@endsection

    @section('scripts')
    <script>
    $('.nav-dashboard').addClass('accented-btn');
    </script>
    @endsection