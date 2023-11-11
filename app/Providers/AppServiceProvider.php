<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\CustomPage;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;

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
        Paginator::useBootstrap();
        
        Schema::defaultStringLength(191);

        view()->composer('frontend.layouts.includes.header', function ($view)
        {
            $categories = Category::all('title', 'slug', 'id');
            $aboutPage = CustomPage::where('status', 'active')->select('name', 'slug')->get();
            // dd($aboutPage);
            $view->with('categories', $categories);
            $view->with('aboutPage', $aboutPage);
        });

        view()->composer('frontend.layouts.includes.footer', function ($view)
        {
            $customRoutes = CustomPage::where('status', 'active')->select('name', 'slug')->get();
            $data = [];
            foreach ($customRoutes as $route) {
                $data[$route->name] = $route->slug;
            };
            $view->with('aboutPage', $data);
        });
    }
}
