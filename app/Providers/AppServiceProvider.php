<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Task;
use App\Billing\Stripe;
use App\Tag;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.sidebar',function($view){
            $view->with('archives', Task::archives());
            $view->with('tags', Tag::pluck('name'));
        });
        //Every time I use the sidebar this function gets called
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //This serves to send an API every time when boot() was launch
        $this->app->singleton(Stripe::class,function (){
            return new Stripe(config('services.stripe.secret'));
        });
    }
}
