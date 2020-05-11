<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
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
        $categories = Category::with(['childs', 'posts' => function ($query) {
            $query->orderBy('created_at', 'desc')->take(config('app.take_categories'));
        }])->isParent()->whereHas('posts')->get();
        View::share('categories', $categories);
        Schema::defaultStringLength(191);
    }
}
