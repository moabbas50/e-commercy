<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        // Sharing data with all views
        View::composer('*', function ($view) {
            $orderCount =  DB::table('orders')->where('notification', 'notify')->count();
            $orderss =  DB::table('orders')->orderBy('OrderDate','desc')->get();
            $view->with('orderCount', $orderCount)->with('orderss', $orderss); // Share with all views
        });
    }
}
