<?php

namespace Amauchar\Core\Config;


use Amauchar\Core\Validation\ExpressRules as ExpressRules;
use Amauchar\Core\Collectors\Alerts;
use Amauchar\Core\Filters\SessionAuthOverride;
use Amauchar\Core\Filters\CorsFilter;
use Amauchar\Core\Filters\ThrottleFilter;
use Amauchar\Core\Filters\AlertsFilter;

include_once __DIR__ .'/Constants.php';

class Registrar
{
    /**
     * Registers the Shield filters.
     */
    public static function Filters()
    {
        return [
            'aliases' => [
                'throttle'    => ThrottleFilter::class,
                'cors'        => CorsFilter::class,
                'alerts'      => AlertsFilter::class,
                'sessionAuth' => SessionAuthOverride::class
            ],
            'globals' => [
                'before' => [
                    'csrf' => [
                        'except' => ['api/*']
                    ]
                  //  'redirectAdmin'
                ], 
                'after' =>[
                    'alerts',
                    'toolbar'
                ]
            ],
            
            'methods' => [
                'post' => ['throttle', 'csrf']
            ],
        ];
    }

    public static function Validation()
    {
        return [
            'ruleSets' => [
                ExpressRules::class,
            ],
        ];
    }

    public static function Toolbar(): array
    {
        return [
            'collectors' => [
                Alerts::class,
            ],
        ];
    }
}
