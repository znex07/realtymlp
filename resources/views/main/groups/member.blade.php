@extends('main.dashboard.base')
@section('styles')
<style>
.groups li { 
    border-bottom: 2px solid #eee;
}
.group-title {
	font-size: 12px;
	
}
.member {
  display: inline-block;
  margin-top: 25px;
  position: relative;
}

.member img {
  display: block;
  max-width:100%;
}
.member-title {
    font-size: 14px;
}
.member .overlay {
  position: absolute;
  top:0;
  left:0;
  width:100%;
  height:100%;
  background-color: rgba(0,0,0,0.25);
  color:white;
}
.member-thumb {
    margin-bottom: 20px;
}
.member-info {
    padding: 5px 0px;
}

 .agent p {
  margin: 0 0 0px;
 }
 .agent-fullname {
  font-size: 16px !important;
 }
 .agent-headline {
  font-size: 14px;
  font-weight: 400;
  color: #888888;
 }
.desc {
    font-size: 14px;
    font-weight: 500;
    color: #777;
}
.btn-sm {
    height: 35px !important;
}
</style>
@endsection
@section('content')
<div class='container' style='margin-top: 70px ;'>
	@include('main.partials.sidebar')
	@yield('content.inner')
	<div class="col-md-9">
		<div class="panel panel-default">
			<div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <h1>Segovia Group</h1>
                    </div>
                    <div class="col-md-6">
                        <div class="pull-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Joined <i class="fa fa-caret-down"></i>
                                </button>
                                <ul class="dropdown-menu ">                                        
                                    <li><a href="#">Leave Group</a></li>                                   
                                </ul>
                            </div>
                            <a href="#" class="btn btn-sm btn-default"><i class="fa fa-share"></i> Share</a>
                            {{-- <a href="#" class="btn btn-sm btn-default"><i class="fa fa-info-circle"></i> Members</a> --}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <hr>
                        <div class="form-group">
                            <div class="input-group">
                                <input class="form-control" placeholder="Search Member">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn"><span class="fui-search"></span></button>
                                </span>
                            </div>
                        </div>
                        <p class="text-muted group-title">MEMBERS</p>
                    </div>

                    <div class="member-container agent">

                        @foreach($group as $group_members)
                        @foreach($group_members->members as $member)
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-body" style="height:115px;">
                                    <div class="col-md-4">
                                        <a href="#">
                                            <img src="/avatars/{{$member->profile_image}}"  alt="" class='avatar-rounded img-responsive'/>
                                        </a>
                                    </div>
                                    <div class="col-md-8">
                                        <p class='agent-fullname'><a href="#">{{$member->full_name}}</a><p>
                                        <p class='agent-headline'>
                                            Broker
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                            @endforeach
                        @endforeach
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