<?php

namespace TrezeVel\Category\Providers;

use Illuminate\Support\ServiceProvider;

/**
* Provider das categorias
*/
class CategoryServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([__DIR__ . '/../../resources/migrations/' => base_path('database/migrations')], 'migrations');
        $this->loadViewsFrom(__DIR__ . '/../../resources/views/category', 'trezevelCategory');
        require __DIR__ . '/../routes.php';
    }

    public function register()
    {
        
    }
}
