<?php

namespace App\Providers;

use App\Models\JenisSimpanan;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        try {
            View::share('jenis_simpanan', JenisSimpanan::orderBy('nama')->get());

        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
