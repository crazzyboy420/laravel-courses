<?php

namespace App\Providers;

use App\Models\Level;
use App\Models\platform;
use App\Models\Series;
use App\Models\Topic;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layouts.guest', function ($view) {
            $view->with('series', Series::latest()->take(5)->get());
            $view->with('platforms', platform::latest()->take(5)->get());
            $view->with('topics', Topic::latest()->take(5)->get());
            $view->with('levels', Level::latest()->take(3)->get());
        });
    }
}
