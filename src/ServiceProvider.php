<?php

namespace PrettyRoutes;

use Helldar\LaravelSupport\Facades\App;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use PrettyRoutes\Facades\Config;

class ServiceProvider extends BaseServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            $this->fullPath('config/pretty-routes.php'),
            'pretty-routes'
        );
    }

    public function boot()
    {
        if ($this->isDisabled()) {
            return;
        }

        $this->loadViewsFrom(
            $this->fullPath('resources/views'),
            'pretty-routes'
        );

        $this->publishes([
            $this->fullPath('config/pretty-routes.php') => $this->app->configPath('pretty-routes.php'),
        ]);

        $this->loadRoutesFrom(
            $this->routesPath()
        );
    }

    protected function isDisabled(): bool
    {
        return Config::disabled();
    }

    protected function fullPath(string $path): string
    {
        return realpath(__DIR__ . '/../' . ltrim($path, '/'));
    }

    protected function routesPath(): string
    {
        return App::isLaravel()
            ? $this->fullPath('routes/laravel.php')
            : $this->fullPath('routes/lumen.php');
    }
}
