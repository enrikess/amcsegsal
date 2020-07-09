<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ElementoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Contracts\IElementoRepository', 'App\Services\ElementoRepository');
        $this->app->bind('App\Contracts\ILineamientoRepository', 'App\Services\LineamientoRepository');
        $this->app->bind('App\Contracts\IEstimacionRepository', 'App\Services\EstimacionRepository');
        $this->app->bind('App\Contracts\ISeguridadSaludCabeceraRepository', 'App\Services\SeguridadSaludCabeceraRepository');
        $this->app->bind('App\Contracts\ISeguridadSaludRespuestaRepository', 'App\Services\SeguridadSaludRespuestaRepository');
        $this->app->bind('App\Contracts\ISeguridadSaludResultadoRepository', 'App\Services\SeguridadSaludResultadoRepository');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
