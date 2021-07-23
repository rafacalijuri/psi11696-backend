<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\ContratoRepositoryInterface;
use App\Repositories\ContratoRepositoryEloquent;

use App\Repositories\ParcelaRepositoryInterface;
use App\Repositories\ParcelaRepositoryEloquent;

use App\Repositories\SaldoRepositoryInterface;
use App\Repositories\SaldoRepositoryEloquent;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
        $this->app->bind(
            ContratoRepositoryInterface::class,
            ContratoRepositoryEloquent::class
        );

        $this->app->bind(
                ParcelaRepositoryInterface::class,
                ParcelaRepositoryEloquent::class
        );

        $this->app->bind(
            SaldoRepositoryInterface::class,
            SaldoRepositoryEloquent::class
    );
    }
}