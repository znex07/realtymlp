<?php

namespace App\Http\Controllers\Admin\Post;

use Illuminate\Support\Facades\Input;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Developers;
use App\Units;
use App\Projects;
use App\Location;
use App\Department;

use App\Jobs\Admin\Post\AddDeveloperJob;
use App\Jobs\Admin\Post\ProjectJob;
use App\Jobs\Admin\Post\UnitJob;
class PostFeaturedController extends Controller
{

    public function getIndex()
    {
        // return view('main.admin.post.post_featured');
        $data = [
            'developers' => Developers::all(),
            'years' => range( date("Y", strtotime('+5 years')) , 2000 ),
            'quarters' => ['Q1', 'Q2', 'Q3', 'Q4'],
            'months' => cal_info(0)['months'],
            'provinces' => Location::where('type', '=', 1)->select('id','name')->orderByRaw("case when name = 'Metro Manila' then id else name end asc")->get(),
            'classifications' => Department::where('parent_id', '=', 0)->select('id','parent_id','department_name')->get(),
        ];
        // var_dump('U'.date('mdY').time());
        return view('main.admin.post.index')->with($data);
    }

    public function getTypes(Request $request)
    {
        // $data = $request->get('classifications');
        $data = (array) $request->get('classifications');
        $types = Department::whereIn('parent_id',$data)->groupBy('department_name')->get();
        return $types;
    }

    public function makeFeaturedProperty(Request $request)
    {
        $data = $request->all();
        $project = $this->dispatch(new ProjectJob($data));
        // if (isset($data['units']))
        //     $unit = $this->dispatch(new UnitJob($data));
        return response()->json([$project]);
    }

    public function makeFeaturedUnit(Request $request)
    {
      $data = $request->all();
      // $unit
    }

    // public function makeFeaturedProperty(Request $request)
    // {
    //     $data = $request->all();
    //     dd($data);
    //     // $project = [
    //     //     'project_code' => $input->get('property_code'),
    //     //     'name' => $input->get('name'),
    //     //     'type' => $input->get('type'),
    //     //     'municipality' => $input->get('municipality'),
    //     //     'description' => $input->get('description'),
    //     //     'sub_description' => $input->get('sub_description')
    //     // ];
    //     // Projects::create($project);
    //     // $unitCount = count($input->get('unit_code'));

    //     // for ($i = 0; $i < $unitCount; $i++) {
    //     //     $unit = [
    //     //         'project_code' => $input->get('property_code'),
    //     //         'unit_code' => $input->get('unit_code')[$i],
    //     //         'title' => $input->get('title')[$i],
    //     //         'floor_area' => $input->get('floor_area')[$i],
    //     //         'min_price' => $input->get('min_price')[$i],
    //     //         'max_price' => $input->get('max_price')[$i],
    //     //         'parking' => $input->get('parking')[$i],
    //     //         'available_at' => $input->get('available_at')[$i]
    //     //     ];
    //     //     Units::create($unit);
    //     // }
    //     // return redirect('/admin/post')->with('post.featured', 'success');

    // }

    public function addDeveloper(Request $request)
    {
        $data = $request->all();
        $data['developer_code'] = 'D'.date('mdY').time();
        $dispatched = $this->dispatch(new AddDeveloperJob($data));
        return $dispatched;
    }
}
