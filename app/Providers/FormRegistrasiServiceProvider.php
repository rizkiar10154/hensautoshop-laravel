<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Kategori;

class FormRegistrasiServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer('hensautoshop.register.create', function ($view) {
            $view->with('kategori', Kategori::pluck('kategori_nama', 'id'));
        });
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
