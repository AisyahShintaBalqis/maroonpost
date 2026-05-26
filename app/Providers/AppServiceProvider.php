<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Page;
use App\Models\Category;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $pages = Page::where('is_active', true)->get();

        $categories = Category::all();

        View::share('pages', $pages);

        View::share('categories', $categories);
    }

}
