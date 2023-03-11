<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CbrParser extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //егистрируем сервис-провайдер
        $this->app->bind('CbrParser', 'App\Services\CbrParserService');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
