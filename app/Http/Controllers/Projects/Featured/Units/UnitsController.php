<?php

namespace App\Http\Controllers\Projects\Featured\Units;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Units;

class UnitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex($slug)
    {
//        dd(str_slug('Sky Flat Unit (Three Bedroom)'));
        $units = Units::with(['project.images','images'])
                ->where('slug_name','=',$slug)
                ->firstOrFail();
        $data = [
            'unit' => $units
        ];


        if (!is_null($units->project->project_availability)) {
            $availability = json_decode($units->project->project_availability);
            $data['availability'] = $availability;
        }
        // $units = Units::where('id','=',$id)->get();
        return view('main.projects.featured.units.index')->with($data);
    }


}
