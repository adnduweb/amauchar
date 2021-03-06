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


if (!function_exists('detectBrowser')) {
    /**
     * Detection du navigateur.
     *
     * @return string
     */
    function detectBrowser($html = true)
    {
        $agent   = service('request')->getUserAgent();

        $support = '';
        if ($agent->isBrowser()) {
            // $currentAgent = $agent->getBrowser() . ' ' . $agent->getVersion();
            $currentAgent = $agent->getBrowser();
            $support      = 'sp_desktop';
        } elseif ($agent->isRobot()) {
            $currentAgent = $this->agent->robot();
            $support      = 'sp_robot';
        } elseif ($agent->isMobile()) {
            $currentAgent = $agent->getMobile();
            $support      = 'sp_mobile';
        } else {
            $currentAgent = 'Unidentified User Agent';
            $support      = 'sp_unknow';
        }

        if ($html === true) {
            return strtolower(str_replace(['-', '', ' ', '.'], ['_'], $currentAgent))
                . ' version_' .  strtolower(str_replace(['-', '', ' ', '.'], ['_'], $agent->getVersion()))
                . ' ' . strtolower(str_replace(['-', '', ' ', '.'], ['_'], $agent->getPlatform())) . ' ' . $support;
        } else {
            return $agent;
        }
    }
}

if (!function_exists('getCountryByIp')) {

    function getCountryByIp($ip)
    {
        try {
            $xml = file_get_contents(
                "http://www.geoplugin.net/json.gp?ip=" . $ip
            );
        } catch (Exception $exception) {
            $xml = null;
        }

        if (isset($xml)) {
            $ipdat = @json_decode($xml);
        } else {
            $xml = null;
        }


        if ($xml != null and isset($ipdat->geoplugin_countryName)) {
            return array(
                'country' => $ipdat->geoplugin_countryName,
                'code' => $ipdat->geoplugin_currencyCode,
                'city' => $ipdat->geoplugin_city,
                'lat' => $ipdat->geoplugin_latitude,
                'lang' => $ipdat->geoplugin_longitude, 'flag' => true
            );
        } else {
            return array(
                'country' => '',
                'code' => '',
                'city' => '',
                'lat' => '',
                'lang' => '', 'flag' => false
            );
        }
    }
}
