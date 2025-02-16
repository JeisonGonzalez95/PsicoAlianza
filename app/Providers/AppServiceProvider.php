<?php

namespace App\Providers;

use Illuminate\Support\Facades\File;
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
        // Crear el archivo si no existe
        $dbPath = database_path('psicoalianza.db');
        if (!File::exists($dbPath)) {
            File::put($dbPath, '');
        }
    }
}
