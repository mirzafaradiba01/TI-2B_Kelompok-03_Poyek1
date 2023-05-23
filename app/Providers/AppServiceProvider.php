<?php

namespace App\Providers;

use App\Models\Komplain;
use App\Models\Order;
use App\Models\Pelanggan;
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
    public function boot() {
        Paginator::useBootstrap();
        View::share('hitungPelanggan', Pelanggan::count());

        View::share('hitungOrder', Order::count());

        View::share('hitungKomplain', Komplain::count());
    }
}
