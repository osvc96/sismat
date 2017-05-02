<?php

namespace App\Providers;

use App\Models\MatanzaPorcino;
use App\Models\MatanzaBovino;
use App\Observers\MatanzaPorcinoObserver;
use App\Observers\MatanzaBovinoObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        MatanzaBovino::observe(MatanzaBovinoObserver::class);
        MatanzaPorcino::observe(MatanzaPorcinoObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
