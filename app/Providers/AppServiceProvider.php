<?php

namespace App\Providers;
use App\Models\Setting;
use App\Models\Category;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        $categories = Category::take(5)->get();
        view::share('categories',$categories);

        $setting = Setting::first();
        view::share('setting',$setting);

        Paginator::useBootstrap();
    }
}

