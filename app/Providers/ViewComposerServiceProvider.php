<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $views = [
            'main.dashboard.affiliates.sidebar',
            'main.dashboard.index',
            'main.partials.sidebar',
            'main.dashboard.property.sidebar',
            'main.dashboard.message.sidebar',
            'main.dashboard.reports.sidebar',
            'main.dashboard.overview.sidebar',
            'main.dashboard.account.sidebar',
            'main.dashboard.account.password.sidebar',
            'main.dashboard.requirement.sidebar',
        ];

        view()->composer($views, function($view) {
            $value = auth()->check() ? auth()->user()->newAffiliates()->count() : 0;
            $view->with('newAffiliate', $value);
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
