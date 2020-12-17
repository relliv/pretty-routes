<?php

return [
    /*
     * Indicates whether to enable pretty routes only when debug is enabled (APP_DEBUG).
     */

    'enabled' => env('APP_DEBUG'),

    /*
     * The endpoint to access the routes.
     */

    'url' => 'routes',

    /*
     * Defines middlewares for different access levels.
     */

    'middlewares' => [
        /*
         * The middleware(s) to apply before attempting to access routes pages (web + api).
         *
         * For example, ['auth.basic'].
         */

        'both' => [],

        /*
         * The middleware(s) to apply before attempting to access WEB route page.
         *
         * Also routes for WEB will be determined by this value.
         */

        'web' => 'web',

        /*
         * The middleware(s) to apply before attempting to access API route.
         *
         * Also routes for API will be determined by this value.
         */

        'api' => 'api',
    ],

    /**
     * Defines routes to hide.
     */

    'hide' => [
        /*
         * The methods to hide.
         */

        'methods' => [
            'HEAD',
        ],

        /*
         * The routes to hide with regular expression
         */

        'matching' => [
            '#^_debugbar#',
            '#^_ignition#',
            '#^telescope#',
            '#^routes#',
        ],
    ],

    /*
     * Set a light or dark themes.
     *
     * Available:
     *   light  - always chooses a light theme.
     *   dark   - always chooses a dark theme.
     *   auto   - automatic theme detection from browser.
     *
     * By default, auto.
     */

    'color_scheme' => 'auto',

    /*
     * If routes are not separated by a domain, this column is hidden from display by default.
     *
     * If you want to always show the column with the domain name, set the value to "true".
     *
     * By default, false.
     */

    'domain_force' => false,

    /*
     * In the case when you need to use a specific localization, set its name to the value.
     *
     * For example "de".
     *
     * Otherwise, leave the value "null" to the application default.
     */

    'locale' => null,
];
