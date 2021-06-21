
@extends('main.partials.base')
@section('styles')
<link rel="stylesheet" href="/assets/css/jquery.nstSlider.min.css">
<style>
.nstSlider {
	width:100%;
}
.lbl {
	display:inline-block;
}
</style>
@endsection

@section('content')
<div class="container-full" style="padding-top: 50px;">
	@if(session()->get('featured.error'))
	<div class="panel panel-danger">
		<div class="panel-heading"><h3>{{ session()->get('featured.error') }}</h3></div>
	</div>
	@endif
	
	<input type='hidden' id='_max_price' value='{{$max_price}}'/>
	<input type='hidden' id='_min_price' value='{{$min_price}}'/>
	<input type='hidden' id='_max_area' value='{{$max_area}}'/>
	<input type='hidden' id='_min_area' value='{{$min_area}}'/>

</div>

<div class="container-full">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="container">					
						@include('main.projects.feat-search')
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container">	
		<div class="pull-left">
			<div class="form-group" name="selectsort" id="selectsort">
				<select class="form-control" onchange="sorting(this)">
					<option value="1">Latest</option>
					<option value="2">Oldest</option>
					<option value="3">Name A-Z</option>
				</select>			
			</div>
		</div>
	<div class="row"></div>
	<div class="row">

		@if ($projects->count())
			<div id="desc">
		@foreach($projects as $project)
		<div class="col-sm-6 col-md-4">
			<div class="panel panel-default">
				<div class="panel-body thumb-img">
					<a href="/projects/{{str_slug($project->project_name) }}">
						@if ($project->images()->count())
						@if ($project->thumbnail())
						<div class="ratio img-responsive listing-thumbnail" style="background-image: url(img/featured_files/{{ $project->thumbnail()->file_path }});"></div>
						{{-- <img class="img-responsive" src="img/featured_files/{{ $project->thumbnail()->file_path }}" alt="img" > --}}
						@else
						<div class="ratio img-responsive listing-thumbnail" style="background-image: url(img/featured_files/{{ $project->images()->first()->file_path }});"></div>
						{{-- <img class="img-responsive" src="img/featured_files/{{ $project->images()->first()->file_path }}" alt="img" > --}}
						@endif
						@endif
					</a>
					<div class="thumb-content">
						<h6 style="position:relative;padding:5px;">{{ str_limit($project->project_name,20) }}</h6>

						<a role="button"  class="pull-right btn btn-sm btn-primary" style="margin:0 0 20px 5px;" href="/projects/{{str_slug($project->project_name) }}">Explore</a>

					</div>
				</div>
			</div>
		</div>
		@endforeach
			</div>
			<div id="asc" style="display: none">
				@foreach($projectsasc as $project)
					<div class="col-sm-6 col-md-4">
						<div class="panel panel-default">
							<div class="panel-body thumb-img">
								<a href="/projects/{{str_slug($project->project_name) }}">
									@if ($project->images()->count())
										@if ($project->thumbnail())
											<div class="ratio img-responsive listing-thumbnail" style="background-image: url(img/featured_files/{{ $project->thumbnail()->file_path }});"></div>
											{{-- <img class="img-responsive" src="img/featured_files/{{ $project->thumbnail()->file_path }}" alt="img" > --}}
										@else
											<div class="ratio img-responsive listing-thumbnail" style="background-image: url(img/featured_files/{{ $project->images()->first()->file_path }});"></div>
											{{-- <img class="img-responsive" src="img/featured_files/{{ $project->images()->first()->file_path }}" alt="img" > --}}
										@endif
									@endif
								</a>
								<div class="thumb-content">
									<h6 style="position:relative;padding:5px;">{{ str_limit($project->project_name,20) }}</h6>
									<a role="button" class="pull-right btn btn-sm btn-primary" style="margin:0 0 20px 5px;" href="/projects/{{ $project->project_name}}">Explore</a>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>

		@endif
	</div>
	<div id="name" style="display: none">
		@foreach($projectsname as $project)
			<div class="col-sm-6 col-md-4">
				<div class="panel panel-default">
					<div class="panel-body thumb-img">
						<a href="/projects/{{str_slug($project->project_name) }}">
							@if ($project->images()->count())
								@if ($project->thumbnail())
									<div class="ratio img-responsive listing-thumbnail" style="background-image: url(img/featured_files/{{ $project->thumbnail()->file_path }});"></div>
									{{-- <img class="img-responsive" src="img/featured_files/{{ $project->thumbnail()->file_path }}" alt="img" > --}}
								@else
									<div class="ratio img-responsive listing-thumbnail" style="background-image: url(img/featured_files/{{ $project->images()->first()->file_path }});"></div>
									{{-- <img class="img-responsive" src="img/featured_files/{{ $project->images()->first()->file_path }}" alt="img" > --}}
								@endif
							@endif
						</a>
						<div class="thumb-content">
							<h6 style="position:relative;padding:5px;">{{ str_limit($project->project_name,20) }}</h6>
							<a role="button" class="pull-right btn btn-sm btn-primary" style="margin:0 0 20px 5px;" href="/projects/{{ $project->project_name}}">Explore</a>
						</div>
					</div>
				</div>
			</div>
		@endforeach
	</div>
</div>






@endsection

@section('scripts')
<script src='/assets/js/jquery.nstSlider.min.js'></script>
<script>
function sorting()
{
	var sortselect = $('#selectsort option:selected').val();
	var asc = document.getElementById('asc');
	var desc = document.getElementById('desc');
	var name = document.getElementById('name');

		if (sortselect == 1)
		{
			asc.style.display = 'none';
			desc.style.display = 'block';
			name.style.display = 'none';
		}

		else if(sortselect == 2)
		{
			asc.style.display = 'block';
			desc.style.display = 'none';
			name.style.display = 'none';
		}
		else if(sortselect == 3)
		{
			asc.style.display = 'none';
			desc.style.display = 'none';
			name.style.display = 'block';
		}

}
//	function muni()
//	{
//		$.ajax({
//			url: '/projects',
//			type: 'GET',
//			data: {
////				selectmuni: 16
//			},
//			success: function(data)
//			{
//			}
//		});
//	}
</script>
<script>
$(function(){
	var max_price = $('#_max_price').val(),
	min_price = $('#_min_price').val(),
	max_area = $('#_max_area').val(),
	min_area = $('#_min_area').val();
	console.log(max_price);
	console.log(min_price);
	$('#nstPrices').nstSlider({
		crossable_handles: false,
		left_grip_selector: ".leftGrip",
		right_grip_selector: ".rightGrip",
		value_bar_selector: ".bar",
		value_changed_callback: function(cause, leftValue, rightValue) {
			var $container = $(this).parent();
			$container.find('.leftLabel').text(leftValue);
			$container.find('.rightLabel').text(rightValue);
		}
	});
	});
</script>
@endsection
