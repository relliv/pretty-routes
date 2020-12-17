<?php

namespace PrettyRoutes\Support;

final class Config
{
    public function disabled(): bool
    {
        return $this->get('debug_only', true) && ! config('app.debug');
    }

    public function allowCleanup(): bool
    {
        return ! $this->disabled() && config('app.env') !== 'production';
    }

    public function url(): string
    {
        return $this->get('url');
    }

    public function middlewares(): array
    {
        return (array) $this->get('middlewares');
    }

    public function webMiddleware(): ?string
    {
        return $this->get('web_middleware');
    }

    public function apiMiddleware(): ?string
    {
        return $this->get('api_middleware');
    }

    public function hideMethods(): array
    {
        return (array) $this->get('hide_methods', []);
    }

    public function hideMatching(): array
    {
        return (array) $this->get('hide_matching', []);
    }

    public function colorScheme(): string
    {
        return $this->get('color_scheme', 'auto');
    }

    public function domainForce(): bool
    {
        return (bool) $this->get('domain_force');
    }

    public function forceLocale(): bool
    {
        return (bool) $this->get('locale_force');
    }

    protected function get($key, $default = null)
    {
        return config("pretty-routes.{$key}", $default);
    }
}
