<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Request;

class UrlAppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $halaman = '';
        if(Request::segment(1)=='daftar'){
            $halaman = 'daftar';
        }elseif (Request::segment(1) == 'contact'){
            $halaman ='contact';
        }

        view()->share('halaman',$halaman);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
