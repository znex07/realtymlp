<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SidebarServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $views = [
            'main.partials.sidebar',
            'main.profile.index',
            'main.dashboard.overview.sidebar'
        ];
        view()->composer($views, function($view) {
            $data = [
                'mode' => auth()->check() ? 'logged_in' : 'in_public',
            ];
            $view->with($data);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
