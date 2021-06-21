<?php

namespace App\Http\Controllers\Projects\Featured;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Projects;
use App\Units;
use Illuminate\Support\Facades\Input;

class FeaturedController extends Controller
{

    public function getIndex($slug)
    {
//        dd(str_slug('Two Serendra - The Sequioa'));
        $featured = Projects::with(['units.images','images'])
                        ->where('slug_name',$slug)
                        ->firstOrFail();
//dd(str_slug($featured->project_name));

        $data = [
            'featured' => $featured
        ];
//         dd($data);
        return view('main.projects.featured.index')->with($data);
    }

    public function getPlace($place)
    {
        dd($place);
    }
}
