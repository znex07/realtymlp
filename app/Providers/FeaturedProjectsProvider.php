<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Projects;
use App\Location;
use DB;
class FeaturedProjectsProvider extends ServiceProvider
{
    public function boot()
    {
        $views = [
            'main.landing.footer',
        ];

        view()->composer($views, function($view) {
            $projects = Projects::groupBy('city')->get();
            $locations = DB::select(DB::raw('select locations.name, projects.city from projects,locations where locations.id = projects.city group by projects.city'));
            $data = [
                'footer_FeaturedProjects' => $locations
            ];
            $view->with('footer_FeaturedProjects', $locations);
        });
    }

    public function register()
    {
        
    }
}
