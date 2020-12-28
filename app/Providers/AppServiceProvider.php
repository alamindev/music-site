<?php

namespace App\Providers;
use DB;
use Illuminate\Pagination\Paginator;    
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
       View::composer(['layouts.header', 'layouts.footer','layouts.app'], function ($view) {

            $setting = DB::table('settings')->first();
            $address = DB::table('social_infos')->first();
            $pages = DB::table('pages')->get();

              $view->with('setting', $setting);
              $view->with('address', $address);
              $view->with('pages', $pages);

        });
        Paginator::useBootstrap();
    }
}
