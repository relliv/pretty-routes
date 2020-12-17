<?php

namespace PrettyRoutes\Support;

use Illuminate\Support\Facades\Config as AppConfig;

final class Config
{
    public function enabled(): bool
    {
        return $this->get('enabled');
    }

    public function allowCleanup(): bool
    {
        return AppConfig::get('app.env') !== 'production' && AppConfig::get('app.debug');
    }

    public function url(): string
    {
        return $this->get('url');
    }

    public function middlewares(): array
    {
        return (array) $this->get('middlewares.both');
    }

    public function webMiddleware(): ?string
    {
        return $this->get('middlewares.web');
    }

    public function apiMiddleware(): ?string
    {
        return $this->get('middlewares.api');
    }

    public function hideMethods(): array
    {
        return (array) $this->get('hide.methods', []);
    }

    public function hideMatching(): array
    {
        return (array) $this->get('hide.matching', []);
    }

    public function colorScheme(): string
    {
        return $this->get('color_scheme', 'auto');
    }

    public function domainForce(): bool
    {
        return (bool) $this->get('domain_force');
    }

    public function locale(): ?string
    {
        return $this->get('locale') ?: null;
    }

    public function set(string $key, $value): void
    {
        AppConfig::set($this->key($key), $value);
    }

    protected function get(string $key, $default = null)
    {
        return AppConfig::get($this->key($key), $default);
    }

    protected function key(string $key): string
    {
        return 'pretty-routes.' . $key;
    }
}
