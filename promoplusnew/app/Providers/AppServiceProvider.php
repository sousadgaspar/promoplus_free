<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        

        \View::composer('campaign.sms.create', function ($view) {

            $view->with('distributionLists', \App\DistributionList::all()->reverse()->forPage(1,6));

        });


        \View::composer('contact.create', function ($view) {

            $view->with('distributionLists', \App\DistributionList::all()->reverse()->forPage(1,6));

        });


    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
