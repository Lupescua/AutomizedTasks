<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Task;

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
        //
    }
}
