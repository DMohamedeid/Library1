<?php

namespace App\Providers;
use App\Category;
use Illuminate\Support\ServiceProvider;
use View;

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


        $categories= Category::all();

//        view()->share('categories' ,$categories);

        // another way of view share
//        view::share('categories' , $categories);

        view::Composer('*' , function ($view){
            $view->with('categories' , Category::all() );
        });
    }
}
