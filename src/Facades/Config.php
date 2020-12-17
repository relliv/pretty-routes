<?php

namespace PrettyRoutes\Facades;

use Illuminate\Support\Facades\Facade;
use PrettyRoutes\Support\Config as Support;

/**
 * @method static array hideMatching()
 * @method static array hideMethods()
 * @method static array middlewares()
 * @method static bool allowCleanup()
 * @method static bool disabled()
 * @method static bool domainForce()
 * @method static bool forceLocale()
 * @method static string colorScheme()
 * @method static string url()
 * @method static string|null apiMiddleware()
 * @method static string|null webMiddleware()
 */
final class Config extends Facade
{
    protected static function getFacadeAccessor()
    {
        return Support::class;
    }
}
