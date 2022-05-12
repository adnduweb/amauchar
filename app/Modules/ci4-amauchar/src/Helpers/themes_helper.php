<?php

if (! defined('theme')) {
    /**
     * Provides convenient access to the main Theme class
     * for CodeIgniter Theme.
     */
    function theme()
    {
        return service('theme');
    }
}

if (!function_exists('bootstrap')) {

    /**
     * Get the instance of Util class core
     *
     * @return \Amauchar\Core\Libraries|mixed
     * @throws Throwable
     */
    function bootstrap()
    {
        $demo      = ucwords(theme()->getDemo());
        $bootstrap = "\Amauchar\Core\Libraries\Bootstrap$demo";
        if (!class_exists($bootstrap)) {
            abort(404, 'Demo has not been set or '.$bootstrap.' file is not found.');
        }
        return new $bootstrap();
    }

}

if (!function_exists('util')) {
    /**
     * Get the instance of Util class core
     *
     */
    function util()
    {
        return service('util');
    }
}

