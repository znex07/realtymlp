<?php

namespace App\Http\Controllers\Projects;

use App\Property;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Projects;
use App\ProjectImages;
use App\Location;
use Illuminate\Support\Facades\Input;
use DB;
use App\Units;
class HomeController extends Controller
{

    public function getIndex(Request $request)
    {
      $data = $request->all();
      $projects = Projects::with('images')->orderBy('created_at','desc')->get();
      $projectsasc = Projects::with('images')->orderBy('created_at','asc')->get();
      $projectsname = Projects::with('images')->orderBy('project_name')->get();
      if ($request->has('search_loc')) {
        $location_request = $request['search_loc'];
        $projects = Projects::with('images')->where('city','=',$location_request)->orderBy('created_at','desc')->get();
        $projectsasc = Projects::with('images')->where('city','=',$location_request)->orderBy('created_at','asc')->get();
        $projectsname = Projects::with('images')->where('city','=',$location_request)->orderBy('project_name')->get();
      }
      $recent_loc = Projects::all()->pluck('city');
      $municipality = Location::whereIn('id',$recent_loc)->orderBy('name')->get();
//    	$location_ids = isset($location_id['location_id']) ? $location_id['location_id'] : 0;
      $cities  = Location::where('type','=','2')->where('parent_id','=','1')
                    ->orderByRaw("case when name = 'Metro Manila' then id else name end asc")
                    ->get();
      $prices = DB::table('units')->select(DB::raw('max(max_price) as max_price,min(min_price) as min_price,min(unit_area) as min_area, max(unit_area) as max_area'))->first();
      $max = explode(' to ',$prices->max_area);
      $min = explode(' to ',$prices->min_area);
        $data = [
          'projects' => $projects,
          'projectsasc' => $projectsasc,
          'projectsname' => $projectsname,
          'cities' => $cities,
          'municipality' => $municipality,
          'max_price' => $prices->max_price,
          'min_price' => $prices->min_price,
          'max_area' => $max[0],
          'min_area' => $min[0],
        ];
        return view('main.projects.index')->with($data);

    }

}
