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


        \View::composer('subscription.dashboard', function ($view) {

            $view->with('plans', \App\Plan::all());

        });


        \View::composer('subscription.validate', function ($view) {

            $view->with('subscriptionRequests', \App\SubscriptionRequest::where('status', 'pending')->get());

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
