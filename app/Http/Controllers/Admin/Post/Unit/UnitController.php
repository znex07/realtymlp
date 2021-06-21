<?php

namespace App\Http\Controllers\Admin\post\Unit;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Developers;
use App\Projects;

use App\Jobs\Admin\Post\UnitJob;
class UnitController extends Controller
{
    public function getIndex()
    {
      $data = [
        'developers' => Developers::all()
      ];
      return view('main.admin.post.unit')->with($data);
    }

    public function create(Request $request)
    {
      $data = $request->all();
      $unit = $this->dispatch(new UnitJob($data));
      return $unit;
    }

    public function getPropertyType(Request $request)
    {
      $data = $request->all();
      $project = Projects::where('project_code','=', $data['project_code'])->get();
      $class = explode(',',$project->get(0)->property_classification);
      return $class;
    }

    public function getProject(Request $request)
    {
      $data = $request->all();
      $projects = Projects::where('developer_code', $data['developer_code'])->get();
      return $projects;
    }
}
